<?php
namespace App\Units\Consumers\Providers;

use App\Units\Consumers\Console\CreateConsumer;
use App\Units\Consumers\Console\DeleteConsumer;
use ExpressiveProvider\BaseProvider;

class ConsoleProvider extends BaseProvider
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
