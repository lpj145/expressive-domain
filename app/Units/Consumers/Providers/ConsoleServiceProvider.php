<?php
namespace ApiBase\Units\Consumers\Providers;

use ApiBase\Support\Provider\AbstractProvider;
use ApiBase\Units\Consumers\Console\CreateConsumer;
use ApiBase\Units\Consumers\Console\DeleteConsumer;

class ConsoleServiceProvider extends AbstractProvider
{
    protected function register(): void
    {
        // Configs
        $this->config('commands', [
            'consumer:create' => CreateConsumer::class,
            'consumer:delete' => DeleteConsumer::class,
        ]);
    }

}
