<?php
namespace ApiBase\Units\Users\Providers;

use ApiBase\Support\Provider\AbstractProvider;
use ApiBase\Units\Users\Console\CreateUser;
use ApiBase\Units\Users\Console\DeleteUser;

class ConsoleServiceProvider extends AbstractProvider
{
    protected function register(): void
    {
        $this->config('commands', [
            'user:create' => CreateUser::class,
            'user:delete' => DeleteUser::class,
        ]);
    }

}
