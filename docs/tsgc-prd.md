## TSGC Website PRD (v1)

### Objective
Create a fast, lightweight, accessible website that ranks well in search engines and is easily understood by AI search systems, while adhering to PHP/HTML/CSS/JS best practices.

### Success Metrics (Acceptance Criteria)
- Core Web Vitals (mobile, 75th percentile):
  - LCP ≤ 1.8s, INP ≤ 200ms, CLS ≤ 0.10
- Time to First Byte (TTFB) ≤ 800ms from target hosting
- Total JS shipped per route ≤ 50KB gz (preferably ≤ 30KB)
- Total CSS per route ≤ 50KB gz; critical CSS inline ≤ 8KB
- Largest image on any route ≤ 200KB (WebP/AVIF), responsive sources
- 100% crawlable: valid `robots.txt`, current `sitemap.xml`, no accidental noindex
- SEO tech checklist score ≥ 90 on Lighthouse, ≥ 90 accessibility score
- At least 3 schema types implemented where relevant: `Organization`, `WebSite`, `BreadcrumbList`, `Article`, `FAQPage`

### Non-Goals
- Adding heavy frameworks or SPA-level interactivity
- Building a CMS; content is file-based unless specified
- Large third-party libraries unless they are essential

## Users and Content
### Target Users
- Prospective clients evaluating immersive training offerings
- Event organizers and L&D leads seeking scenario-based training
- Journalists/analysts researching immersive/experiential training

### Content Types
- Marketing pages (Home, Training, The Hack, Situation Room, Covert Operations)
- Program pages and FAQs
- Knowledge hub articles (educational, evergreen)
- Contact/lead capture

## Information Architecture
- Global navigation kept flat (≤ 2 levels deep)
- Clear hubs: `Training`, `Knowledge`, `About/Contact`
- Related links at end of content for strong internal linking
- Breadcrumbs on deep pages

## Functional Requirements
### Pages
- Home: hero, value props, featured programs, featured knowledge, testimonials/clients, contact CTA
- Program pages: problem statement, outcomes, agenda, logistics, FAQs, CTA
- Knowledge hub: article listing (paginated), categories/tags (optional), article detail
- Contact: accessible form (name, email, message), server-side validation, spam protection (honeypot + rate limit; optional hCaptcha)
- Legal: privacy policy, terms (short, clear)

### Navigation and Components
- Header with skip link, accessible menu (keyboard, ARIA), logo link to home
- Footer: contact info, key links, social meta only (no widgets by default)
- Breadcrumbs where applicable
- Search: deferred to Phase 2 (not included in v1 scope)

### Forms and Processing
- Validation: semantic required fields; accessible error messages; unobtrusive JS for enhancements
- Submission: send via Web3Forms API (`https://api.web3forms.com/submit`) with hidden access key; handle success and failure states gracefully
- Spam mitigation: honeypot + time-trap; optionally hCaptcha (deferred unless needed)
- Privacy: do not store PII on server; no local SMTP; rely on Web3Forms deliverability

## Performance and Weight Budgets
- HTML: semantic, ≤ 30KB gz typical
- CSS: utility + component styles; purge unused; inline critical ≤ 8KB; total ≤ 50KB gz/route
- JS: progressive enhancement only; defer/module; ≤ 50KB gz/route; avoid jQuery and large deps
- Images: AVIF/WebP with responsive `srcset/sizes`; `loading=lazy`, `decoding=async`, explicit `width/height`; thumbnails for grids
- Fonts: system font stack by default; if custom required, self-host WOFF2, subset glyphs, use `font-display: swap` or `optional`; ≤ 2 weights, ≤ 100KB total; preload only the primary text face
- Caching: long-cache immutable assets with content hashes; HTML `no-store` or short TTL; CDN recommended
- Delivery: HTTP/2 or HTTP/3, Brotli, keep-alive; minimize requests; preconnect/preload for critical resources only

## SEO Requirements
- Semantic HTML structure: single H1, logical H2/H3 hierarchy
- Titles 50–60 chars; meta descriptions 140–160 chars; unique per page
- Canonical URLs; clean slugs; consistent trailing slash policy
- Internal linking: descriptive anchors; related content modules
- Open Graph + Twitter summary meta on all canonical pages
- Structured data (JSON-LD):
  - Site-wide: `Organization`, `WebSite` with SearchAction
  - Navigation: `BreadcrumbList`
  - Articles: `Article`/`BlogPosting` with author/date/summary
  - FAQs: `FAQPage` on relevant sections
- XML sitemap: auto-updated with lastmod; ensure included routes reflect IA
- robots.txt: allow crawl; disallow only non-canonical or utility routes
- Error handling: custom 404 with helpful links; 301s for moved pages
- Indexing: index all public pages; avoid `noindex` except for explicitly private/utility routes

## AI Search Optimization Requirements
- Content designed for answer extraction:
  - TL;DR summary near top; scannable bullets; clear section headings
  - FAQs with direct Q→A pairs (eligible for `FAQPage`)
  - Glossary for domain terms where useful
