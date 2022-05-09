<?php

declare(strict_types=1);

namespace Starter\Http\Response;

use Slim\Psr7\Factory\StreamFactory;
use Slim\Psr7\Headers;
use Slim\Psr7\Response;
use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;

final class TwigResponse extends Response
{
    private Environment $environment;

    /**
     * @throws SyntaxError
     * @throws RuntimeError
     * @throws LoaderError
     */
    public function __construct(string $template, Environment $environment, array $vars = [])
    {
        $this->environment = $environment;
        parent::__construct(
            200,
            new Headers(['Content-Type' => 'text/html']),
            (new StreamFactory())->createStream($environment->render($template, $vars))
        );
    }
}
