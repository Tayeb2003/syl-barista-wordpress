#!/usr/bin/env bash
set -euo pipefail

# Syl Barista menu builder for content-only imports
# Usage:
#   ./docs/create-menu-wpcli.sh
# Optional:
#   SITE_URL="https://example.com" ./docs/create-menu-wpcli.sh

if ! command -v wp >/dev/null 2>&1; then
  echo "Error: wp-cli is not installed or not in PATH."
  exit 1
fi

if [[ -n "${SITE_URL:-}" ]]; then
  WP="wp --url=${SITE_URL}"
else
  WP="wp"
fi

MENU_NAME="Primary"

echo "Ensuring Primary menu exists..."
MENU_TERM_ID="$($WP menu list --fields=term_id,name --format=csv | awk -F',' '$2=="'"${MENU_NAME}"'"{print $1}' | head -n 1)"
if [[ -z "${MENU_TERM_ID}" ]]; then
  $WP menu create "${MENU_NAME}" >/dev/null
  MENU_TERM_ID="$($WP menu list --fields=term_id,name --format=csv | awk -F',' '$2=="'"${MENU_NAME}"'"{print $1}' | head -n 1)"
fi

if [[ -z "${MENU_TERM_ID}" ]]; then
  echo "Error: could not determine Primary menu term ID."
  exit 1
fi

page_id_by_title() {
  local title="$1"
  $WP post list --post_type=page --title="${title}" --field=ID --posts_per_page=1
}

add_page_if_exists() {
  local page_title="$1"
  local page_id
  page_id="$(page_id_by_title "${page_title}")"
  if [[ -n "${page_id}" ]]; then
    echo "Adding menu item: ${page_title}"
    $WP menu item add-post "${MENU_NAME}" "${page_id}" >/dev/null
  else
    echo "Skipping missing page: ${page_title}"
  fi
}

echo "Clearing existing menu items from Primary..."
EXISTING_ITEMS="$($WP menu item list "${MENU_NAME}" --format=ids || true)"
if [[ -n "${EXISTING_ITEMS}" ]]; then
  for item_id in ${EXISTING_ITEMS}; do
    $WP menu item delete "${item_id}" >/dev/null
  done
fi

add_page_if_exists "Home"
add_page_if_exists "Our Story"
add_page_if_exists "Menu"
add_page_if_exists "Experience"
add_page_if_exists "Reservations"
add_page_if_exists "Locations and Hours"
add_page_if_exists "Contact"

echo "Assigning menu location..."
$WP menu location assign "${MENU_TERM_ID}" primary

echo "Done."
echo "- Primary menu term ID: ${MENU_TERM_ID}"
