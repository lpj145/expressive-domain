<?php
namespace ApiBase\Units\Users\Console;

use ApiBase\Domains\Users\Repositories\UserRepository;
use ApiBase\Support\Command\BaseCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CreateUser extends BaseCommand
{
    protected function description()
    {
        $this
            ->setDescription('Register new user on database!')
            ->setHelp('app:user-add JohnDoe john@example.com passwordHere')
            ->addArgument('name', InputArgument::REQUIRED, 'Name of user')
            ->addArgument('username', InputArgument::REQUIRED, 'username to login')
            ->addArgument('password', InputArgument::REQUIRED, 'password alpha');
    }

    public function process(InputInterface $input, OutputInterface $output)
    {
        $attributes = [
            'name' => $input->getArgument('name'),
            'username' => $input->getArgument('username'),
            'password' => $input->getArgument('password'),
            'active' => true,
            'abilities' => [
                'admin' => true
            ]
        ];

        if ($this->container->get(UserRepository::class)->save($attributes)) {
            $output->write('User '.$attributes['name'].' added with success!');
            return null;
        }

        $output->write('User cannot be saved!');
    }

}
