<?php
namespace ApiBase\Units\Users\Providers;

use ApiBase\Units\Users\Console\CreateUser;
use ApiBase\Units\Users\Console\DeleteUser;
use ExpressiveProvider\BaseProvider;

class ConsoleServiceProvider extends BaseProvider
{
    protected function register(): void
    {
        $this->config('commands', [
            'user:create' => CreateUser::class,
            'user:delete' => DeleteUser::class,
        ]);
    }

}
