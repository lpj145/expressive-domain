<?php
namespace App\Units\Logger\Providers;

use App\Units\Logger\LoggerMiddleware;
use ExpressiveProvider\BaseProvider;
use Monolog\Logger;

class LoggerServiceProvider extends BaseProvider
{
    protected function register(): void
    {
        //Abstract Factories
        $this->abstractService(LoggerMiddleware::class, Logger::class);
    }

}
