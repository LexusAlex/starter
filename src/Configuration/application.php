<?php

declare(strict_types=1);

use Psr\Container\ContainerInterface;
use Slim\App;
use Slim\Factory\AppFactory;
use Slim\Middleware\ErrorMiddleware;
use Starter\Http\Action\HomeAction;

return static function (ContainerInterface $container): App {
    // Приложение
    $application = AppFactory::createFromContainer($container);

    // Промежуточное ПО
    $application->addBodyParsingMiddleware();
    $application->add(ErrorMiddleware::class);

    // Маршруты
    $application->get('/', HomeAction::class);

    return $application;
};
