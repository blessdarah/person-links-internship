<?php

use Pecee\SimpleRouter\SimpleRouter as Router;

Router::get('/', function () {
    require __DIR__.'/../../views/pages/HomePage.php';
});
