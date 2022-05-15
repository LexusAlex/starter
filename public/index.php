<?php

declare(strict_types=1);

http_response_code(500);

require __DIR__ . '/../vendor/autoload.php';

$configuration = (require __DIR__ . '/../src/Configuration/configuration.php');

$container = (require __DIR__ . '/../src/Configuration/container.php')($configuration);

$application = (require __DIR__ . '/../src/Configuration/application.php')($container);
$application->run();
