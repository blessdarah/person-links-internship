<?php

declare(strict_types=1);

use Pecee\SimpleRouter\SimpleRouter as Router;
use PersonLinks\Internship\controllers\PageController;

Router::get('/', [PageController::class, 'index']);
Router::get('/apply', [PageController::class, 'apply']);
Router::post('/apply', [PageController::class, 'applyHandler']);
