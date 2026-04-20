#!/usr/bin/env bash
set -euo pipefail

# Syl Barista post-import setup helper
# Usage:
#   ./docs/setup-wpcli.sh
# Optional:
#   SITE_URL="https://example.com" ./docs/setup-wpcli.sh

if ! command -v wp >/dev/null 2>&1; then
  echo "Error: wp-cli is not installed or not in PATH."
  exit 1
fi

if [[ -n "${SITE_URL:-}" ]]; then
  WP="wp --url=${SITE_URL}"
else
  WP="wp"
fi

echo "Locating required pages..."
HOME_ID="$($WP post list --post_type=page --title=Home --field=ID --posts_per_page=1)"
JOURNAL_ID="$($WP post list --post_type=page --title=Journal --field=ID --posts_per_page=1)"

if [[ -z "${HOME_ID}" ]]; then
  echo "Error: 'Home' page not found. Import content seed first."
  exit 1
fi

echo "Setting static homepage..."
$WP option update show_on_front page
$WP option update page_on_front "${HOME_ID}"

if [[ -n "${JOURNAL_ID}" ]]; then
  echo "Setting posts page to Journal..."
  $WP option update page_for_posts "${JOURNAL_ID}"
else
  echo "Journal page not found; skipping posts page assignment."
fi

echo "Finding Primary menu..."
MENU_TERM_ID="$($WP menu list --fields=term_id,name --format=csv | awk -F',' '$2=="Primary"{print $1}' | head -n 1)"

if [[ -z "${MENU_TERM_ID}" ]]; then
  echo "Primary menu not found; creating one."
  $WP menu create "Primary" >/dev/null
  MENU_TERM_ID="$($WP menu list --fields=term_id,name --format=csv | awk -F',' '$2=="Primary"{print $1}' | head -n 1)"
fi

if [[ -z "${MENU_TERM_ID}" ]]; then
  echo "Error: could not determine Primary menu term ID."
  exit 1
fi

echo "Assigning Primary menu to theme location..."
$WP menu location assign "${MENU_TERM_ID}" primary

echo "Done."
echo "- Home page ID: ${HOME_ID}"
if [[ -n "${JOURNAL_ID}" ]]; then
  echo "- Journal page ID: ${JOURNAL_ID}"
fi
echo "- Primary menu term ID: ${MENU_TERM_ID}"
