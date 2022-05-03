<?php

declare(strict_types=1);

use DI\ContainerBuilder;
use Laminas\ConfigAggregator\ConfigAggregator;
use Laminas\ConfigAggregator\PhpFileProvider;
use Slim\Factory\AppFactory;
use Starter\Http\Action\HomeAction;

require __DIR__ . '/../vendor/autoload.php';

$builder = new ContainerBuilder();

$aggregator = new ConfigAggregator([
    new PhpFileProvider(__DIR__ . '/../src/Configuration/common/*.php'),
    // new PhpFileProvider(__DIR__ . '/' . env('APP_ENV', 'prod') . '/*.php'),
]);

$builder->addDefinitions($aggregator->getMergedConfig());

$container = $builder->build();

$application = AppFactory::createFromContainer($container);
$application->addBodyParsingMiddleware();
$application->addErrorMiddleware(false, false, false);
$application->get('/', HomeAction::class);
$application->run();
