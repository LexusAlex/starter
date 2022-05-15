<?php

declare(strict_types=1);

use Psr\Container\ContainerInterface;
use Twig\Environment;
use Twig\Extension\DebugExtension;
use Twig\Extension\ExtensionInterface;
use Twig\Loader\FilesystemLoader;
use function Starter\Configuration\env;

return [
    Environment::class => static function (ContainerInterface $container): Environment {
        /**
         * @psalm-suppress MixedArrayAccess
         * @var array{
         *     debug:bool,
         *     template_dirs:array<string,string>,
         *     cache_dir:string,
         *     extensions:string[],
         * } $config
         */
        $config = $container->get('configuration')['twig'];

        $loader = new FilesystemLoader();

        foreach ($config['template_dirs'] as $alias => $dir) {
            $loader->addPath($dir, $alias);
        }

        $environment = new Environment($loader, [
            'cache' => $config['debug'] ? false : $config['cache_dir'],
            'debug' => $config['debug'],
            'strict_variables' => $config['debug'],
            'auto_reload' => $config['debug'],
        ]);

        if ($config['debug']) {
            $environment->addExtension(new DebugExtension());
        }

        foreach ($config['extensions'] as $class) {
            /** @var ExtensionInterface $extension */
            $extension = $container->get($class);
            $environment->addExtension($extension);
        }

        return $environment;
    },

    'configuration' => [
        'twig' => [
            'debug' => (bool)env('APPLICATION_DEBUG', '0'),
            'template_dirs' => [
                FilesystemLoader::MAIN_NAMESPACE => __DIR__ . '/../../../../src/Twig/View/starter',
            ],
            'cache_dir' => __DIR__ . '/../../../../var/cache/twig',
            'extensions' => [
                // FrontendUrlTwigExtension::class,
            ],
        ],
    ],
];
