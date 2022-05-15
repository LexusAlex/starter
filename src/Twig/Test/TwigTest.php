<?php

declare(strict_types=1);

namespace Starter\Twig\Test;

use PHPUnit\Framework\TestCase;
use Psr\Container\ContainerInterface;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

/**
 * @internal
 */
final class TwigTest extends TestCase
{
    protected $runTestInSeparateProcess;
    protected $backupStaticAttributes;

    public function testTwig(): void
    {
        $configuration = require __DIR__ . '/../../Configuration/configuration.php';
        /** @var ContainerInterface $container */
        $container = (require __DIR__ . '/../../Configuration/container.php')($configuration);
        /** @var Environment $twig */
        $twig = $container->get('Twig\Environment');
        /** @var FilesystemLoader $loader */
        $loader = $twig->getLoader();
        $loader->addPath(__DIR__ . '/template/', FilesystemLoader::MAIN_NAMESPACE);
        self::assertEquals("123\n", $twig->render('index.twig', ['test' => 123]));
    }
}
