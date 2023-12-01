<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->group(
    'user', function ($routes) {
        $routes->get('/', 'User::index');
        $routes->get('detail/(:num)', 'User::detail/$1');
        $routes->get('create', 'User::create');
        $routes->post('save', 'User::save');
        $routes->get('edit/(:num)', 'User::edit/$1');
        $routes->post('update/(:num)', 'User::update/$1');
        $routes->get('delete/(:num)', 'User::delete/$1');
    }
);
