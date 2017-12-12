<?php
namespace App\Units\Users\Console;

use App\Domains\Users\Repositories\UserRepository;
use ExpressiveConsole\BaseCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class DeleteUser extends BaseCommand
{
    protected function description()
    {
        $this
            ->setDescription('Remove user from database, caution* all data by user, are broken!')
            ->addArgument('username', InputArgument::REQUIRED, 'username to delete');
    }

    protected function process(InputInterface $input, OutputInterface $output)
    {
        $username = $input->getArgument('username');

        if ($this->container->get(UserRepository::class)->deleteById($username)) {
            $output->write('User '.$username.' delete with success!');
            return null;
        }

        $output->write('User '.$username.' cannot deleted!');

    }
}
