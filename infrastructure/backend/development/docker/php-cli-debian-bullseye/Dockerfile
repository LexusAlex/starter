FROM php:8.1.1-cli-bullseye

RUN mv $PHP_INI_DIR/php.ini-development $PHP_INI_DIR/php.ini

RUN addgroup --gid 1000 starter && adduser --uid 1000 --ingroup starter -shell /bin/bash --disabled-password starter

RUN apt update && apt install -y unzip

COPY --from=composer:2 /usr/bin/composer /usr/local/bin/composer

WORKDIR /starter

USER starter

