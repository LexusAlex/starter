<?php

declare(strict_types=1);

use DI\Container;
use DI\ContainerBuilder;

return static function (array $configuration): Container {
    // Контейнер внедрения зависимостей
    $builder = new ContainerBuilder();
    $builder->addDefinitions($configuration);
    return $builder->build();
};
