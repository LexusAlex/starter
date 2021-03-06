<?php

declare(strict_types=1);

use Monolog\Handler\RotatingFileHandler;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Psr\Container\ContainerInterface;
use Psr\Log\LoggerInterface;
use function Starter\Configuration\env;

return [
    LoggerInterface::class => static function (ContainerInterface $container) {
        /**
         * @psalm-suppress MixedArrayAccess
         * @var array{
         *     debug:bool,
         *     stderr:bool,
         *     file:string,
         *     processors:string[]
         * } $config
         */
        $config = $container->get('configuration')['logger'];

        $level = $config['debug'] ? Logger::DEBUG : Logger::INFO;

        $log = new Logger('Starter');

        if ($config['stderr']) {
            $log->pushHandler(new StreamHandler('php://stderr', $level));
        }

        if (!empty($config['file'])) {
            $log->pushHandler(new RotatingFileHandler($config['file'], $level));
        }

        /*foreach ($config['processors'] as $class) {
            $processor = $container->get($class);
            $log->pushProcessor($processor);
        }*/

        return $log;
    },

    'configuration' => [
        'logger' => [
            'debug' => (bool)env('APPLICATION_DEBUG', '0'),
            'file' => __DIR__ . '/../../../../var/log/' . PHP_SAPI . '/app.log',
            'stderr' => true,
            'processors' => [
                // FeaturesMonologProcessor::class,
            ],
        ],
    ],
];
