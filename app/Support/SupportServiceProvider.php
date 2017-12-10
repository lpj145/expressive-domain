<?php
namespace ApiBase\Support;


use ApiBase\Support\Cache\Cache;
use ApiBase\Support\Cache\CacheFactory;
use ApiBase\Support\Console\Console;
use ApiBase\Support\Console\ConsoleFactory;
use ApiBase\Support\Migration\MigrationCommand;
use ApiBase\Support\Migration\MigrationCreateCommand;
use ApiBase\Support\Migration\MigrationDropCommand;
use ApiBase\Support\Migration\MigrationListCommand;
use ApiBase\Support\Provider\AbstractProvider;
use AuthExpressive\Interfaces\DatabaseInterface;
use ExpressiveMigrations\Contracts\DatabaseManager;
use Illuminate\Database\Capsule\Manager;
use Symfony\Component\Console\CommandLoader\CommandLoaderInterface;

class SupportServiceProvider extends AbstractProvider
{

    protected function register(): void
    {
        //Dependencies
        $this->factory(Console::class,ConsoleFactory::class);
        $this->factory(Cache::class, CacheFactory::class);

        //Aliases
        $this->aliases(CommandLoaderInterface::class,Console::class);
        
        //Invokables
        $this->invokables(DatabaseInterface::class, 'database');
    }
}
