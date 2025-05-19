<?php

declare(strict_types=1);

use Pecee\SimpleRouter\SimpleRouter as Router;
use PersonLinks\Internship\controllers\AdminPageController;
use PersonLinks\Internship\controllers\AuthController;
use PersonLinks\Internship\controllers\PageController;
use PersonLinks\Internship\controllers\PaymentController;

Router::get('/', [PageController::class, 'apply']);
Router::post('/apply', [PageController::class, 'applyHandler']);
Router::get('/dashboard', [AdminPageController::class, 'index']);
Router::get('/pay-now', [PaymentController::class, 'index'])->name("paynow.index");
Router::post('/pay-now', [PaymentController::class, 'create'])->name("paynow.create");

// Auth routes
Router::get('/login', [AuthController::class, 'login']);
Router::post("/login", [AuthController::class, "loginHandler"]);

Router::get('/signup', [AuthController::class, 'signup']);
Router::post('/signup', [AuthController::class, 'signupHandler']);

Router::post("/logout", [AuthController::class, "logout"]);


// create fallback route
Router::get('/{any}', function () {
    return '404 Not Found';
})->where(['any' => '.*']);
