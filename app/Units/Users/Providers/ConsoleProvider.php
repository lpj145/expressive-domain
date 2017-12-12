<?php
namespace App\Units\Users\Providers;

use App\Units\Users\Console\CreateUser;
use App\Units\Users\Console\DeleteUser;
use ExpressiveProvider\BaseProvider;

class ConsoleProvider extends BaseProvider
{
    protected function register(): void
    {
        $this->config('commands', [
            'user:create' => CreateUser::class,
            'user:delete' => DeleteUser::class,
        ]);
    }

}
