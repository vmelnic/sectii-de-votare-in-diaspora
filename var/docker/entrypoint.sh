#!/bin/bash

if [ ! -d /var/www/html/vendor ]; then
  echo -e "Installing PHP vendor libraries...\n"
  cd /var/www/html && composer install
fi

exec "$@"
