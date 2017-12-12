<?php

use Zend\ConfigAggregator\ArrayProvider;
use Zend\ConfigAggregator\ConfigAggregator;
use Zend\ConfigAggregator\PhpFileProvider;

// To enable or disable caching, set the `ConfigAggregator::ENABLE_CACHE` boolean in
// `config/autoload/local.php`.
$cacheConfig = [
    'config_cache_path' => 'cache/config-cache.php',
];


$configBase = [

    // Domains Providers
    \App\Domains\Users\Providers\DomainProvider::class,
    \App\Domains\Consumers\Providers\DomainProvider::class,

    //Units Providers
    \App\Units\Consumers\Providers\UnitsProvider::class,
    \App\Units\Users\Providers\UnitsProvider::class,
    \App\Units\Logger\Providers\LoggerServiceProvider::class,


    //Expressive packages/libs providers
    \ExpressiveLaravelMongodb\ConfigProvider::class,
    \ExpressiveRedis\ConfigProvider::class,
    \ExpressiveLaravelValidation\ConfigProvider::class,
    \ExpressiveMigrations\ConfigProvider::class,
    AuthExpressive\ConfigProvider::class,
    ExpressiveNamespace\ConfigProvider::class,
    ExpressiveConsole\ConfigProvider::class,

    // autoload files
    new ArrayProvider($cacheConfig),
    new PhpFileProvider('config/autoload/{{,*.}global,{,*.}local}.php'),
    new PhpFileProvider('config/autoload/app-config.local.php'),
    new PhpFileProvider('config/autoload/zend-expressive.global.php'),
    new PhpFileProvider('config/development.config.php'),
];


$aggregator = new ConfigAggregator($configBase, $cacheConfig['config_cache_path']);


return $aggregator->getMergedConfig();
