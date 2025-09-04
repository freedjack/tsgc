<?php
// Site Configuration
define('SITE_NAME', 'The Serious Games Company');
define('SITE_URL', 'https://theseriousgamescompany.com');
define('SITE_DESCRIPTION', 'The Serious Games Company creates engaging, immersive role play, simulations and games for effective learning and skill development in corporate environments.');

// Content data (moved from JSON to PHP for easier management)
$content_items = [
    [
        'id' => 'the-hack',
        'title' => 'Be the hacker',
        'subtitle' => 'A great way to understand cyber security is to plan a hack',
        'body' => 'Step into the shoes of a hacker and learn about cyber security through hands-on experience. In this immersive training scenario, participants work as part of a red team to identify and exploit vulnerabilities, teaching vital lessons about modern cyber security practices.',
        'image' => 'assets/images/large/clint-patterson-hacker.jpg',
        'thumb' => 'assets/images/thumb/clint-patterson-hacker.jpg',
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
        'image' => 'assets/images/large/sam-mcghee-studio.jpg',
        'thumb' => 'assets/images/thumb/sam-mcghee-studio.jpg',
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
        'image' => 'assets/images/large/spy-lld.jpg',
        'thumb' => 'assets/images/thumb/spy-lld.jpg',
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
        'image' => 'assets/images/large/room-with-tables.jpg',
        'thumb' => 'assets/images/thumb/room-with-tables.jpg',
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

// Render responsive <picture> with optional AVIF/WEBP if variants exist
if (!function_exists('render_picture')) {
    /**
     * @param string $src Relative URL to the image (jpg/png)
     * @param string $alt Alt text
     * @param string $class CSS class for <img>
     * @param array $attrs Additional attributes: sizes, loading, decoding, width, height, style
     */
    function render_picture($src, $alt, $class = '', $attrs = []) {
        $rootDir = __DIR__;
        $webPath = $src;
        $absPath = $rootDir . '/' . ltrim($webPath, '/');
        $pathInfo = pathinfo($absPath);
        $base = $pathInfo['dirname'] . '/' . $pathInfo['filename'];
        $webDir = rtrim(dirname($webPath), '/');
        $filename = $pathInfo['filename'];

        $avifAbs = $base . '.avif';
        $webpAbs = $base . '.webp';
        $avifWeb = ($webDir ? $webDir . '/' : '') . $filename . '.avif';
        $webpWeb = ($webDir ? $webDir . '/' : '') . $filename . '.webp';

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
