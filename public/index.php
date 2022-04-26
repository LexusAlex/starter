<?php
declare(strict_types=1);

use Laminas\ConfigAggregator\ConfigAggregator;
use Laminas\ConfigAggregator\PhpFileProvider;
use Starter\Components\Container\SimpleContainer;

require __DIR__ . '/../vendor/autoload.php';

$container = new SimpleContainer();

$aggregator = new ConfigAggregator([
    new PhpFileProvider(__DIR__ . '/../src/Configuration/common/*.php'),
    //new PhpFileProvider(__DIR__ . '/' . env('APP_ENV', 'prod') . '/*.php'),
]);

return $aggregator->getMergedConfig();
