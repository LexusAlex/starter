<?php

declare(strict_types=1);

namespace Starter\Slim\Test\Configuration;

use PHPUnit\Framework\TestCase;
use Psr\Container\ContainerInterface;
use Slim\Middleware\ErrorMiddleware;

/**
 * @internal
 */
final class ErrorMiddlewareTest extends TestCase
{
    protected $runTestInSeparateProcess;
    protected $backupStaticAttributes;

    public function testError(): void
    {
        $configuration = require __DIR__ . '/../../../Configuration/configuration.php';
        /** @var ContainerInterface $container */
        $container = (require __DIR__ . '/../../../Configuration/container.php')($configuration);
        /** @var ErrorMiddleware $error */
        $error = $container->get(ErrorMiddleware::class);
        self::assertInstanceOf(ErrorMiddleware::class, $error);
    }
}
