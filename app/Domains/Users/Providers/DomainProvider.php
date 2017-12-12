<?php
namespace App\Domains\Users\Providers;

use App\Domains\Users\Migration\CreateTableUsers;
use App\Domains\Users\Repositories\UserRepository;
use App\Support\Cache\Cache;
use AuthExpressive\Interfaces\DatabaseInterface;
use AuthExpressive\Interfaces\StorageInterface;
use ExpressiveProvider\BaseProvider;

class DomainProvider extends BaseProvider
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
