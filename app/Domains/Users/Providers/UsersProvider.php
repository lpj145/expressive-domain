<?php
namespace ApiBase\Domains\Users\Providers;

use ApiBase\Domains\Consumers\Migration\CreateTableConsumers;
use ApiBase\Domains\Users\Migration\CreateTableUsers;
use ApiBase\Domains\Users\Repositories\UserRepository;
use ApiBase\Support\Cache\Cache;
use ApiBase\Support\Provider\AbstractProvider;
use AuthExpressive\Interfaces\DatabaseInterface;
use AuthExpressive\Interfaces\StorageInterface;

class UsersProvider extends AbstractProvider
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
