<?php
namespace ApiBase\Units\Consumers\Providers;

use ApiBase\Domains\Consumers\Repositories\ConsumerRepository;
use ApiBase\Units\Consumers\Middleware\AuthorizeConsumer;
use ExpressiveProvider\BaseProvider;

class UnitsServiceProvider extends BaseProvider
{
    protected function register(): void
    {
        // Abstract Factories
        $this->abstractService(AuthorizeConsumer::class, ConsumerRepository::class);
    }

}
