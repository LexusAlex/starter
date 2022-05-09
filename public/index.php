<?php

declare(strict_types=1);

use DI\ContainerBuilder;
use Laminas\ConfigAggregator\ConfigAggregator;
use Laminas\ConfigAggregator\PhpFileProvider;
use Slim\Factory\AppFactory;
use Slim\Middleware\ErrorMiddleware;
use Starter\Http\Action\HomeAction;
use function Starter\Main\Configuration\env;

http_response_code(500);

require __DIR__ . '/../vendor/autoload.php';

// Сборка конфигурации
$components = ['Main', 'Slim', 'Monolog', 'Twig'];
$files = [];

foreach ($components as $component) {
    $files[] = new PhpFileProvider(__DIR__ . "/../src/{$component}/Configuration/common/*.php");
    $files[] = new PhpFileProvider(__DIR__ . "/../src/{$component}/Configuration/" . env('APPLICATION_ENV', 'prod') . '/*.php');
}

$aggregator = new ConfigAggregator($files);
$config = $aggregator->getMergedConfig();

// Контейнер внедрения зависимостей
$builder = new ContainerBuilder();
$builder->addDefinitions($config);
$container = $builder->build();

// Приложение
$application = AppFactory::createFromContainer($container);

// Промежуточное ПО
$application->addBodyParsingMiddleware();
$application->add(ErrorMiddleware::class);
// Маршруты
$application->get('/', HomeAction::class);
$application->run();
