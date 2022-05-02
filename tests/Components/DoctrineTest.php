<?php

declare(strict_types=1);

namespace Test\Components;

use Doctrine\Common\Cache\Psr6\DoctrineProvider;
use Doctrine\Common\EventManager;
use Doctrine\DBAL\Types\Type;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Mapping\Driver\AttributeDriver;
use Doctrine\ORM\Mapping\UnderscoreNamingStrategy;
use Doctrine\ORM\Tools\Setup;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Cache\Adapter\ArrayAdapter;
use Symfony\Component\Cache\Adapter\FilesystemAdapter;

/**
 * @internal
 */
final class DoctrineTest extends TestCase
{
    public function testDoctrineConnection(): void
    {
        $configurations = Setup::createConfiguration(true, null, (null) ? DoctrineProvider::wrap(new FilesystemAdapter('', 0, __DIR__ . '/../../var/cache/doctrine/cache')) : DoctrineProvider::wrap(new ArrayAdapter()));
        $configurations->setMetadataDriverImpl(new AttributeDriver([]));
        $configurations->setNamingStrategy(new UnderscoreNamingStrategy());

        // Типы
        foreach ([] as $name => $class) {
            if (!Type::hasType($name)) {
                Type::addType($name, $class);
            }
        }

        $eventManager = new EventManager();

        /*
        foreach ([] as $name) {
            $subscriber = $container->get($name);
            $eventManager->addEventSubscriber($subscriber);
        });
        */

        if (getenv('DB') === 'mysql') {
            $entityManager = EntityManager::create([
                'driver' => 'pdo_mysql',
                'host' => getenv('MYSQL_HOST'),
                'user' => getenv('MYSQL_USER'),
                'password' => getenv('MYSQL_PASSWORD'),
                'dbname' => getenv('MYSQL_DATABASE'),
                'charset' => getenv('MYSQL_CHARSET'),
            ], $configurations, $eventManager);
        } elseif (getenv('DB') === 'postgres') {
            $entityManager = EntityManager::create([
                'driver' => 'pdo_pgsql',
                'host' => getenv('POSTGRES_HOST'),
                'user' => getenv('POSTGRES_USER'),
                'password' => getenv('POSTGRES_PASSWORD'),
                'dbname' => getenv('POSTGRES_DB'),
                'charset' => getenv('POSTGRES_CHARSET'),
            ], $configurations, $eventManager);
        }

        $result = $entityManager->getConnection()->createQueryBuilder()
            ->select('VERSION()')
            ->executeQuery()
            ->fetchAssociative();

        self::assertEquals('8.0.29', $result['VERSION()']);
    }
}
