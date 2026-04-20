# Syl Barista WordPress Theme

Production-ready, modern-luxury WordPress theme for the coffee shop brand **Syl Barista**.

## Package contents

- `wp-content/themes/syl-barista/`: installable custom theme
- `docs/brand-system.md`: finalized visual and motion system
- `docs/content-model.md`: site map, page goals, and CMS content checklist
- `docs/production-content-pack.md`: launch-ready copy and menu content
- `docs/media-shot-list.csv`: image direction and placement checklist
- `docs/syl-barista-content-seed.xml`: WordPress import-ready content seed
- `docs/syl-barista-content-seed-with-menu.xml`: content seed with menu items included
- `docs/import-seed-guide.md`: step-by-step import and setup instructions
- `docs/setup-wpcli.sh`: one-command post-import setup automation
- `docs/create-menu-wpcli.sh`: auto-build primary menu from imported pages
- `docs/deployment-and-handover.md`: launch, QA, analytics, and editor handover guide

## Quick start

1. Copy `wp-content/themes/syl-barista` into your WordPress installation themes directory.
2. In WordPress admin, activate **Syl Barista** theme.
3. Set Reading -> Homepage to a static page named `Home`.
4. Assign menu in Appearance -> Menus to the `Primary Menu` location.
5. Configure the following customizer settings:
   - `Phone Number`
   - `WhatsApp Link`
   - `Reservation Email`
   - `Street Address`
   - `Opening Hours`
   - `Google Map Link`
6. Create pages matching the sitemap in `docs/content-model.md`.

## Theme capabilities

- Full responsive modern-luxury UI with animations
- Home page sections: hero, signature drinks, story, menu preview, testimonials, reservation CTA, location panel
- Business conversion actions: reserve, call, WhatsApp, map deep-link
- Local SEO JSON-LD schema (`CafeOrCoffeeShop`)
- Accessibility and reduced-motion support
- Editor styles and Gutenberg-friendly content defaults

## Recommended plugins (optional)

- SEO plugin (Yoast / RankMath) for advanced metadata workflows
- WP Mail SMTP for reliable contact and reservation email delivery
- Caching plugin for production performance

## Testing checklist

- Verify mobile and desktop UI
- Submit reservation form and confirm email delivery
- Validate schema in Google Rich Results Test
- Run Lighthouse on homepage and contact page
