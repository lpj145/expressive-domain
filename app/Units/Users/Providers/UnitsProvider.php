<?php
namespace App\Units\Users\Providers;

use App\Units\Users\Routes\Api;
use ExpressiveProvider\BaseProvider;

class UnitsProvider extends BaseProvider
{
    protected $providers = [
        ConsoleProvider::class,

        //Routes
        Api::class
    ];

    protected function register(): void
    {
    }
}
