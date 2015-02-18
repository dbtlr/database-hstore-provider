<?php

namespace Dbtlr\HStoreProvider\Provider;

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
        if (!$app->offsetExists('db')) {
            throw new \RuntimeException(
                'In order to include the HStoreServiceProvider, a database interface is required.'
            );
        }

        Type::addType('hstore', 'Intaro\HStoreBundle\DBAL\Types\HStoreType');

        /** @var \Doctrine\DBAL\Connection $db */
        $db = $this['db'];
        $db->getDatabasePlatform()->registerDoctrineTypeMapping('hstore', 'hstore');
    }

    /**
     * @param Application $app
     */
    public function boot(Application $app)
    {

    }
}
