<?php
declare(strict_types=1);

use DI\ContainerBuilder;
use Laminas\ConfigAggregator\ConfigAggregator;
use Laminas\ConfigAggregator\PhpFileProvider;

require __DIR__ . '/../vendor/autoload.php';

$builder = new ContainerBuilder();

$aggregator = new ConfigAggregator([
    new PhpFileProvider(__DIR__ . '/../src/Configuration/common/*.php'),
    //new PhpFileProvider(__DIR__ . '/' . env('APP_ENV', 'prod') . '/*.php'),
]);

$builder->addDefinitions($aggregator->getMergedConfig());

return $builder->build();
