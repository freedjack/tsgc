<?php
// includes/seo.php
// Expected inputs: $pageTitle, $pageDescription, $canonicalUrl
// Optional: $ogImage, $breadcrumbs ([['name'=>'','url'=>'']...]), $article (['headline','datePublished','dateModified','authorName','image'])

if (!function_exists('e')) {
  function e(string $s): string { return htmlspecialchars($s, ENT_QUOTES, 'UTF-8'); }
}

$siteName = SITE_NAME;
$baseUrl  = defined('SITE_URL') ? rtrim(SITE_URL, '/') : '';
$title       = isset($pageTitle) && $pageTitle ? "{$pageTitle} | {$siteName}" : $siteName;
$description = isset($pageDescription) ? (string) $pageDescription : '';
$canonical   = isset($canonicalUrl) && $canonicalUrl ? $canonicalUrl : ($baseUrl ? $baseUrl . ($_SERVER['REQUEST_URI'] ?? '/') : '');
$isArticle   = isset($article) && is_array($article);

echo '<title>' . e($title) . '</title>' . PHP_EOL;
if ($description !== '') {
  echo '<meta name="description" content="' . e($description) . '">' . PHP_EOL;
}
if ($canonical) {
  echo '<link rel="canonical" href="' . e($canonical) . '">' . PHP_EOL;
}
$robotsMeta = isset($robots) && is_string($robots) && trim($robots) !== '' ? trim($robots) : 'index,follow';
echo '<meta name="robots" content="' . e($robotsMeta) . '">' . PHP_EOL;

// Open Graph / Twitter
$ogType  = $isArticle ? 'article' : 'website';
$ogUrl   = $canonical;
$ogImage = isset($ogImage) && $ogImage ? $ogImage : ($baseUrl ? $baseUrl . '/assets/images/tsgc_logo.png' : '');

echo '<meta property="og:title" content="' . e($title) . '">' . PHP_EOL;
if ($description !== '') {
  echo '<meta property="og:description" content="' . e($description) . '">' . PHP_EOL;
}
echo '<meta property="og:type" content="' . e($ogType) . '">' . PHP_EOL;
if ($ogUrl)   echo '<meta property="og:url" content="' . e($ogUrl) . '">' . PHP_EOL;
if ($ogImage) echo '<meta property="og:image" content="' . e($ogImage) . '">' . PHP_EOL;

echo '<meta name="twitter:card" content="summary_large_image">' . PHP_EOL;
echo '<meta name="twitter:title" content="' . e($title) . '">' . PHP_EOL;
if ($description !== '') {
  echo '<meta name="twitter:description" content="' . e($description) . '">' . PHP_EOL;
}
if ($ogImage) echo '<meta name="twitter:image" content="' . e($ogImage) . '">' . PHP_EOL;

// JSON-LD helpers
function jsonld(array $data): void {
  $json = json_encode($data, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
  if ($json !== false) {
    echo '<script type="application/ld+json">' . $json . '</script>' . PHP_EOL;
  }
}

// Organization
$org = array_filter([
  '@context' => 'https://schema.org',
  '@type'    => 'Organization',
  'name'     => $siteName,
  'url'      => $baseUrl ?: $canonical,
  'logo'     => $baseUrl ? $baseUrl . '/assets/images/tsgc_logo.png' : null,
]);
jsonld($org);

// WebSite (SearchAction reserved for Phase 2)
$website = array_filter([
  '@context' => 'https://schema.org',
  '@type'    => 'WebSite',
  'name'     => $siteName,
  'url'      => $baseUrl ?: $canonical,
  // 'potentialAction' => [
  //   '@type' => 'SearchAction',
  //   'target' => $baseUrl . '/search?q={search_term_string}',
  //   'query-input' => 'required name=search_term_string'
  // ],
]);
jsonld($website);

// BreadcrumbList (if provided)
if (!empty($breadcrumbs) && is_array($breadcrumbs)) {
  $items = [];
  foreach ($breadcrumbs as $i => $bc) {
    if (!isset($bc['name'], $bc['url'])) continue;
    $items[] = [
      '@type'    => 'ListItem',
      'position' => $i + 1,
      'name'     => (string) $bc['name'],
      'item'     => (string) $bc['url'],
    ];
  }
  if ($items) {
    jsonld([
      '@context'        => 'https://schema.org',
      '@type'           => 'BreadcrumbList',
      'itemListElement' => $items,
    ]);
  }
}

// Article (if provided)
if ($isArticle) {
  $a = $article;
  $articleJson = array_filter([
    '@context'      => 'https://schema.org',
    '@type'         => 'Article',
    'headline'      => $a['headline']      ?? null,
    'datePublished' => $a['datePublished'] ?? null,
    'dateModified'  => $a['dateModified']  ?? null,
    'author'        => isset($a['authorName']) ? ['@type' => 'Person', 'name' => (string) $a['authorName']] : null,
    'image'         => $a['image']         ?? null,
    'mainEntityOfPage' => $canonical ?: null,
  ]);
  jsonld($articleJson);
}

// Additional schema blocks (if provided)
if (!empty($additional_jsonld)) {
  $blocks = is_array($additional_jsonld) && array_keys($additional_jsonld) === range(0, count($additional_jsonld) - 1)
    ? $additional_jsonld
    : [$additional_jsonld];

  foreach ($blocks as $block) {
    if (is_array($block) && !empty($block)) {
      jsonld($block);
    }
  }
}
?>
