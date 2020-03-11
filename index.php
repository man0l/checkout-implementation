<?php

require 'vendor/autoload.php';

use App\ConsoleApp;
use App\Service\Calculate;
use App\Service\ItemFixtures;

$app = new ConsoleApp(new Calculate(), new ItemFixtures());
$app->run($argv);
