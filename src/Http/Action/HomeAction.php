<?php

declare(strict_types=1);

namespace Starter\Http\Action;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Starter\Http\Response\TwigResponse;
use Twig\Environment;

final class HomeAction implements RequestHandlerInterface
{
    private Environment $environment;

    public function __construct(Environment $environment)
    {
        $this->environment = $environment;
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        return new TwigResponse('pages/index.html.twig', $this->environment, []);
    }
}
