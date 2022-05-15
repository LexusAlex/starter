<?php

declare(strict_types=1);

namespace Starter\Http\Test\Response;

use PHPUnit\Framework\TestCase;
use Starter\Http\Response\HtmlResponse;

/**
 * @internal
 */
final class HtmlResponseTest extends TestCase
{
    protected $runTestInSeparateProcess;
    protected $backupStaticAttributes;

    public function testDefault(): void
    {
        $response = new HtmlResponse($html = '<html lang="en"></html>');

        self::assertEquals('text/html', $response->getHeaderLine('Content-Type'));
        self::assertEquals($html, $response->getBody()->getContents());
        self::assertEquals(200, $response->getStatusCode());
    }

    public function testWithCode(): void
    {
        $response = new HtmlResponse($html = '<html lang="en"></html>', 201);

        self::assertEquals('text/html', $response->getHeaderLine('Content-Type'));
        self::assertEquals($html, $response->getBody()->getContents());
        self::assertEquals(201, $response->getStatusCode());
    }
}
