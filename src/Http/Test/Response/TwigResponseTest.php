<?php

declare(strict_types=1);

namespace Starter\Http\Test\Response;

use PHPUnit\Framework\TestCase;
use Psr\Container\ContainerInterface;
use Starter\Http\Response\TwigResponse;
use Twig\Environment;

/**
 * @internal
 */
final class TwigResponseTest extends TestCase
{
    protected $runTestInSeparateProcess;
    protected $backupStaticAttributes;

    public function testDefault(): void
    {
        $configuration = require __DIR__ . '/../../../Configuration/configuration.php';
        /** @var ContainerInterface $container */
        $container = (require __DIR__ . '/../../../Configuration/container.php')($configuration);
        /** @var Environment $twig */
        $twig = $container->get('Twig\Environment');

        $response = new TwigResponse('pages/index.html.twig', $twig);

        self::assertEquals('text/html', $response->getHeaderLine('Content-Type'));
        self::assertEquals(200, $response->getStatusCode());
    }
}
