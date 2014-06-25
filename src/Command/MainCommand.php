<?php

namespace LuisRovirosa\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use LuisRovirosa\Minesweeper;

class MainCommand extends Command
{

    protected function configure()
    {
        $this
                ->setName('run')
                ->setDescription('Get Map of positions')
                ->addArgument(
                        'file', InputArgument::REQUIRED, 'File with the board'
                )
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $fileName = $input->getArgument('file');
        if (!file_exists($fileName)) {
            $output->writeln("The file $fileName does not exists");
            return;
        }

        $minesweeper = new Minesweeper();
        $minesweeper->load($fileName);

        $board = $minesweeper->getBoard();
        $output->writeln(json_encode($board));
    }

}
