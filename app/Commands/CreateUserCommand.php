<?php
namespace App\Commands;

use App\Models\User;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CreateUserCommand extends Command{
    protected static $defaultName = 'app:create-user';

    public function configure(){
        $this
            ->addArgument('email',InputArgument::REQUIRED, 'The email of the user')
            ->addArgument('password',InputArgument::OPTIONAL, 'A secure password');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln([
            'User Creator',
            '============',
            '',
        ]);
        $user = new User();
        $user->email = $input->getArgument('email');
        $pass = $input->getArgument('password');
        $user->password = (is_null($pass)) ? password_hash('UnPassMuySeguro',PASSWORD_DEFAULT) : \password_hash($pass,PASSWORD_DEFAULT);
        $user->save();
        $output->writeln('Done.');
    }
}

