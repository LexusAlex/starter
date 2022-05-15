<?php

declare(strict_types=1);

namespace Starter\Configuration\Test;

use PHPUnit\Framework\TestCase;

/**
 * @internal
 */
final class ConfigurationTest extends TestCase
{
    protected $backupStaticAttributes;
    protected $runTestInSeparateProcess;

    public function testConfiguration(): void
    {
        $configuration = require __DIR__ . '/../configuration.php';
        self::assertNotEmpty($configuration);
    }
}
