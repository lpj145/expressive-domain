<?php
namespace ApiBase\Domains\Users\Providers;

use ApiBase\Domains\Users\Migration\CreateTableUsers;
use ApiBase\Domains\Users\Repositories\UserRepository;
use ApiBase\Support\Cache\Cache;
use AuthExpressive\Interfaces\DatabaseInterface;
use AuthExpressive\Interfaces\StorageInterface;
use ExpressiveProvider\BaseProvider;

class UsersProvider extends BaseProvider
{
    protected function register(): void
    {
        // Configs
        $this->config('migrations', [
            CreateTableUsers::class
        ]);
        
        //Factories

        //Invokables
        $this->invokables(UserRepository::class, UserRepository::class);
        $this->invokables(DatabaseInterface::class,UserRepository::class);
        //Aliases
        $this->aliases(StorageInterface::class,Cache::class);
    }

}
