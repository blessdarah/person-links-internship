<?php

define('APP_ROOT', __DIR__);
define('PUBLIC_PATH', __DIR__.'/public');

require __DIR__.'/vendor/autoload.php';

use Dotenv\Dotenv;
use Pecee\SimpleRouter\SimpleRouter as Router;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

// load router
require __DIR__.'/src/app/router/routes.php';

// load helper
require __DIR__.'/src/app/router/helper.php';

// setup router
Router::start();
