<?php

declare(strict_types=1);

namespace Starter\Configuration\Test;

use PHPUnit\Framework\TestCase;
use RuntimeException;
use function Starter\Configuration\env;

/**
 * @internal
 */
final class EnvTest extends TestCase
{
    protected $backupStaticAttributes;
    protected $runTestInSeparateProcess;

    public function testEnvUndefined(): void
    {
        $this->expectException(RuntimeException::class);
        env('APPLICATION_ENV1');
    }

    public function testEnvSuccess(): void
    {
        $env = env('APPLICATION_ENV');
        self::assertEquals('dev', $env);
    }

    public function testEnvDefault(): void
    {
        $env = env('APPLICATION_ENV34', 'prod');
        self::assertEquals('prod', $env);
    }
}
