# Starter

## Project Principles

1. Из одного репозитория можно запустить несколько экземпляров приложения (dev1, dev2, test1, test2, prod).
2. Строгое разделение конфигурации кода, конфигурацию храним в переменных окружения.
3. Окружения development, test и production должны быть максимально приближенными.
4. Каждая различная сторонняя служба является ресурсом например mysql, rabbitmq.
5. Собираем, релизим, деплоем. Если изменения залиты в прод, то запрещено их править напрямую, для этого делаем hotfix.
6. Разовые процессы администрирования должны запускаться на уровне релиза например `db.php migrate`.
**7. При инициализации проекта всегда используем `composer install` тем самым у нас всегда рабочая протестированная версия приложения.**
8. Для локальной разработки все должно быть упаковано в докер.На прод выкладываем с помощью ansible
9. Своевременное обновление ПО, внимательно следим за этим, dev (docker), prod (ansible).
10. Пишем и фронтенд и бекенд в одном приложении.
11. Пишем код так, чтобы было удобно с ним работать.
12. На проде используем mysql, но в идеале с легкостью можем переключиться на postgresql

## Software

### production

- php 8.1.2 [https://github.com/php/php-src/tags](https://github.com/php/php-src/tags)
- composer 2.2.6 [https://github.com/composer/composer/tags](https://github.com/composer/composer/tags)
- nginx 1.21.6 [https://github.com/nginx/nginx/tags](https://github.com/nginx/nginx/tags)
- mysql 8.0.28 [https://github.com/mysql/mysql-server/tags](https://github.com/mysql/mysql-server/tags)

### development

- postgresql 14.2 [https://github.com/postgres/postgres/tags](https://github.com/postgres/postgres/tags)

## Initialization| commands

### development

```shell
make init # Сборка проекта с нуля для разработки сюда входит: удаление всех контейнеров и томов из предыдущего состояния, скачивание образов, сборка образов, запуск приложения с бд mysql, запуск приложения
make docker-up # поднять контейнеры без бд
make docker-up-mysql # поднять контейнеры с бд mysql
make docker-up-postgres # поднять контейнеры с бд postgres
make docker-up-db # поднять контейнер со всеми базами данных
make docker-down # остановить контейнеры
make backend-composer-outdated # проверить обновления для пакетов composer
make backend-check-version-soft # версии ПО запущенного в docker контейнере
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
