#!/usr/bin/env bash

ROOT_FOLDER="$(pwd)/../";

cd ${ROOT_FOLDER}/docker
docker-compose exec console php artisan migrate --force
docker-compose exec console php artisan db:seed --force
