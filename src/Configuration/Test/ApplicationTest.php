<?php

declare(strict_types=1);

namespace Starter\Configuration\Test;

use PHPUnit\Framework\TestCase;

/**
 * @internal
 */
final class ApplicationTest extends TestCase
{
    protected $backupStaticAttributes;
    protected $runTestInSeparateProcess;

    public function testApplication(): void
    {
        $configuration = (require __DIR__ . '/../configuration.php');
        $container = (require __DIR__ . '/../container.php')($configuration);
        $application = (require __DIR__ . '/../application.php')($container);

        self::assertEquals('Slim\App', $application::class);
    }
}
