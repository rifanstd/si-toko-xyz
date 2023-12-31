<?php

use App\Controllers\AuthController;
use App\Controllers\CategoryController;
use App\Controllers\DashboardController;
use App\Controllers\ProductController;
use App\Controllers\SupplierController;
use App\Controllers\TransactionController;
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
// Users
$routes->group('users', static function ($routes) {
    $routes->get('', [UserController::class, 'index']);
    $routes->get('create', [UserController::class, 'create']);
    $routes->post('store', [UserController::class, 'store']);
    $routes->get('edit/(:any)', [UserController::class, 'edit']);
    $routes->post('update', [UserController::class, 'update']);
    $routes->delete('delete', [UserController::class, 'delete']);
});

// Categories
$routes->group('categories', static function ($routes) {
    $routes->get('', [CategoryController::class, 'index']);
    $routes->get('create', [CategoryController::class, 'create']);
    $routes->post('store', [CategoryController::class, 'store']);
    $routes->get('edit/(:any)', [CategoryController::class, 'edit']);
    $routes->post('update', [CategoryController::class, 'update']);
    $routes->delete('delete', [CategoryController::class, 'delete']);
});

// Products
$routes->group('products', static function ($routes) {
    $routes->get('', [ProductController::class, 'index']);
    $routes->get('create', [ProductController::class, 'create']);
    $routes->post('store', [ProductController::class, 'store']);
    $routes->get('edit/(:any)', [ProductController::class, 'edit']);
    $routes->post('update', [ProductController::class, 'update']);
    $routes->delete('delete', [ProductController::class, 'delete']);
});

// Products
$routes->group('suppliers', static function ($routes) {
    $routes->get('', [SupplierController::class, 'index']);
    $routes->get('create', [SupplierController::class, 'create']);
    $routes->post('store', [SupplierController::class, 'store']);
    $routes->get('edit/(:any)', [SupplierController::class, 'edit']);
    $routes->post('update', [SupplierController::class, 'update']);
    $routes->delete('delete', [SupplierController::class, 'delete']);
});

// Transactions
$routes->get('/transactions', [TransactionController::class, 'index']);
$routes->get('/transactions/create', [TransactionController::class, 'create']);
$routes->post('/transactions/store', [TransactionController::class, 'store']);
$routes->delete('/transactions/delete', [TransactionController::class, 'delete']);
