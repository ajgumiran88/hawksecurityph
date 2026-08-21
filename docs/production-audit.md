# HAWK Security — Production Audit (post-download)

Date: 2026-08-21  
Local mirror: `/Users/arneljayvgumiran/Projects/hawksecurityph-local/wordpress`  
Size: ~1.4 GB · ~33,774 files · **read-only download; live server unmodified**

## Active theme

- **Active (live):** `solutech` (PixTheme Solutech 1.4.3)
- **Child theme for redesign (tracked):** `hawk-security-child` (Template: solutech)
- Other installed themes: `elite-security-guard`, `extendable`, `twentytwentyfour`, `twentytwentyfive`
- No existing child theme of Solutech was present

### Key Solutech templates

- `page-home.php` — homepage (live page ID 1952, slug `main`)
- `page-no-padding.php` — About, Services, Careers, Contacts
- CPT singles: `single-pix-service.php`, `single-pix-portfolio.php`, `single-pix-team.php`, etc.
- WPBakery overrides: `vc_templates/`
- WooCommerce templates present

## Plugins (26 under wp-content/plugins)

| Plugin | Role |
|--------|------|
| js_composer | WPBakery page builder (primary layout) |
| revslider | Revolution Slider |
| smart-slider-3 | Smart Slider 3 |
| pix-settings | Solutech companion (required) |
| contact-form-7 | Forms |
| mailchimp-for-wp | Email |
| simply-schedule-appointments | Booking |
| all-in-one-seo-pack | SEO |
| wp-fastest-cache | Cache |
| svg-support | SVG uploads |
| regenerate-thumbnails | Media |
| one-click-demo-import / wordpress-importer | Import tools |
| coming-soon / wp-reset / wp-duplicate-page | Utility |
| ionos-* suite | Hosting integrations |

## Public pages (from WP REST)

Homepage, About Us, Our Services, Careers, Contacts, Core Competencies, Blog, Projects, Prices, plus unused WooCommerce shop/cart pages.

## Forms / integrations

- Contact Form 7 (shortcodes in pages; form definitions live in DB — not in files)
- Mailchimp for WP, Simply Schedule Appointments (activation confirmed via files; runtime status needs WP admin/DB)
- Homepage CTA: Request Information / quote style CTAs

## Sensitive / excluded from Git

- Entire `wordpress/` mirror
- `wp-config.php`, `*.appconfig.php`
- `_server-misc/` (logs)
- uploads, cache, `.opcache`, SQL dumps
- SFTP/SSH credentials (never stored)

## Limitations

1. **No database dump** — page content, menus, CF7 forms, theme mods, and active plugin flags live in MySQL. Local PHP runtime needs a DB export or remote DB access.
2. **WP admin** — required for WP Pusher install and activating the child theme on live.
3. **Redesign not applied to live** — awaiting explicit approval after design plan sign-off.
