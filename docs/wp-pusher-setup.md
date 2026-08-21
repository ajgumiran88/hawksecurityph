# WP Pusher — HAWK Security (do not enable auto-deploy until approved)

## Deployment target

| Setting | Value |
|---------|--------|
| Repository | *(created as hawksecurityph — confirm after push)* |
| Package type | **Theme** |
| Theme folder | `hawk-security-child` |
| Subdir / monorepo path | `themes/hawk-security-child` (if WP Pusher supports subdirectory install) |
| Branch | `main` |
| Auto-deploy | **OFF** until explicit approval |

## Important

- Deploy **only** the child theme `hawk-security-child`.
- Do **not** push WordPress core, full `wordpress/` mirror, plugins, uploads, or `wp-config.php`.
- Parent theme `solutech` must remain installed on production (WP Pusher does not replace it).
- Companion plugin `pix-settings` must remain active for Solutech.

## Install steps (WordPress admin — requires login)

1. Install and activate **WP Pusher** (or use existing license).
2. Connect GitHub account `ajgumiran88`.
3. Install theme from repo → set directory to theme package path.
4. Activate **HAWK Security Child** after verifying parent Solutech is present.
5. Leave push-to-deploy **disabled** until redesign is approved.

## Blockers

- WordPress admin credentials are required to install/configure WP Pusher on live.
- No production deployment will be made without explicit approval.
