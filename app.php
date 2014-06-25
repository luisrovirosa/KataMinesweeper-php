<?php

require './vendor/autoload.php';

use LuisRovirosa\Command\MainCommand;
use Symfony\Component\Console\Application;

$application = new Application();
$application->add(new MainCommand());
$application->run();
