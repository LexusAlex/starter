#!/usr/bin/env php
<?php

declare(strict_types=1);

use Psr\Container\ContainerInterface;
use Symfony\Component\Console\Application;

require __DIR__ . '/../vendor/autoload.php';

$cli = new Application('Symfony console application');

$configuration = require __DIR__ . '/../src/Configuration/configuration.php';

/** @var ContainerInterface $container */
$container = (require __DIR__ . '/../src/Configuration/container.php')($configuration);

/*
$commands = $container->get('configuration')['console']['commands'];
$entityManager = $container->get(EntityManagerInterface::class);
$cli->getHelperSet()->set(new EntityManagerHelper($entityManager), 'em');

ConsoleRunner::addCommands($cli);

foreach ($commands as $name) {
    $command = $container->get($name);
    $cli->add($command);
}
*/

$cli->run();
