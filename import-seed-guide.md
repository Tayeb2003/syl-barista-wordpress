# WordPress Seed Import Guide

## Import content file

1. Open WordPress admin.
2. Go to `Tools -> Import`.
3. Install/Run `WordPress` importer.
4. Upload either:
   - `docs/syl-barista-content-seed.xml` (content only), or
   - `docs/syl-barista-content-seed-with-menu.xml` (content + menu items)
5. Assign imported content to your admin user.
6. Do not import attachments (this file includes content only).

## After import

1. Go to `Settings -> Reading`.
2. Set homepage display to `A static page`.
3. Select `Home` as homepage.
4. (Optional) Select `Journal` as posts page.

## Build primary navigation

1. Go to `Appearance -> Menus`.
2. Create a menu named `Primary`.
3. Add pages in this order:
   - Home
   - Our Story
   - Menu
   - Experience
   - Reservations
   - Locations and Hours
   - Contact
4. Assign it to `Primary Menu`.

If you imported `syl-barista-content-seed-with-menu.xml`, menu items should already exist in the imported `Primary` menu. You still need to assign that menu to the `Primary Menu` location.

## Theme settings to update immediately

Go to `Appearance -> Customize -> Business Details` and fill:

- Phone Number
- WhatsApp Link
- Reservation Email
- Street Address
- Opening Hours
- Google Map Link

## Final checks

- Confirm home page renders theme front-page design.
- Confirm reservations page shows form shortcode.
- Confirm contact and map links work.
- Replace placeholder text/images with final local details.

## Optional wp-cli automation

From the WordPress root directory, run:

`bash docs/setup-wpcli.sh`

If you need to target a specific URL:

`SITE_URL="https://your-site-url.com" bash docs/setup-wpcli.sh`

This script sets:

- static homepage to `Home`
- posts page to `Journal` (if found)
- menu location `primary` to `Primary`

## Optional menu builder (for content-only XML)

If you imported `syl-barista-content-seed.xml` (without menu items), run:

`bash docs/create-menu-wpcli.sh`

Optional URL targeting:

`SITE_URL="https://your-site-url.com" bash docs/create-menu-wpcli.sh`

This script will:

- create/find the `Primary` menu
- clear existing menu items inside `Primary`
- add pages in the intended order
- assign that menu to theme location `primary`
