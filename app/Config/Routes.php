<?php

use App\Controllers\AuthController;
use App\Controllers\DashboardController;
use App\Controllers\UserController;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */


$routes->get('/', [DashboardController::class, 'index']);

// All User
$routes->get('/login', [AuthController::class, 'login']);
$routes->post('/login_attempt', [AuthController::class, 'login_attempt']);
$routes->get('/logout', [AuthController::class, 'logout']); // test

// -- ADMIN ROLE -- 
$routes->get('/users', [UserController::class, 'index']);
$routes->get('/users/create', [UserController::class, 'create']);
$routes->post('/users/store', [UserController::class, 'store']);
$routes->get('/users/edit/(:any)', [UserController::class, 'edit']);
$routes->post('/users/update', [UserController::class, 'update']);
$routes->delete('/users/delete', [UserController::class, 'delete']);
