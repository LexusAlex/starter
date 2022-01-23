FROM php:8.1-fpm-bullseye

RUN apt -y update \
    && apt install -y libpq-dev \
    && docker-php-ext-install pdo_mysql pdo_pgsql \
    && apt clean

RUN mv $PHP_INI_DIR/php.ini-development $PHP_INI_DIR/php.ini

WORKDIR /starter
