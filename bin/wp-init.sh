#!/bin/sh
set -e

echo "Waiting for wp-config.php..."
until [ -f /var/www/html/wp-config.php ]; do
  sleep 2
done

echo "Waiting for database connection..."
while true; do
  output=$(wp core is-installed --path=/var/www/html --allow-root 2>&1) || true
  if ! echo "$output" | grep -q "Error establishing a database connection"; then
    break
  fi
  sleep 2
done

if ! wp core is-installed --path=/var/www/html --allow-root 2>/dev/null; then
  echo "Installing WordPress..."
  wp core install \
    --path=/var/www/html \
    --allow-root \
    --url="${WP_URL}" \
    --title="${WP_TITLE}" \
    --admin_user="${WP_ADMIN_USER}" \
    --admin_password="${WP_ADMIN_PASSWORD}" \
    --admin_email="${WP_ADMIN_EMAIL}" \
    --skip-email
else
  echo "WordPress already installed, skipping."
fi

echo "Activating theme ${THEME_SLUG}..."
wp theme activate "${THEME_SLUG}" --path=/var/www/html --allow-root

echo "Setting permalink structure..."
wp rewrite structure '/%postname%/' --path=/var/www/html --allow-root
wp rewrite flush --path=/var/www/html --allow-root

echo "Done."
