# HAWK Security Visual Refactor Design

## Objective

Modernize the public HAWK Security Service, Inc. site as a premium, disciplined corporate security website without changing WordPress behavior, routes, page-builder content, plugins, form processing, job workflows, or integrations.

## Chosen architecture

Extend the tracked `hawk-security-child` child theme over the existing Solutech/WPBakery installation. Native child-theme templates continue to own the header, homepage hero, inner-page banner, and footer. Scoped CSS presents existing WPBakery, Contact Form 7, and job-listing markup as one visual system. JavaScript remains limited to progressive navigation and optional visual enhancement.

## Design system

- Brand colors: Hawk Gold `#F4E52A`, Premium Gold `#D7B72D`, Deep Black `#070707`, Graphite `#1B1B1B`, Slate `#4B5563`, Soft Gray `#F6F6F3`, Border Gray `#E7E5E0`, and white surfaces.
- Typography: Plus Jakarta Sans for headings and Inter for body copy, loaded once from Google Fonts.
- Visual character: warm-white and soft-gray content rhythm; dark, compact header/footer/CTA surfaces; gold used for actions, active states, labels, and fine separators only.
- Motion: 150-300 ms hover/navigation transitions only, with `prefers-reduced-motion` disabling nonessential movement.
- Accessibility: visible focus states, a skip link, stable header offset, semantic controls, and no gold body text on a light surface.

## Page treatment

### Global shell

Keep the official logo unchanged. Preserve the existing primary-menu renderer and mobile drawer behavior, while adding skip navigation, improved focus management, and a compact resilient desktop/mobile header. Retain current routes and quote link destination.

### Homepage

Keep existing approved hero imagery and messaging. Present the existing page-builder content below it with consistent section spacing, restrained cards, image crops, buttons, and CTA bands. Do not introduce unverified metrics, endorsements, awards, credentials, or remote imagery.

### Inner pages

Preserve the existing `page-no-padding.php` template and WPBakery content. Apply a clear banner-to-content transition and safe selectors for services, career filters/listings, Contact Form 7 output, and generic content blocks. No shortcode, query, field-name, nonce, or plugin behavior is changed.

### Footer

Keep existing verified contact details, routes, and official logo. Remove generic social destinations from the visual surface until verified links are supplied; do not fabricate social destinations.

## Guardrails

- Use only `hawk-` / `hawk-v2-` names for new custom classes.
- Do not modify `wordpress/`, plugins, database structures, WordPress admin UI, or production deployment configuration.
- Do not change the generated WordPress content, route structure, form semantics, query behavior, or plugin callbacks.
- Keep PHP template changes presentation-only, escaped, and WordPress-hook compatible.

## Verification

Use a repeatable child-theme visual-contract test plus PHP syntax checks. Confirm templates retain WordPress hooks and page content rendering. Validate responsive CSS breakpoints and reduced-motion rules through static checks; complete live browser validation only when a runnable WordPress instance and approved test content are available.
