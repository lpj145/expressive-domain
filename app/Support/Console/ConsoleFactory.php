<?php
namespace ApiBase\Support\Console;

use Psr\Container\ContainerInterface;

class ConsoleFactory
{
    public function __invoke(ContainerInterface $container)
    {
        return new Console($container);
    }
}
