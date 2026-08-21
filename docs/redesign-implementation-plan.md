# HAWK Security — Visual Redesign Implementation Plan

**Status:** Plan only — no live changes until you approve.

## Direction (approved brief)

- Light, professional, premium, modern, futuristic corporate security
- Image-led banners; white / soft-gray surfaces
- Brand: Hawk Gold `#E6B800`, Black/Graphite, White/Soft Gray
- Scoped classes: `hawk-v2-` / `hawk-`
- Restrained motion; respect `prefers-reduced-motion`
- Do not invent certifications, clients, awards, stats, or testimonials

## Approach (recommended)

**Child theme overlay on Solutech + WPBakery content**

1. Keep Solutech + pix-settings + WPBakery as the content engine.
2. Activate `hawk-security-child` for header/footer/CSS/JS overrides.
3. Restyle public templates with scoped CSS; replace heavy demo chrome gradually.
4. Homepage: full-width image hero, dark overlay, headline, “Request a Security Quote” CTA, services, why HAWK, trust indicators (only existing claims), process timeline, showcase, final CTA.
5. Align About, Services, Careers, Contact, header, footer, service-detail pages to the same system.
6. Deploy only `themes/hawk-security-child` via WP Pusher after approval.

### Alternatives considered

| Approach | Pros | Cons |
|----------|------|------|
| A. Child theme + CSS/template overrides (recommended) | Safe, reversible, WP Pusher-friendly | Constrained by WPBakery markup |
| B. Rebuild pages in new custom templates | Cleaner markup | Higher risk; more content migration |
| C. Replace Solutech with new theme | Full control | Breaks WPBakery shortcodes; large rewrite |

## Phases

1. **Foundation** — tokens, typography, buttons, header/footer shell (`hawk-v2`)
2. **Homepage** — hero + sections listed in brief
3. **Inner pages** — About, Services, Careers, Contact
4. **Polish** — responsive QA, a11y, performance, reduced-motion
5. **Staging review** → your explicit go-live → WP Pusher push

## Out of scope until approved

- Production file edits via SFTP
- WP Pusher auto-deploy
- Invented social proof or stats
