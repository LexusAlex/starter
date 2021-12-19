Сбор требований проекта

Дмитрий Елисеев https://www.youtube.com/watch?v=EvVSxVzFEUg 
deptrac https://github.com/qossmic/deptrac

Минимум зависимостей, максимум удобства

Структура проекта по фичам, абсолютно любая иерархия
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

Идеальная программная модель приложения должна максимально повторять устройство этого бизнеса и быть удобна для всех его работников.
Можно найти более удачный способ разбиения при котором связи будут минимальны

Фича - это общее название любой функциональности.
Ограниченного контекст - область единого языка в терминологии DDD.

