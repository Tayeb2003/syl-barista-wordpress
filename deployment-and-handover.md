# Deployment and Handover

## Pre-launch checklist

- Configure all `Business Details` customizer values.
- Build and assign `Primary Menu`.
- Set static homepage to `Home`.
- Test reservation form email delivery (`WP Mail SMTP` recommended).
- Compress all media assets and use `webp` where possible.

## Launch steps

1. Backup current production database and files.
2. Deploy theme folder `wp-content/themes/syl-barista`.
3. Activate theme in Appearance -> Themes.
4. Flush cache (hosting cache + plugin cache + CDN).
5. Re-test key pages: Home, Menu, Reservations, Contact, Locations.

## Validation after launch

- Lighthouse run on mobile and desktop for homepage.
- Rich Results Test for local business schema.
- Validate CTA links: phone, WhatsApp, map, reservation.
- Verify keyboard navigation and visible focus states.
- Confirm reduced-motion behavior in browser accessibility settings.

## Analytics and tracking

- Add GA4 and Search Console via approved plugin or header injection.
- Track conversions:
  - reservation form submissions
  - click-to-call
  - WhatsApp clicks
  - map open actions

## Editor handover (non-technical)

- Update text from page editor and block editor.
- Update business details from Customizer.
- Add menu items in Appearance -> Menus.
- Add blog entries in Posts -> Add New.
- Replace photos with optimized files and meaningful alt text.

## Maintenance cadence

- Weekly: plugin/theme updates and form submission checks.
- Monthly: performance check and broken link scan.
- Quarterly: content refresh and SEO keyword review.
