<?php

declare(strict_types=1);

use SlimSession\Helper;

return [
    Helper::class => static fn (): Helper => new Helper(),
];
