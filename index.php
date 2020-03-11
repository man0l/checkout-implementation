<?php

require 'vendor/autoload.php';

use App\App;
use App\Service\Calculate;
use App\Service\ItemFixtures;

$app = new App(new Calculate(), new ItemFixtures());
$params = isset($argv) ? $argv[1] : $_GET['products'];
$app->run($params);
