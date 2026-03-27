<?php
declare(strict_types=1);

require_once __DIR__ . '/../app/bootstrap/bootstrap.php';

function pathRouteExists(string $route, string $root): bool
{
    $route = trim($route, '/');
    if ($route === '') {
        return is_file($root . '/pages/core/index.php');
    }

    if ($route === 'knowledge') {
        return is_file($root . '/pages/knowledge/index.php');
    }

    if (strpos($route, 'knowledge/') === 0) {
        $slug = substr($route, strlen('knowledge/'));
        return $slug !== '' && is_file($root . '/pages/knowledge/' . $slug . '.php');
    }

    return is_file($root . '/pages/core/' . $route . '.php')
        || is_file($root . '/pages/training/' . $route . '.php');
}

$root = dirname(__DIR__);
$errors = [];

// 1) Content IDs should map to routable pages.
foreach ($content_items as $item) {
    $id = (string) ($item['id'] ?? '');
    if ($id === '') {
        $errors[] = 'Found content item with empty id.';
        continue;
    }
    if (!pathRouteExists($id, $root)) {
        $errors[] = "Content id '{$id}' has no matching routed page.";
    }
}

// 2) Sitemap URLs should map to routable pages.
$sitemapPath = $root . '/sitemap.xml';
if (!is_file($sitemapPath)) {
    $errors[] = 'Missing sitemap.xml.';
} else {
    $xml = @simplexml_load_file($sitemapPath);
    if ($xml === false) {
        $errors[] = 'Unable to parse sitemap.xml.';
    } else {
        foreach ($xml->url as $urlNode) {
            $loc = (string) $urlNode->loc;
            $path = (string) parse_url($loc, PHP_URL_PATH);
            if ($path === '') {
                continue;
            }
            if (!pathRouteExists($path, $root) && $path !== '/sitemap.xml') {
                $errors[] = "Sitemap route '{$path}' does not map to a page.";
            }
        }
    }
}

// 3) Key nav routes should exist.
$requiredRoutes = ['/', '/training', '/public-speaking', '/knowledge', '/faq', '/contact'];
foreach ($requiredRoutes as $route) {
    if (!pathRouteExists($route, $root)) {
        $errors[] = "Required route '{$route}' is missing.";
    }
}

if ($errors) {
    fwrite(STDERR, "Integrity check failed:\n");
    foreach ($errors as $error) {
        fwrite(STDERR, " - {$error}\n");
    }
    exit(1);
}

fwrite(STDOUT, "Integrity check passed.\n");
