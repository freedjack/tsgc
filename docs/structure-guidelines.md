# Folder Structure and Naming Rules

## Runtime boundaries

- `app/`: application internals (bootstrap, data, helpers, partials).
- `pages/`: page entry scripts grouped by purpose (`core`, `training`, `knowledge`).
- `assets/`, `favicon/`, `robots.txt`, `sitemap.xml`: public web assets/artifacts.
- Root should only keep deploy/runtime entry artifacts and top-level project config.

## Naming conventions

- Use lowercase kebab-case for file and folder names.
- Avoid spaces in file/folder names.
- Avoid `copy`, `old`, or ad-hoc backup files in runtime paths.
- Use clear ownership folders:
  - `docs/` for documentation/specs.
  - `scripts/` for developer utilities.
  - `archive/` for non-runtime backup artifacts.

## Include conventions

- Every page entry includes `app/bootstrap/bootstrap.php` first.
- Shared UI fragments are loaded from `app/views/partials/`.
- Compatibility wrappers can remain in `includes/` short-term, but new includes should target `app/views/partials/`.

## URL compatibility

- External URLs remain extensionless.
- Apache rewrites map external paths to grouped scripts under `pages/`.
- Internal directories `app/` and `pages/` are not publicly browsable.
