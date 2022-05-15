<?php

declare(strict_types=1);

namespace Starter\Configuration\Test;

use PHPUnit\Framework\TestCase;
use stdClass;

/**
 * @internal
 */
final class ContainerTest extends TestCase
{
    protected $backupStaticAttributes;
    protected $runTestInSeparateProcess;

    public function testCreateContainer(): void
    {
        $configuration = require __DIR__ . '/../configuration.php';
        $container = (require __DIR__ . '/../container.php')($configuration);

        $dummy = new stdClass();
        $container->set('key', $dummy);
        self::assertSame($dummy, $container->get('key'));
    }
}
