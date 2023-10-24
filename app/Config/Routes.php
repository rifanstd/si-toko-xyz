<?php

use App\Controllers\AuthController;
use App\Controllers\DashboardController;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', [DashboardController::class, 'index']);
$routes->get('/login', [AuthController::class, 'login']);
$routes->post('/login_attempt', [AuthController::class, 'login_attempt']);
$routes->get('/logout', [AuthController::class, 'logout']); // test
