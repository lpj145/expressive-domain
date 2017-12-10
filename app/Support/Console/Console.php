<?php
namespace ApiBase\Support\Console;

use App\Ship\Migrator\MigratorCommand;
use Psr\Container\ContainerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\CommandLoader\CommandLoaderInterface;
use Symfony\Component\Console\Exception\CommandNotFoundException;

class Console implements CommandLoaderInterface
{

    /**
     * @var ContainerInterface
     */
    private $container;
    /**
     * @var array
     */
    private $commands;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
        $this->commands = $container->get('config')['commands'] ?? [];
        $this->registerConfigExposeCommand();
    }

    public function get($name)
    {
        return new $this->commands[$name]($name, $this->container);
    }

    public function has($name)
    {
        return isset($this->commands[$name]);
    }

    public function getNames()
    {
        return array_keys($this->commands);
    }

    private function registerConfigExposeCommand()
    {
        $this->commands['config'] = ExposeCommand::class;
    }

}
