# HStore Provider for Silex

This is a Silex provider to add support for hstore field types with PostgreSQL databases.
 
Note: This simply proxies to the knowledge and classes located in the Symfony2 Bundle: https://github.com/intaro/hstore-bundle 

## Installing via Composer

```
composer.phar require dbtlr/database-hstore-provider
```

## Adding Service


```php
$app->register(new \Dbtlr\HStoreProvider\HStoreServiceProvider());
```

