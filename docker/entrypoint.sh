#!/bin/bash


if [ ! -f "vednor/autoload.php" ]; then
 composer install --no-progress --no-interaction
fi

if [ ! -f ".env" ]; then
  echo "Creating env file for $APP_ENV"
  cp .env.example .env
  php artisan key:generate
else
 echo ".env file exists"
fi

# php artisan migrate
# php artisan db:seed
# php artisan key:generate
php artisan cache:clear
php artisan config:clear
php artisan route:cache
php artisan route:clear
php artisan optimize

php artisan serve --port=$PORT  --host=0.0.0.0  --env=.env
exec docker-php-entrypoint "$@"
