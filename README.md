# Starter

## Project Principles

1. Своевременное обновление ПО, внимательно следим, не запускаем это дело.
2. Пишем и фронтенд и бекенд в одном приложении.
3. Для локальной разработки все должно быть упаковано в докер.
4. На прод выкладываем с помощью ansible

## Software

Единообразно dev и prod

- php 8.1.1 [https://github.com/php/php-src/tags](https://github.com/php/php-src/tags)
- composer 2.2.3 [https://github.com/composer/composer/tags](https://github.com/composer/composer/tags)
- nginx 1.21.5 [https://github.com/nginx/nginx/tags](https://github.com/nginx/nginx/tags)

## Initialization

```shell
make init # Сборка проекта с нуля с только что с клонированном репозитории
```

## Structure

**infrastructure**

Различные инфраструктурные вещи нужные для развертывания приложения в разных окружениях.

**frontend**

Блоки, html, css, gulp

```shell
make frontend-dev-start # запуск фронта для разработки
make frontend-build # сборка фронта для деплоя и интерграции с сайтом
```