- JSON-LD completeness and correctness; consistent entities (Organization, authors)
- Media alternatives: descriptive `alt` text; avoid text-in-images for key facts
- Stable, canonical URLs; avoid duplication and thin content
- Provide machine-readable policies page and optionally `ai.txt` (non-standard; can include guidance for model usage)
- Avoid heavy client-only rendering; ensure primary content in initial HTML

## Accessibility (WCAG 2.2 AA)
- Keyboard-only navigation; visible focus states; skip link to main
- Color contrast: AA for text/icons; test light/dark backgrounds
- Forms: labels, instructions, error messages programmatically associated; no placeholder-only labels
- Landmarks: header, nav, main, aside, footer used appropriately
- ARIA: only where necessary; no role duplication; names/roles/states exposed
- Motion and flashing: respect `prefers-reduced-motion`; no flashing content
- Media: captions/transcripts for video/audio if added later
- Language attributes on `html`; descriptive page titles

## Brand Fonts Policy
- Default: use a fast, stable system font stack to minimize CLS and render-blocking
- Custom brand fonts (only if mandatory):
  - Formats: WOFF2 required (WOFF fallback only if needed); self-hosted (no third-party CDNs)
  - Weights/styles: max 2 weights (e.g., 400/700), normal/italic only; total compressed size ≤ 100KB
  - Subsetting: include only needed glyph ranges (e.g., Latin); use `unicode-range` when appropriate
  - Loading: preload the primary text face with `rel=preload` and `type="font/woff2"` + `crossorigin`; use `font-display: swap` or `optional`
  - Fallback stack: `-apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", "Apple Color Emoji", "Segoe UI Emoji"`
  - Metrics: avoid layout shifts by specifying `line-height` and considering `font-size-adjust`
  - Acceptance: CLS ≤ 0.10 with and without custom fonts enabled

## Coding Best Practices
### PHP
- Version: ≥ 8.2 (project currently on 8.3 OK)
- Standards: PSR-12; strict types where possible; namespaced utilities
- Security: validate + sanitize inputs; output escaping; CSRF token on forms
- Templating: use includes/partials (`header.php`, `footer.php`, components) with minimal logic in views
- Configuration via `config.php`; environment segregation for secrets

### HTML
- Valid, semantic markup; no redundant divs; one H1 per page
- No inline styles except critical CSS; use attributes for behavior hooks (`data-*`)

### CSS
- Architecture: BEM or utility-first hybrid; avoid deep specificity
- Critical CSS inline; rest deferred; minify; purge unused
- Use logical properties and modern features with safe fallbacks; autoprefix via build step if added

### JavaScript
- Progressive enhancement only; ES modules; `defer` loading
- No global leaks; small utilities over large libraries
- Feature-detect; avoid polyfills unless necessary and scoped

## Observability and QA
- Monitoring: Core Web Vitals (field) via GA4 and/or Web-Vitals library reporting to GA4
- Analytics: Google Analytics 4 (GA4) configured across all pages
- Automated checks in CI (if added):
  - Lighthouse CI (mobile, performance ≥ 90, SEO ≥ 90, accessibility ≥ 90)
  - Axe/Pa11y for accessibility regressions
  - HTML validation; link checker; sitemap validation
  - Linting: PHPCS (PSR-12), Stylelint, ESLint (if used)

## Security and Compliance
- Security headers: CSP (nonce/hash-based; allowlist only), HSTS, X-Frame-Options, Referrer-Policy, Permissions-Policy
- Input handling: rate limiting for forms; server-side validation first
- Cookie usage minimal; set `Secure`, `HttpOnly`, `SameSite`

## Hosting and Deployment
- PHP hosting with HTTP/2/3, Brotli, and edge caching (CDN recommended)
- Cache strategy: hashed assets `Cache-Control: public, max-age=31536000, immutable`; HTML short TTL
- Build (if introduced): simple npm-based pipeline for minify/purge (no heavy frameworks)

## Deliverables
- Implemented pages and components per IA
- JSON-LD for `Organization`, `WebSite`, `BreadcrumbList`, articles, FAQs
- Updated `robots.txt`, `sitemap.xml`, canonical tags
- Performance and accessibility reports (before/after), budgets documented
- Documentation: content authoring guide, image guidelines, checklist for new pages
- GA4 configured and verified; Web3Forms integration with success/failure UX

## Risks and Mitigations
- Third-party bloat: reject heavy embeds; use static images/screenshots or API-light integrations
- Image weight: enforce automated compression and dimension constraints
- Form delivery: Web3Forms API availability; provide graceful failure message and a fallback `mailto:` link

## Open Questions
- Any regions with strict data residency or cookie consent requirements?

## Timeline (Draft)
- Week 1: IA finalization, templates, performance scaffolding, global components
- Week 2: Program pages, knowledge templates, JSON-LD, forms with validation
- Week 3: Content pass, image optimization, Lighthouse/axe hardening, analytics
- Week 4: Buffer, approvals, deploy, monitoring


