<?php
namespace ApiBase\Units\Logger\Providers;

use ApiBase\Support\Provider\AbstractProvider;
use ApiBase\Units\Logger\LoggerMiddleware;
use Monolog\Logger;

class LoggerServiceProvider extends AbstractProvider
{
    protected function register(): void
    {
        //Abstract Factories
        $this->abstractService(LoggerMiddleware::class, Logger::class);
    }

}
