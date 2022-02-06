## Структура 

Структура проекта по фичам, абсолютно любая иерархия зависит от задач
Идеальная программная модель приложения должна максимально повторять устройство этого бизнеса и быть удобна для всех его работников.
Можно найти более удачный способ разбиения при котором связи будут минимальны
Фича - это общее название любой функциональности, все что относится к фиче лежит внутри фичи
Ограниченного контекст - область единого языка в терминологии DDD.

Организации проектируют системы, которые копируют структуру коммуникаций в этой организации или при разработке cms

package-by-type
package-by-layer
package-by-feature + 

1. Позволяет контролировать связанность и зацепление
2. Масштабируется
3. Отражает структуру компании

Примерная структура

configuration/
    slim.php
src/
    /Gateway
        /Http
            /Controller
                /Authentication
                    /SignUp
                        RequestController.php
                HomeController.php
            /Response
            /Middleware
            /Test
            /Exception
        /Console
            /Consumer
    /Modules 
        /Authentication
            /Command
            /Configuration
                authentication.php
            /Entity
                /User
            /Service
            /Event
            /Query
            /Test
        /Blog
        /Shop
            /Catalog
                /Entity
                /Test
            /Order
            /Delivery
        /Comments
        /Profile
            /Entity
                /Person
        /Reviews
            /Entity
                /Reviewer
        /Mailer
        /Validator
        /Translator
        /Template
        /Location
            /Entity
                /Region
            /Test
        /Report
        /BlogStatistic
            /ReportXls
                /Query
                /Index
        /Twig
            /Configuration
                twig.php
test/
    Functional/

## Инструменты

Дмитрий Елисеев https://www.youtube.com/watch?v=EvVSxVzFEUg
https://elisdn.ru/blog/142/structs-or-objects
https://elisdn.ru/blog/148/dependency-injection
https://elisdn.ru/blog/150/entity-dependencies

для cli 
https://github.com/wp-cli/php-cli-tools

Webmozart\Assert\Assert - удобная библиотека для проверки значений

### SOLID

https://www.youtube.com/watch?v=TxZwqVTaCmA

## Задачи 
- twig 
- Права доступа 
- Внедрение symfony-mailer
- Настройка окружения
- Настройка инфраструктуры
- ansible
- Отдельная задача - выбор правильных пакетов
- Проработка требований
- ~~Приложение 12 факторов~~
- внедрение deptrac https://github.com/qossmic/deptrac - контроль зависимостей проекта
- При проектировании полность описать ТЗ
- рассмотреть использование Memcached и Redis.
  
  - Например у сущности должны быть реализованы операции add, remove, update, delete
  - подробнее в статье https://elisdn.ru/blog/142/structs-or-objects
  - Полноценные объекты мы чаще всего будем называть доменными сущностями, агрегатами или объектами-значениями. А служебные процедуры и функции, оказывающие какие-то услуги, мы и будем называть сервисами.
  - Возможно нужно создавать вспомогательные объекты для сохранения структур в бд.

## Материалы

создание файла на удаленном хосте ansible all -i inventory.ini -m ansible.builtin.file -a "path=/tmp/hello_world state=touch"

## Базы данных

Для dev используем mysql и postgres

mysql название бд = postgres название схемы

### https://github.com/symfony/mailer

docker-compose run --rm backend-php-cli composer require symfony/mailer

Тестируем отдельно

### Doctrine ORM

https://deworker.pro/edu/series/interactive-site/db-and-orm
https://elisdn.ru/blog/108/domain-entities-doctrine

## Фронтенд

По большому счету фронтенд собирается локально, самиv рендером будет заниматься php

https://github.com/andreyalexeich/gulp-scss-starter

Как работать с фронтендом

css здесь используем scss файлы подключаем в main.css
в папке vendor все внешние фреймворки и зависимости
собираем блоками по бэм

js собирается похожим образом, подключаем все в один файл main.js

Картинки

docker-compose run --rm frontend-nodejs-cli npm install --save-dev gulp-imagemin imagemin-pngquant imagemin-zopfli imagemin-mozjpeg imagemin-giflossy gulp-newer
docker-compose run --rm frontend-nodejs-cli npm install --save-dev bootstrap-icons
### Сетка 

Используем bootstap5 и не парим мозг, но используем с умом
Плейлист по которому правильно делать
https://www.youtube.com/watch?v=v5mXg3yVY8E&list=PLU0nVsJXPyy_nzjcojRdasNJQvlJzocjz

Принимаем решение подключать фронтенд просто файликами, дабы не тратить время на разбор как и что правильно подключать.

### Шрифт

Montserrat

https://getbootstrap.su/docs/5.0/examples/

