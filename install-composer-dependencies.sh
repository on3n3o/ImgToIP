#!/bin/bash

docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v "$(pwd):/var/www/html" \
    -w /var/www/html \
    laravelsail/php74-composer:latest \
    composer require laravel/sail "^1.0" --dev