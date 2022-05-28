<?php

declare(strict_types=1);

namespace Starter\Http\Action\Bootstrap;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Starter\Http\Response\TwigResponse;
use Twig\Environment;

final class IndexAction implements RequestHandlerInterface
{
    private Environment $environment;

    public function __construct(Environment $environment)
    {
        $this->environment = $environment;
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        return new TwigResponse('bootstrap/index.html.twig', $this->environment, []);
    }
}
