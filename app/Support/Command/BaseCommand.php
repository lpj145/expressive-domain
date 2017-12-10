<?php
namespace ApiBase\Support\Command;

use Psr\Container\ContainerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

abstract class BaseCommand extends Command
{

    /**
     * @var ContainerInterface
     */
    protected $container;

    public function __construct($name, ContainerInterface $container)
    {
        $this->container = $container;
        parent::__construct($name);
    }

    protected function configure()
    {
        $this->description();
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->process($input, $output);
    }

    protected function getService(string $service)
    {
        return $this->container->get($service);
    }

    abstract protected function description();
    abstract protected function process(InputInterface $input, OutputInterface $output);
}
