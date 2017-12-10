<?php
namespace ApiBase\Support;


use ApiBase\Support\Cache\Cache;
use ApiBase\Support\Cache\CacheFactory;
use AuthExpressive\Interfaces\DatabaseInterface;
use ExpressiveMigrations\Contracts\DatabaseManager;
use ExpressiveProvider\BaseProvider;

class SupportServiceProvider extends BaseProvider
{

    protected function register(): void
    {
        //Dependencies
        $this->factory(Cache::class, CacheFactory::class);

        //Aliases
        $this->aliases(DatabaseManager::class, 'database');
        
        //Invokables
        $this->invokables(DatabaseInterface::class, 'database');
    }
}
