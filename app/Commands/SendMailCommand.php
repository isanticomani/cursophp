<?php

namespace App\Commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class SendMailCommand extends Command
{
    protected static $defaultName = 'app:send-mail';

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        echo "Hi";
    }
}