<?php

declare(strict_types=1);

use DI\ContainerBuilder;
use Laminas\ConfigAggregator\ConfigAggregator;
use Laminas\ConfigAggregator\PhpFileProvider;
use Slim\Factory\AppFactory;
use Slim\Middleware\ErrorMiddleware;
use Starter\Http\Action\HomeAction;

require __DIR__ . '/../vendor/autoload.php';

// Контейнер
$builder = new ContainerBuilder();

$aggregator = new ConfigAggregator([
    new PhpFileProvider(__DIR__ . '/../src/Main/Configuration/common/*.php'),
    new PhpFileProvider(__DIR__ . '/../src/Slim/Configuration/common/*.php'),
    new PhpFileProvider(__DIR__ . '/../src/Monolog/Configuration/common/*.php'),
    // new PhpFileProvider(__DIR__ . '/' . env('APP_ENV', 'prod') . '/*.php'),
]);

$builder->addDefinitions($aggregator->getMergedConfig());

$container = $builder->build();

// Приложение
$application = AppFactory::createFromContainer($container);

// Промежуточное ПО
$application->addBodyParsingMiddleware();
$application->add(ErrorMiddleware::class);
// Маршруты
$application->get('/', HomeAction::class);
$application->run();
