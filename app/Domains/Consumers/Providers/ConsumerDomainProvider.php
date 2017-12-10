<?php
namespace ApiBase\Domains\Consumers\Providers;

use ApiBase\Domains\Consumers\Migration\CreateTableConsumers;
use ApiBase\Domains\Consumers\Repositories\ConsumerRepository;
use ApiBase\Support\Cache\Cache;
use ApiBase\Support\Provider\AbstractProvider;

class ConsumerDomainProvider extends AbstractProvider
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
