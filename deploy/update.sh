#!/usr/bin/env bash

ROOT_FOLDER="$(pwd)/../";

cd ${ROOT_FOLDER}
git pull

cd ${ROOT_FOLDER}/docker
docker-compose exec console chown www-data:www-data -R /var/www/html/bootstrap/cache
docker-compose exec console chown www-data:www-data -R /var/www/html/storage
docker-compose exec console composer install --no-dev
docker-compose exec console php artisan cache:clear
docker-compose exec console php artisan route:cache
docker-compose exec console php artisan config:cache
docker-compose exec console composer dump-autoload
docker-compose restart console php-fpm supervisor nginx
