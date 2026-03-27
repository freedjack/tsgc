## TSGC Website Technical Specification (v1)

This document operationalizes the PRD into concrete implementation details: architecture, templates, performance/SEO/accessibility requirements, analytics, forms, security, and acceptance tests.

## 1) Technology and Architecture
- Runtime: PHP 8.3, HTML5, CSS3, vanilla JS (ES modules)
- Hosting: PHP-capable server with HTTP/2+ and Brotli; CDN recommended
- Structure (current and additions):
  - `index.php`, `training.php`, `the-hack.php`, `the-situation-room.php`, `covert-operations-training-academy.php`, `knowledge/*.php`, `contact.php`
  - `includes/header.php`, `includes/footer.php`, `includes/hero.php`
  - `assets/css/style.css`, `assets/js/main.js`, `assets/images/**/*`
  - Add: `includes/seo.php` (meta + canonical + JSON-LD), `includes/analytics.php` (GA4), optional `includes/breadcrumbs.php`
- Templating: keep PHP in views minimal; use includes for repeated UI and metadata
- Environment config: `config.php` for site constants (site name, base URL, GA4 ID, Web3Forms key)
- Local Enviroment Laravel valet running Nginx
- Production Enviroment ubuntu/Apache

## 2) Global HTML Template
Each page loads:
1. `includes/header.php`
2. Page-specific content
3. `includes/footer.php`

Header must include:
- `<meta charset="utf-8">`, viewport, language on `<html lang="en">`
- Title + meta description from page variables
- Canonical link
- Open Graph + Twitter meta
- Inline critical CSS (≤ 8KB); link to `assets/css/style.css` deferred via `media="print" onload` or standard link if small
- System font stack; custom fonts only if approved (see Fonts)
- Preconnect to CDN if used; no unnecessary preloads
- GA4 via `includes/analytics.php`

Footer must include:
- `assets/js/main.js` loaded with `defer` (ES module if using modules)
- Structured data JSON-LD via `includes/seo.php` (page-type specific)

## 3) Routing and Information Architecture
- Flat nav with up to two levels. Breadcrumbs on deep pages using `BreadcrumbList`
- All public pages indexable; no `noindex` except for utility pages (none planned)

## 4) Performance Implementation (Budgets enforced)
- HTML: semantic, ≤ 30KB gz typical; avoid unnecessary markup
- CSS:
  - Keep `style.css` ≤ 50KB gz; remove unused CSS; prefer class utilities/BEM
  - Inline critical CSS (≤ 8KB) in `<head>`; rest loaded normally
  - Avoid large CSS frameworks; no blocking @import
- JS:
  - Progressive enhancement only, ≤ 50KB gz per route
  - Use `defer` or `type="module"` + `defer`; no jQuery or large deps
- Images:
  - AVIF/WebP first with `srcset`/`sizes` and proper `width`/`height`
  - `loading="lazy"`, `decoding="async"` for non-critical imagery
  - Thumbnails for grids; largest image ≤ 200KB
- Fonts:
  - Default: system stack; if custom, WOFF2, ≤ 2 weights, ≤ 100KB total, `font-display: swap|optional`, preload only primary text face
- Delivery and caching:
  - Long-cache hashed assets; HTML short TTL; Brotli enabled; HTTP/2/3

## 5) SEO Implementation
- Canonical, unique title (50–60 chars) and description (140–160 chars)
- Single H1; logical H2/H3
- Open Graph + Twitter summary cards on all canonical pages
- Structured data (JSON-LD via `includes/seo.php`):
  - Site-wide `Organization` and `WebSite` (with SearchAction structure reserved for Phase 2)
  - `BreadcrumbList` on deep pages
  - `Article`/`BlogPosting` for knowledge pages
  - `FAQPage` where FAQs are present
- Sitemap and robots:
  - Ensure `sitemap.xml` is up-to-date; include all public pages
  - `robots.txt` allows crawling; disallow none beyond utilities
- 404: helpful links to key sections

Example `Organization` JSON-LD (in `includes/seo.php`):
```html
<script type="application/ld+json">{
  "@context": "https://schema.org",
  "@type": "Organization",
  "name": "TSGC",
  "url": "https://example.com",
  "logo": "https://example.com/assets/images/tsgc_logo.png"
}</script>
```

## 6) AI Search Optimization
- Content structure: TL;DR summary near top; scannable bullet lists; clear headings
- FAQs with direct Q→A blocks and `FAQPage` schema
- Descriptive `alt` text; avoid embedding essential text in images
- Primary content server-rendered in initial HTML
- Optional: `ai.txt` guidance doc (non-standard) can be added later

## 7) Accessibility (WCAG 2.2 AA)
- Keyboard: skip link, focus-visible styles, focus order logical
- Contrast: AA for text/icons
- Forms: visible labels, instructions, error messages associated with inputs, no placeholder-only labels
- Landmarks: header, nav, main, aside, footer
- ARIA: minimal and accurate; name/role/value exposed
- Motion: honor `prefers-reduced-motion`
- Language set on `<html>`; descriptive titles

## 8) Forms: Web3Forms Integration (Contact)
- Endpoint: `https://api.web3forms.com/submit`
- Hidden fields required:
  - `access_key` (from `config.php`)
  - `subject` (e.g., "New contact form submission")
  - Optional `from_name`, `redirect`
- Spam controls: hidden honeypot field `botcheck`, time-trap (record start time and reject < 3s submits via JS; non-blocking)
- Privacy: no server-side storage of PII; rely on Web3Forms email delivery

