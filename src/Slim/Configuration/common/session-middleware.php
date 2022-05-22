<?php

declare(strict_types=1);

use Slim\Middleware\Session;

return [
    Session::class => static function (): Session {
        return new Session([
            'name' => 'Starter',
            'lifetime' => '1 hour',
            'path' => '/',
            'domain' => '',
            'secure' => false,
            'httponly' => false,
            'samesite' => 'Lax',
            'autorefresh' => false,
            'handler' => null,
            'ini_settings' => [],
        ]);
    },
];
