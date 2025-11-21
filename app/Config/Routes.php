<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->group('api', function($routes) {

    // Auth
    $routes->post('login', 'Api\AuthController::login');

    // Hanya butuh token (tanpa cek role)
    $routes->group('', ['filter' => 'jwt'], function($routes) {
        $routes->get('profile', 'Api\UserController::profile');
    });

    // Sales
    $routes->group('sales', ['filter' => 'jwt:sales,admin'], function ($routes) {
        $routes->post('activity', 'Api\SalesActivityController::create');
    });

    // Finance
    $routes->group('finance', ['filter' => 'jwt:finance,admin'], function ($routes) {
        $routes->get('invoices', 'Api\FinanceController::index');
    });

    // Management
    $routes->group('management', ['filter' => 'jwt:management,admin'], function ($routes) {
        $routes->get('dashboard', 'Api\DashboardController::summary');
    });

    // Admin
    $routes->group('admin', ['filter' => 'jwt:admin'], function ($routes) {
        $routes->post('create-user', 'Api\AdminController::createUser');
    });

});
