<?php
namespace App\Units\Consumers\Providers;

use App\Domains\Consumers\Repositories\ConsumerRepository;
use App\Units\Consumers\Middleware\AuthorizeConsumer;
use ExpressiveProvider\BaseProvider;

class UnitsProvider extends BaseProvider
{
    protected $providers = [
        ConsoleProvider::class
    ];

    protected function register(): void
    {
        // Abstract Factories
        $this->abstractService(AuthorizeConsumer::class, ConsumerRepository::class);
    }

}
