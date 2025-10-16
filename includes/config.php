<?php
// Site Configuration
define('SITE_URL', 'https://theseriousgamescompany.com');
define('SITE_DESCRIPTION', 'The Serious Games Company creates engaging, immersive role play, simulations and games for effective learning and skill development in corporate environments.');

// Analytics and Forms
define('GA4_MEASUREMENT_ID', ''); // Add your GA4 Measurement ID here
define('WEB3FORMS_ACCESS_KEY', ''); // Add your Web3Forms access key here

// Content data (moved from JSON to PHP for easier management)
$content_items = [
    [
        'id' => 'the-hack',
        'title' => 'Be the hacker',
        'subtitle' => 'A great way to understand cyber security is to plan a hack',
        'body' => 'Step into the shoes of a hacker and learn about cyber security through hands-on experience. In this immersive training scenario, participants work as part of a red team to identify and exploit vulnerabilities, teaching vital lessons about modern cyber security practices.',
        'image' => 'assets/images/optimized/large/jpg/clint-patterson-hacker.jpg',
        'thumb' => 'assets/images/optimized/thumb/jpg/clint-patterson-hacker.jpg',
        'outcomes' => [
            'Understand the importance of cyber security',
            'Identify and exploit vulnerabilities',
            'Learn about modern cyber security practices'
        ]
    ],
    [
        'id' => 'live-in-the-morning',
        'category' => 'front-page-training',
        'title' => 'Live in the Morning',
        'subtitle' => 'Live TV is a fast paced environment. Any thing could happen and it probably will. See how your team handles it.',
        'body' => 'Live in the Morning is a popular moring show. Much loved by pensioners and students alike. But disaster has struck, the crew and presenters have come down with food poisoning after eating chef Joe Blanch\'s special dish. Luckily you have come to save the day but you to get to grips with equipment, studio and guest egos first. Good luck, morning television is relying on you.',
        'image' => 'assets/images/optimized/large/jpg/sam-mcghee-studio.jpg',
        'thumb' => 'assets/images/optimized/thumb/jpg/sam-mcghee-studio.jpg',
        'outcomes' => [
            'Teamwork',
            'Dealing with crisis',
            'Communication',
            'Leadership',
            'Problem solving',
            'Stress management',
            'Decision making'
        ]
    ],
    [
        'id' => 'covert-operations-training-academy',
        'category' => 'front-page-training',
        'title' => 'Covert Operations Training Academy',
        'subtitle' => 'Learn the skills of a spy and how to use them to save the world.',
        'body' => 'Step into the world of espionage and learn critical skills through immersive role-play scenarios.',
        'image' => 'assets/images/optimized/large/jpg/spy-lld.jpg',
        'thumb' => 'assets/images/optimized/thumb/jpg/spy-lld.jpg',
        'outcomes' => [
            'Critical thinking',
            'Teamwork',
            'Problem solving',
            'Confidence & communication'
        ]
    ],
    [
        'id' => 'the-situation-room',
        'category' => 'front-page-training',
        'title' => 'The Situation Room',
        'subtitle' => 'Some call it The Crisis Chamber. Others call it The Stress Suite. Step into a series of diverse, high-pressure scenarios and put your skills to the test. Don\'t worry—it\'s safe. We promise.',
        'body' => 'We have created a series of different scenarios to test the skills of your team in a safe and controlled environment. Using cctv cameras and microphones we then review the performance of the team allowing them to learn from their mistakes and improve their skills.',
        'image' => 'assets/images/optimized/large/jpg/room-with-tables.jpg',
        'thumb' => 'assets/images/optimized/thumb/jpg/room-with-tables.jpg',
        'outcomes' => [
            'Test your skills',
            'Teamwork',
            'Stress management',
            'Decision making'
        ]
    ]
];

// Helper function to get front page training items
function getFrontPageTraining() {
    global $content_items;
    return array_filter($content_items, function($item) {
        return isset($item['category']) && $item['category'] === 'front-page-training';
    });
}

// Helper function to get content item by ID
function getContentById($id) {
    global $content_items;
    foreach ($content_items as $item) {
        if ($item['id'] === $id) {
            return $item;
        }
    }
    return null;
}

// Helper function to validate and improve alt text
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
        
        if (in_array(strtolower($alt), $bad_alt_texts) || strlen($alt) < 3) {
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

// Function to audit images for alt text issues (for development/debugging)
if (!function_exists('audit_image_alt_text')) {
    /**
     * Audits all images in the site for alt text issues
     * @return array Array of issues found
     */
    function audit_image_alt_text() {
        $issues = [];
        $image_extensions = ['jpg', 'jpeg', 'png', 'gif', 'webp', 'avif'];
        
        // Scan PHP files for render_picture calls
        $php_files = glob(__DIR__ . '/../*.php');
        $php_files = array_merge($php_files, glob(__DIR__ . '/../knowledge/*.php'));
        
        foreach ($php_files as $file) {
            $content = file_get_contents($file);
            
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
                } elseif (in_array(strtolower($alt), ['image', 'img', 'photo', 'picture', '...', 'alt', 'untitled'])) {
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

// Render responsive <picture> with optional AVIF/WEBP if variants exist
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
        
        $rootDir = dirname(__DIR__);
        $webPath = $src;
        $absPath = $rootDir . '/' . ltrim($webPath, '/');
        $pathInfo = pathinfo($absPath);
        $base = $pathInfo['dirname'] . '/' . $pathInfo['filename'];
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
        $width = isset($attrs['width']) ? ' width="' . htmlspecialchars((string)$attrs['width']) . '"' : '';
        $height = isset($attrs['height']) ? ' height="' . htmlspecialchars((string)$attrs['height']) . '"' : '';
        $style = isset($attrs['style']) ? ' style="' . htmlspecialchars((string)$attrs['style']) . '"' : '';

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
?>
