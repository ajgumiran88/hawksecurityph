# HAWK Security Visual Refactor Implementation Plan

> **For agentic workers:** REQUIRED SUB-SKILL: Use superpowers:subagent-driven-development (recommended) or superpowers:executing-plans to implement this plan task-by-task. Steps use checkbox (`- [ ]`) syntax for tracking.

**Goal:** Deliver a cohesive, premium public visual system through the existing HAWK child theme without changing WordPress or plugin behavior.

**Architecture:** Keep Solutech and WPBakery as content/runtime owners. Update only the tracked child theme: global templates add presentation and accessibility markup, CSS applies scoped tokens and component rules, and JavaScript reinforces accessible mobile navigation without routing or form changes.

**Tech Stack:** WordPress child theme, PHP templates, scoped CSS, progressive browser JavaScript.

**Spec:** `docs/superpowers/specs/2026-08-21-hawk-visual-refactor-design.md`

## Global Constraints

- Preserve routes, menus, WPBakery content, Contact Form 7 fields/actions, job queries, shortcodes, hooks, and plugin callbacks.
- Use only `hawk-` / `hawk-v2-` prefixes for new custom CSS classes.
- Use the untouched official HAWK logo; never add fabricated facts, social proof, social destinations, or remote production imagery.
- Use `#F4E52A`, `#D7B72D`, `#070707`, `#1B1B1B`, `#4B5563`, `#F6F6F3`, and `#E7E5E0` as the visual token baseline.
- Keep nonessential motion within 150-300 ms and disable it for `prefers-reduced-motion`.

---

### Task 1: Lock the presentation contract

**Files:**
- Create: `tests/child-theme-visual-contract.php`
- Modify: none

**Interfaces:**
- Consumes: child-theme template and asset files.
- Produces: a PHP CLI process that returns non-zero when required visual/accessibility contracts are absent.

- [ ] **Step 1: Write the failing test**

Create assertions that require the HAWK palette, Plus Jakarta Sans/Inter font loading, a skip link and matching main target, drawer focus-management hooks, and a reduced-motion rule.

- [ ] **Step 2: Run test to verify it fails**

Run: `php tests/child-theme-visual-contract.php`

Expected: a non-zero exit identifying missing current-design contracts.

- [ ] **Step 3: Implement the minimal presentation changes needed by the checks**

Modify the child templates, CSS, and JavaScript only where each contract belongs.

- [ ] **Step 4: Run test to verify it passes**

Run: `php tests/child-theme-visual-contract.php`

Expected: `PASS` for every required contract.

### Task 2: Refine the global public shell

**Files:**
- Modify: `themes/hawk-security-child/header.php`
- Modify: `themes/hawk-security-child/footer.php`
- Modify: `themes/hawk-security-child/functions.php`
- Modify: `themes/hawk-security-child/assets/css/hawk-v2.css`
- Modify: `themes/hawk-security-child/assets/js/hawk-v2.js`

**Interfaces:**
- Consumes: `hawk_render_primary_nav()`, `hawk_get_logo_url()`, WordPress `wp_head()`, `wp_body_open()`, and `wp_footer()`.
- Produces: semantic header/navigation/drawer/footer markup and scoped styling that preserve all existing route and menu rendering.

- [ ] **Step 1: Keep the test failing until the required global semantic hooks exist**

Use the Task 1 test output to identify the missing `#hawk-v2-main-content` target, skip link, focusable drawer panel, and font/token contracts.

- [ ] **Step 2: Add only presentation and accessibility markup**

Add a skip link ahead of the masthead, add `id="hawk-v2-main-content" tabindex="-1"` to both page templates' main element, retain existing logo/menu/CTA rendering, and remove unverifiable generic social buttons from the footer.

- [ ] **Step 3: Add scoped shell tokens and interaction styling**

Use child-theme CSS to apply the approved fonts/tokens, visible focus rings, compact navigation, responsive drawer styling, footer hierarchy, and header offset.

- [ ] **Step 4: Add progressive drawer focus handling**

Store the trigger element, focus the close control on open, restore focus on close, and trap only Tab/Shift+Tab within the open drawer.

- [ ] **Step 5: Run contract and PHP checks**

Run: `php tests/child-theme-visual-contract.php && find themes/hawk-security-child -name '*.php' -print0 | xargs -0 -n1 php -l`

Expected: all contracts and PHP syntax checks pass.

### Task 3: Apply the cohesive homepage and inner-page visual system

**Files:**
- Modify: `themes/hawk-security-child/template-parts/hero.php`
- Modify: `themes/hawk-security-child/template-parts/page-banner.php`
- Modify: `themes/hawk-security-child/page-home.php`
- Modify: `themes/hawk-security-child/page-no-padding.php`
- Modify: `themes/hawk-security-child/assets/css/hawk-v2.css`

**Interfaces:**
- Consumes: existing WordPress loop, `the_content()`, approved hero/background assets, and existing page-builder/plugin markup.
- Produces: premium, responsive presentation wrappers and component rules without replacing builder output.

- [ ] **Step 1: Keep the contract test failing if homepage/inner-page hooks are absent**

Extend `tests/child-theme-visual-contract.php` to require the homepage and inner-page main targets plus scoped forms/jobs/content rules before modifying their presentation.

- [ ] **Step 2: Preserve loop and content rendering while adding semantic region hooks**

Keep `get_header()`, `get_footer()`, post loops, and `the_content()` unchanged; add only `aria-labelledby`, content container, and page-specific class hooks.

- [ ] **Step 3: Implement scoped component rules**

Style page-builder headings, rows, cards, image cards, service/listing panels, accordions, Contact Form 7 fields/status notices, and quote bands under `.hawk-v2` selectors. Use safe responsive grids that collapse without horizontal overflow.

- [ ] **Step 4: Verify source contracts and syntax**

Run: `php tests/child-theme-visual-contract.php && find themes/hawk-security-child -name '*.php' -print0 | xargs -0 -n1 php -l`

Expected: pass.

### Task 4: Validate the release candidate

**Files:**
- Modify: `tests/child-theme-visual-contract.php` only if a required presentation contract lacks coverage.

**Interfaces:**
- Consumes: final child-theme source.
- Produces: verified source-ready child-theme changes.

- [ ] **Step 1: Run full static validation**

Run: `php tests/child-theme-visual-contract.php && find themes/hawk-security-child -name '*.php' -print0 | xargs -0 -n1 php -l && git diff --check`

Expected: all commands exit zero.

- [ ] **Step 2: Audit protected behavior boundaries**

Run: `git diff -- themes/hawk-security-child/functions.php themes/hawk-security-child/page-home.php themes/hawk-security-child/page-no-padding.php`

Expected: only presentation, escaping, accessible landmarks, asset handles/versions, or progressive enhancement changes; no form/query/shortcode/plugin logic change.

- [ ] **Step 3: Review responsive and motion source contracts**

Run: `rg -n '@media \(max-width: (1080|768|480)px\)|prefers-reduced-motion|focus-visible|wpcf7|job' themes/hawk-security-child/assets/css/hawk-v2.css`

Expected: responsive, reduced-motion, focus, form, and job-listing coverage is present.
