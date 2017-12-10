<?php
namespace ApiBase\Support\Console;

use ApiBase\Support\Command\BaseCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ExposeCommand extends BaseCommand
{
    protected function description()
    {
        $this
            ->setDescription('Expose all configurations on container');
    }

    protected function process(InputInterface $input, OutputInterface $output)
    {
        foreach ($this->container->get('config') as $configName => $config) {

            if (is_array($config)) {
                $output->writeln($configName.':'.print_r($config, true));
                continue;
            }

            $output->writeln($configName.':'.$config);
        }
    }

}
