<?php
namespace App\Domains\Consumers\Providers;

use App\Domains\Consumers\Migration\CreateTableConsumers;
use App\Domains\Consumers\Repositories\ConsumerRepository;
use App\Support\Cache\Cache;
use ExpressiveProvider\BaseProvider;

class DomainProvider extends BaseProvider
{
    protected function register(): void
    {
        // Configs
        $this->config('migrations', [
            CreateTableConsumers::class
        ]);

        //Abstract Factories
        $this->abstractService(ConsumerRepository::class, Cache::class);
    }
}
