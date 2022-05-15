<?php

declare(strict_types=1);

namespace Starter\Slim\Test\ErrorHandler;

use Exception;
use PHPUnit\Framework\TestCase;
use Psr\Container\ContainerInterface;
use Starter\Slim\ErrorHandler\TwigErrorRenderer;
use Twig\Environment;
use function PHPUnit\Framework\assertIsNumeric;

/**
 * @internal
 */
final class TwigErrorRenderedTest extends TestCase
{
    protected $runTestInSeparateProcess;
    protected $backupStaticAttributes;

    public function testTwigRenderer(): void
    {
        $configuration = require __DIR__ . '/../../../Configuration/configuration.php';
        /** @var ContainerInterface $container */
        $container = (require __DIR__ . '/../../../Configuration/container.php')($configuration);
        /** @var Environment $twig */
        $twig = $container->get('Twig\Environment');

        $renderer = new TwigErrorRenderer($twig);

        $template = $renderer(new Exception('Not Found'), true);
        assertIsNumeric(strpos($template, 'Not Found'));
    }
}
