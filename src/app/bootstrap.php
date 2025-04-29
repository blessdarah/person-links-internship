<?php

require __DIR__.'/../vendor/autoload.php';

use Dotenv\Dotenv;
use Pecee\SimpleRouter\SimpleRouter as Router;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

// load external routes file
require __DIR__.'/router/routes.php';

// load route helpers
require __DIR__.'/router/helper.php';

// Setup and start router
Router::start();
