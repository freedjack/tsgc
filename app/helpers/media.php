<?php
if (!function_exists('validate_alt_text')) {
    /**
     * Validates and improves alt text for accessibility
     * @param string $alt Current alt text
     * @param string $src Image source path
     * @return string Improved alt text
     */
    function validate_alt_text($alt, $src) {
        $alt = trim($alt);

        // Check for common problematic alt text
        $bad_alt_texts = ['', 'image', 'img', 'photo', 'picture', '...', 'alt', 'untitled'];

        if (in_array(strtolower($alt), $bad_alt_texts, true) || strlen($alt) < 3) {
            // Generate descriptive alt text from filename
            $pathInfo = pathinfo($src);
            $filename = $pathInfo['filename'];

            // Clean up filename and make it descriptive
            $alt = str_replace(['-', '_'], ' ', $filename);
            $alt = preg_replace('/\d+/', '', $alt); // Remove numbers
            $alt = trim($alt);
            $alt = ucwords($alt);

            // Add context if it's a training-related image
            if (strpos($src, 'training') !== false || strpos($src, 'session') !== false) {
                $alt = "Training session: {$alt}";
            } elseif (strpos($src, 'team') !== false || strpos($src, 'group') !== false) {
                $alt = "Team: {$alt}";
            } elseif (strpos($src, 'room') !== false || strpos($src, 'facility') !== false) {
                $alt = "Training facility: {$alt}";
            }

            // Log warning for missing alt text
            error_log("Accessibility Warning: Missing or insufficient alt text for image: {$src}. Generated: '{$alt}'");
        }

        return $alt;
    }
}

if (!function_exists('audit_image_alt_text')) {
    /**
     * Audits all images in the site for alt text issues
     * @return array Array of issues found
     */
    function audit_image_alt_text() {
        $issues = [];

        // Scan PHP files for render_picture calls
        $php_files = glob(__DIR__ . '/../../pages/**/*.php');
        if ($php_files === false) {
            return $issues;
        }

        foreach ($php_files as $file) {
            $content = file_get_contents($file);
            if ($content === false) {
                continue;
            }

            // Find render_picture calls
            preg_match_all('/render_picture\s*\(\s*[\'"]([^\'"]+)[\'"]\s*,\s*[\'"]([^\'"]*)[\'"]/', $content, $matches, PREG_SET_ORDER);

            foreach ($matches as $match) {
                $src = $match[1];
                $alt = $match[2];

                // Check for issues
                if (empty($alt) || strlen($alt) < 3) {
                    $issues[] = [
                        'file' => basename($file),
                        'image' => $src,
                        'alt' => $alt,
                        'issue' => 'Missing or insufficient alt text'
                    ];
                } elseif (in_array(strtolower($alt), ['image', 'img', 'photo', 'picture', '...', 'alt', 'untitled'], true)) {
                    $issues[] = [
                        'file' => basename($file),
                        'image' => $src,
                        'alt' => $alt,
                        'issue' => 'Generic alt text'
                    ];
                }
            }
        }

        return $issues;
    }
}

if (!function_exists('render_picture')) {
    /**
     * @param string $src Relative URL to the image (jpg/png)
     * @param string $alt Alt text
     * @param string $class CSS class for <img>
     * @param array $attrs Additional attributes: sizes, loading, decoding, width, height, style
     */
    function render_picture($src, $alt, $class = '', $attrs = []) {
        // Validate and improve alt text for accessibility
        $alt = validate_alt_text($alt, $src);

        $rootDir = dirname(__DIR__, 2);
        $webPath = $src;
        $absPath = $rootDir . '/' . ltrim($webPath, '/');
        $pathInfo = pathinfo($absPath);
        $webDir = rtrim(dirname($webPath), '/');
        $filename = $pathInfo['filename'];

        // Look for WebP and AVIF in their respective subdirectories
        $webpDir = str_replace('/jpg', '/webp', $pathInfo['dirname']);
        $avifDir = str_replace('/jpg', '/avif', $pathInfo['dirname']);

        $avifAbs = $avifDir . '/' . $filename . '.avif';
        $webpAbs = $webpDir . '/' . $filename . '.webp';

        // Web paths for the alternative formats
        $webpWebDir = str_replace('/jpg', '/webp', $webDir);
        $avifWebDir = str_replace('/jpg', '/avif', $webDir);

        $avifWeb = ($avifWebDir ? $avifWebDir . '/' : '') . $filename . '.avif';
        $webpWeb = ($webpWebDir ? $webpWebDir . '/' : '') . $filename . '.webp';
        $sizes = isset($attrs['sizes']) ? $attrs['sizes'] : null;
        $loading = isset($attrs['loading']) ? $attrs['loading'] : 'lazy';
        $decoding = isset($attrs['decoding']) ? $attrs['decoding'] : 'async';
        $width = isset($attrs['width']) ? ' width="' . htmlspecialchars((string) $attrs['width']) . '"' : '';
        $height = isset($attrs['height']) ? ' height="' . htmlspecialchars((string) $attrs['height']) . '"' : '';
        $style = isset($attrs['style']) ? ' style="' . htmlspecialchars((string) $attrs['style']) . '"' : '';

        $sizesAttr = $sizes ? ' sizes="' . htmlspecialchars($sizes) . '"' : '';
        $classAttr = $class ? ' class="' . htmlspecialchars($class) . '"' : '';

        echo "<picture>\n";
        if (file_exists($avifAbs)) {
            echo '  <source type="image/avif" srcset="' . htmlspecialchars($avifWeb) . '"' . $sizesAttr . ">\n";
        }
        if (file_exists($webpAbs)) {
            echo '  <source type="image/webp" srcset="' . htmlspecialchars($webpWeb) . '"' . $sizesAttr . ">\n";
        }
        echo '  <img src="' . htmlspecialchars($webPath) . '" alt="' . htmlspecialchars($alt) . '" loading="' . htmlspecialchars($loading) . '" decoding="' . htmlspecialchars($decoding) . '"' . $sizesAttr . $classAttr . $width . $height . $style . ">\n";
        echo "</picture>\n";
    }
}
