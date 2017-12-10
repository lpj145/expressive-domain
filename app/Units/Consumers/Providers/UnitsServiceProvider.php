<?php
namespace ApiBase\Units\Consumers\Providers;

use ApiBase\Domains\Consumers\Repositories\ConsumerRepository;
use ApiBase\Support\Provider\AbstractProvider;
use ApiBase\Units\Consumers\Middleware\AuthorizeConsumer;

class UnitsServiceProvider extends AbstractProvider
{
    protected function register(): void
    {
        // Abstract Factories
        $this->abstractService(AuthorizeConsumer::class, ConsumerRepository::class);
    }

}
