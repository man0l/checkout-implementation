<?php

require 'vendor/autoload.php';

use App\ConsoleApp;
use App\Service\Calculate;

$app = new ConsoleApp(new Calculate());
$app->run($argv);
