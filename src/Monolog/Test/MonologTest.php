<?php

declare(strict_types=1);

namespace Starter\Monolog\Test;

use Monolog\Logger;
use PHPUnit\Framework\TestCase;
use Psr\Container\ContainerInterface;
use Psr\Log\LoggerInterface;

/**
 * @internal
 */
final class MonologTest extends TestCase
{
    protected $runTestInSeparateProcess;
    protected $backupStaticAttributes;

    public function testMonolog(): void
    {
        $configuration = require __DIR__ . '/../../Configuration/configuration.php';
        /** @var ContainerInterface $container */
        $container = (require __DIR__ . '/../../Configuration/container.php')($configuration);
        /** @var Logger $logger */
        $logger = $container->get(LoggerInterface::class);
        self::assertEquals('Monolog\Handler\RotatingFileHandler', $logger->getHandlers()[0]::class);
    }
}
