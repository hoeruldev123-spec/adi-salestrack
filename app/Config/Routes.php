<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->group('api', ['namespace' => 'App\Controllers\Api'], function ($routes) {
    // Customer API
    $routes->get('customers', 'CustomerController::index');
    $routes->get('customers/(:num)', 'CustomerController::show/$1');
    $routes->post('customers', 'CustomerController::create');
    $routes->put('customers/(:num)', 'CustomerController::update/$1');
    $routes->delete('customers/(:num)', 'CustomerController::delete/$1');

    // User API
    $routes->post('register', 'UserController::register');
    $routes->post('login', 'UserController::login');
    $routes->get('users', 'UserController::index', ['filter' => 'jwt:admin']);
    $routes->get('profile', 'UserController::profile', ['filter' => 'jwt']);
    $routes->put('profile', 'UserController::updateProfile', ['filter' => 'jwt']);
});
