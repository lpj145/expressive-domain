<?php
namespace ApiBase\Units\Consumers\Console;

use ApiBase\Domains\Consumers\Repositories\ConsumerRepository;
use ApiBase\Support\Helpers\HashBytes;
use ExpressiveConsole\BaseCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CreateConsumer extends BaseCommand
{
    protected function description()
    {
        $this
            ->setDescription('Add consumer api, to get public key!')
            ->addArgument('name', InputArgument::REQUIRED, 'name of owner')
            ->addArgument('identifier', InputArgument::REQUIRED, 'unique identifier for consumer');
    }

    protected function process(InputInterface $input, OutputInterface $output)
    {
        $attributes = [
            'name' => $input->getArgument('name'),
            'identifier' => $input->getArgument('identifier'),
            'key' => HashBytes::randomByte()
        ];

        if ($this->getService(ConsumerRepository::class)->save($attributes)) {
            $output->writeln('Consumer '.$attributes['name'].' created with success, consumer key: '.$attributes['key']);
            return;
        }

        $output->writeln('Consumer '.$attributes['name'].' not created!');
    }

}
