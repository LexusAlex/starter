## Структура 

Структура проекта по фичам, абсолютно любая иерархия зависит от задач
Идеальная программная модель приложения должна максимально повторять устройство этого бизнеса и быть удобна для всех его работников.
Можно найти более удачный способ разбиения при котором связи будут минимальны
Фича - это общее название любой функциональности.
Ограниченного контекст - область единого языка в терминологии DDD.

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
deptrac https://github.com/qossmic/deptrac

## Задачи 
- twig 
- Права доступа 
- Внедрение symfony-mailer
- Настройка окружения
- Настройка инфраструктуры
- ansible
- Отдельная задача - выбор правильных пакетов
- Проработка требований
- Приложение 12 факторов

## Материалы

создание файла на удаленном хосте ansible all -i inventory.ini -m ansible.builtin.file -a "path=/tmp/hello_world state=touch"

