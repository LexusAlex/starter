# Starter

## Project Principles

1. Своевременное обновление ПО, внимательно следим, не запускаем это дело.
   1. Собираем и скачиваем новые образы `make docker-build-pull`
   2. Проверяем обновы пакетов `make backend-composer-outdated`, `make frontend-check-update`
2. Пишем и фронтенд и бекенд в одном приложении.
3. Для локальной разработки все должно быть упаковано в докер.
4. На прод выкладываем с помощью ansible
5. Пишем код так, чтобы было удобно с ним работать.

## Software

Единообразно dev и prod

- php 8.1.1 [https://github.com/php/php-src/tags](https://github.com/php/php-src/tags)
- composer 2.2.3 [https://github.com/composer/composer/tags](https://github.com/composer/composer/tags)
- nginx 1.21.5 [https://github.com/nginx/nginx/tags](https://github.com/nginx/nginx/tags)

## Initialization

```shell
make init # Сборка проекта с нуля для разработки
```

## Structure

**infrastructure**

Различные инфраструктурные вещи нужные для развертывания приложения в разных окружениях.

**frontend**

Фронтендерские штуки, Блоки, html, css, gulp

```shell
make frontend-dev-start # запуск фронта для разработки
make frontend-build # сборка фронта для деплоя и интерграции с сайтом
```

**node_modules**
**vendor**

Внешние зависимости

**public**

Точка входа в приложение
