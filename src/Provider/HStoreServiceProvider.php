<?php

namespace Dbtlr\HStoreProvider\Provider;

use Doctrine\DBAL\Connection;
use Doctrine\DBAL\Types\Type;
use Silex\ServiceProviderInterface;
use Silex\Application;

class HStoreServiceProvider implements ServiceProviderInterface
{
    /**
     * @param Application $app
     */
    public function register(Application $app)
    {
        Type::addType('hstore', 'Intaro\HStoreBundle\DBAL\Types\HStoreType');

        /** @var \Doctrine\DBAL\Connection $db */
        $db = $app['db'];

        if (!$db instanceof Connection) {
            throw new \RuntimeException(
                'In order to include the HStoreServiceProvider, a database interface is required.'
            );
        }

        $db->getDatabasePlatform()->registerDoctrineTypeMapping('hstore', 'hstore');
    }

    /**
     * @param Application $app
     */
    public function boot(Application $app)
    {

    }
}
