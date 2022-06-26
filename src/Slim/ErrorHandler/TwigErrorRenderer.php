<?php

declare(strict_types=1);

namespace Starter\Slim\ErrorHandler;

use Slim\Interfaces\ErrorRendererInterface;
use Throwable;
use Twig\Environment;

final class TwigErrorRenderer implements ErrorRendererInterface
{
    private Environment $environment;

    public function __construct(Environment $environment)
    {
        $this->environment = $environment;
    }

    public function __invoke(Throwable $exception, bool $displayErrorDetails): string
    {
        if (http_response_code() === 500) {
            return $this->environment->render('pages/error.html.twig', ['code' => 500, 'message' => 'Internal Server Error']);
        }

        return $this->environment->render('pages/error.html.twig', ['code' => $exception->getCode(), 'message' => $exception->getMessage()]);
    }
}
