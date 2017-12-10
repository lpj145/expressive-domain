<?php
namespace ApiBase\Units\Consumers\Console;

use ApiBase\Domains\Consumers\Repositories\ConsumerRepository;
use ApiBase\Support\Command\BaseCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class DeleteConsumer extends BaseCommand
{
    protected function description()
    {
        $this
            ->setDescription('Remove consumer from database, caution* all data by consumer are deleted!')
            ->addArgument('consumer', InputArgument::REQUIRED, 'consumer to deleted');
    }

    protected function process(InputInterface $input, OutputInterface $output)
    {
        $identifier = $input->getArgument('identifier');

        if ($this->container->get(ConsumerRepository::class)->deleteById($identifier)) {
            $output->write('Consumer with identifier: '.$identifier.' delete with success!');
            return null;
        }

        $output->write('Consumer '.$identifier.' cannot deleted!');

    }

}
