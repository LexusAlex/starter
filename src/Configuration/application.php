<?php

declare(strict_types=1);

use Psr\Container\ContainerInterface;
use Slim\App;
use Slim\Factory\AppFactory;
use Slim\Middleware\ErrorMiddleware;
use Slim\Middleware\Session;
use Starter\Http\Action\Bootstrap\GridAction;
use Starter\Http\Action\Bootstrap\IndexAction;
use Starter\Http\Action\HomeAction;

return static function (ContainerInterface $container): App {
    // Приложение
    $application = AppFactory::createFromContainer($container);

    // Промежуточное ПО
    $application->addBodyParsingMiddleware();
    $application->add(Session::class);
    $application->add(ErrorMiddleware::class);

    // Маршруты
    $application->get('/', HomeAction::class);
    $application->get('/bootstrap', IndexAction::class);
    $application->get('/bootstrap/grid', GridAction::class);

    return $application;
};
