<?php
namespace ApiBase\Units\Consumers\Providers;

use ApiBase\Units\Consumers\Console\CreateConsumer;
use ApiBase\Units\Consumers\Console\DeleteConsumer;
use ExpressiveProvider\BaseProvider;

class ConsoleServiceProvider extends BaseProvider
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