HTML baseline (works without JS):
```html
<form action="https://api.web3forms.com/submit" method="POST" novalidate>
  <input type="hidden" name="access_key" value="<?= htmlspecialchars(WEB3FORMS_ACCESS_KEY) ?>">
  <input type="hidden" name="subject" value="New contact form submission">
  <div aria-live="polite" id="form-status" class="visually-hidden"></div>

  <label for="name">Name</label>
  <input id="name" name="name" type="text" required autocomplete="name">

  <label for="email">Email</label>
  <input id="email" name="email" type="email" required autocomplete="email">

  <label for="message">Message</label>
  <textarea id="message" name="message" rows="5" required></textarea>

  <input type="text" name="botcheck" class="visually-hidden" tabindex="-1" autocomplete="off">
  <button type="submit">Send</button>
</form>
```

Progressive enhancement (optional fetch):
```js
// In assets/js/main.js
document.addEventListener('DOMContentLoaded', () => {
  const form = document.querySelector('form[action="https://api.web3forms.com/submit"]');
  if (!form) return;
  const status = document.getElementById('form-status');
  form.addEventListener('submit', async (e) => {
    if (!window.fetch) return; // fallback to normal POST
    e.preventDefault();
    status && (status.textContent = 'Sending…');
    try {
      const formData = new FormData(form);
      const res = await fetch(form.action, { method: 'POST', body: formData });
      if (res.ok) {
        status && (status.textContent = 'Thanks! We will be in touch.');
        form.reset();
      } else {
        status && (status.textContent = 'Sorry, something went wrong. Please try again.');
      }
    } catch {
      status && (status.textContent = 'Network error. Please try again later.');
    }
  });
});
```

## 9) Analytics: GA4
- Include GA4 via `includes/analytics.php` on all pages
- Events:
  - `contact_submit` on successful Web3Forms response (if using JS enhancement)
  - `nav_click`, `cta_click` as needed
- Field Web Vitals (optional): use `web-vitals` library to send events to GA4

Example `includes/analytics.php`:
```php
<?php if (defined('GA4_MEASUREMENT_ID') && GA4_MEASUREMENT_ID): ?>
<script async src="https://www.googletagmanager.com/gtag/js?id=<?= htmlspecialchars(GA4_MEASUREMENT_ID) ?>"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);} 
  gtag('js', new Date());
  gtag('config', '<?= htmlspecialchars(GA4_MEASUREMENT_ID) ?>');
</script>
<?php endif; ?>
```

## 10) Security and Compliance
- Security headers (server config recommended):
  - `Content-Security-Policy` (minimal allowlist) e.g.:
    - `default-src 'self'; img-src 'self' data:; script-src 'self' https://www.googletagmanager.com https://www.google-analytics.com; connect-src 'self' https://api.web3forms.com https://www.google-analytics.com; style-src 'self' 'unsafe-inline'; font-src 'self'; base-uri 'self'; frame-ancestors 'none'`
  - `Strict-Transport-Security: max-age=31536000; includeSubDomains; preload`
  - `X-Frame-Options: DENY`, `Referrer-Policy: strict-origin-when-cross-origin`
  - `Permissions-Policy` limiting sensors/camera/mic/geolocation as appropriate
- Cookies: minimize usage; set `Secure`, `HttpOnly`, `SameSite`

## 11) Caching and Delivery
- Assets: `Cache-Control: public, max-age=31536000, immutable`
- HTML/PHP: short TTL or `no-store` based on content freshness
- Enable Brotli and HTTP/2/3; keep-alive on

## 12) Fonts Policy (Brand)
- System font stack by default: `-apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", "Apple Color Emoji", "Segoe UI Emoji"`
- If custom fonts approved: self-host WOFF2 only, ≤ 2 weights, total ≤ 100KB, subset glyphs, `font-display: swap|optional`, preload primary face only
- Ensure CLS ≤ 0.10 with and without fonts

## 13) Testing and QA
- Lighthouse (mobile): Performance ≥ 90, SEO ≥ 90, Accessibility ≥ 90
- Axe/Pa11y: no critical A11Y violations; focus and labels verified
- HTML validation: no critical errors; link checker passes
- Core Web Vitals: lab and (post-deploy) field monitoring via GA4

## 14) Deployment Checklist
- Set `GA4_MEASUREMENT_ID` and `WEB3FORMS_ACCESS_KEY` in `config.php`
- Verify `robots.txt` allows crawling; `sitemap.xml` accurate
- Replace all hard-coded URLs with base URL variables where relevant
- Confirm caching headers and security headers on server/CDN
- Test contact form end-to-end and GA4 event reception

## 15) Acceptance Criteria (from PRD mapped to implementation)
- LCP ≤ 1.8s, INP ≤ 200ms, CLS ≤ 0.10 (mobile, 75th percentile target)
- TTFB ≤ 800ms from hosting
- JS ≤ 50KB gz/route; CSS ≤ 50KB gz/route; critical CSS ≤ 8KB
- Largest image ≤ 200KB with responsive sources
- SEO/Lighthouse: SEO ≥ 90, Accessibility ≥ 90
- JSON-LD implemented for `Organization`, `WebSite`, `BreadcrumbList`, `Article` (where relevant), and `FAQPage` (where present)
- GA4 active site-wide; `contact_submit` tracked (if JS enhancement enabled)
- Web3Forms submission working with accessible success/error states and spam controls
- All public pages indexable; custom 404 available


