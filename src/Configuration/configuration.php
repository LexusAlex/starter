<?php

declare(strict_types=1);

// Сборка конфигурации
use Laminas\ConfigAggregator\ConfigAggregator;
use Laminas\ConfigAggregator\PhpFileProvider;
use function Starter\Configuration\env;

$components = ['Main', 'Slim', 'Monolog', 'Twig'];

$files = [];

foreach ($components as $component) {
    $files[] = new PhpFileProvider(__DIR__ . "/../{$component}/Configuration/common/*.php");
    $files[] = new PhpFileProvider(__DIR__ . "/../{$component}/Configuration/" . env('APPLICATION_ENV', 'prod') . '/*.php');
}

$aggregator = new ConfigAggregator($files);

return $aggregator->getMergedConfig();
