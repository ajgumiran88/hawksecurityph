# HAWK Security — Preliminary Production Audit

Date: 2026-08-21  
Source: public site crawl + one successful read-only SSH listing (full file download pending password re-auth)

## Live site

- URL: https://hawksecurityph.com/
- Hosting: IONOS webspace (`access-5016707018.webspace-host.com`)
- PHP: 8.1.x (from response headers)
- Remote web root: `/wordpress` (~1.4 GB)

## Active theme (public)

- **Active theme:** `solutech`
- Also present on server (from SSH listing): `elite-security-guard`, `extendable`, `twentytwentyfive`, `twentytwentyfour`
- Homepage template: `page-home.php` (page slug `main`, ID 1952)
- Inner pages often use: `page-no-padding.php` (About, Services, Careers, Contacts)

## Important public pages

| Page | URL | Template |
|------|-----|----------|
| Homepage | `/` | `page-home.php` |
| About Us | `/about-us/` | `page-no-padding.php` |
| Our Services | `/our-services/` | `page-no-padding.php` |
| Careers | `/careers/` | `page-no-padding.php` |
| Contacts | `/contacts/` | `page-no-padding.php` |
| Core Competencies | `/core-competencies-2/` | (default) |
| Blog | `/blog/` | |
| Projects | `/projects/` | |
| Prices | `/prices/` | |
| Home (alt) | `/home-2/` | `page-home.php` |

Also present: WooCommerce-style shop/cart/checkout/my-account pages (may be unused remnants).

## Plugins observed

### Confirmed on public pages
- WPBakery Page Builder (`js_composer`)
- Slider Revolution (`revslider`)
- Smart Slider 3 (`smart-slider-3`)
- Contact Form 7 (`contact-form-7`)
- Pix Settings (`pix-settings`) — Solutech theme companion

### Present on server (SSH listing; activation TBD after full download)
- all-in-one-seo-pack
- coming-soon
- mailchimp-for-wp
- one-click-demo-import
- regenerate-thumbnails
- simply-schedule-appointments
- svg-support
- wordpress-importer
- wp-duplicate-page
- wp-fastest-cache
- wp-reset
- IONOS suite (`ionos-*`, `01-ext-ion2hs971`)

## Forms / integrations (public)

- Contact Form 7 present site-wide
- Mailchimp for WP installed (activation TBD)
- Simply Schedule Appointments installed (activation TBD)
- “Request Information” / quote CTAs on homepage

## Brand notes

- Logo: shield badge, black / white / safety yellow-gold
- Established messaging: trusted security since 1987
- Service areas: warehouse/cargo, retail, campus, building, industrial, residential, event security
- Related brands mentioned on site: Airborne Security Service, Inc.; APS Event Safety PH

## Blockers

1. **Full SFTP download incomplete** — authentication succeeded once, then subsequent password prompts failed. Need a confirmed/reset IONOS SFTP password for user `a2638391`.
2. **Database not yet available** — file backup only so far; local WP runtime needs DB dump or remote DB credentials (never commit these).
3. **WP admin / WP Pusher** — requires WordPress admin access on production (separate from SFTP).

## Next steps after download

1. Inspect `solutech` vs child theme / `elite-security-guard`
2. Extract custom CSS/JS/PHP overrides
3. Create tracked custom theme or child theme repo layout for WP Pusher
4. GitHub repo + safe initial commit
5. WP Pusher config for theme-only deploy (no auto-deploy until approved)
6. Redesign implementation plan with `hawk-v2-` scoped styles
