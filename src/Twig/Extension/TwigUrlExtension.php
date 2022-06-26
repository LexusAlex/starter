<?php

declare(strict_types=1);

namespace Starter\Twig\Extension;

use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

final class TwigUrlExtension extends AbstractExtension
{
    public function getName(): string
    {
        return 'slim';
    }

    /**
     * @return TwigFunction[]
     */
    public function getFunctions(): array
    {
        return [
            new TwigFunction('base_path', [$this, 'getBasePath']),
        ];
    }

    public function getBasePath(string $uri, array $params = []): string
    {
        return ($uri ? '/' . $uri : '')
            . ($params ? '?' . http_build_query($params) : '');
    }
}
