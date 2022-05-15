<?php

declare(strict_types=1);
use Psr\Container\ContainerInterface;
use Psr\Http\Message\ResponseFactoryInterface;
use Psr\Log\LoggerInterface;
use Slim\Handlers\ErrorHandler;
use Slim\Interfaces\CallableResolverInterface;
use Slim\Middleware\ErrorMiddleware;
use Starter\Slim\ErrorHandler\LogErrorHandler;
use Starter\Slim\ErrorHandler\TwigErrorRenderer;
use function Starter\Configuration\env;

return [
    ErrorMiddleware::class => static function (ContainerInterface $container): ErrorMiddleware {
        $callableResolver = $container->get(CallableResolverInterface::class);
        $responseFactory = $container->get(ResponseFactoryInterface::class);
        /**
         * @psalm-suppress MixedArrayAccess
         * @var array{display_details:bool} $config
         */
        $config = $container->get('configuration')['error-middleware'];

        $middleware = new ErrorMiddleware(
            $callableResolver,
            $responseFactory,
            $config['display_details'],
            true,
            true
        );

        $logger = $container->get(LoggerInterface::class);

        $middleware->setDefaultErrorHandler(
            new LogErrorHandler($callableResolver, $responseFactory, $logger)
        );

        if (!$config['display_details']) {
            /** @var ErrorHandler $defaultHandler */
            $defaultHandler = $middleware->getDefaultErrorHandler();
            $defaultHandler->registerErrorRenderer('text/html', TwigErrorRenderer::class);
        }

        return $middleware;
    },

    'configuration' => [
        'error-middleware' => [
            'display_details' => (bool)env('APPLICATION_DEBUG', '0'),
        ],
    ],
];
