<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// KelasCI42/public/
$routes->get('/', 'Home::index');

// KelasCI42/public/Home
$routes->get('/Home', function() {
    return view('Home');
});

// KelasCI42/public/about_us.html
$routes->get('/about_us.html', function() {
    return view('about_us', [
        'nama' => 'Sistem Cuba',
    ]);
});

$routes->get('/news', 'NewsController::news');
$routes->get('/news/create', 'NewsController::create');
$routes->post('/news/save', 'NewsController::save');


$routes->get('/product/list', 'ProductController::index');
$routes->get('/product/create', 'ProductController::create');
$routes->post('/product/save', 'ProductController::save');
$routes->post('/product/edit', 'ProductController::edit');
$routes->post('/product/delete', 'ProductController::delete');

$routes->get('/user/list', 'UserController::index');
$routes->get('/user/create', 'UserController::create');
$routes->post('/user/save', 'UserController::save');
$routes->post('/user/edit', 'UserController::edit');
$routes->post('/user/delete', 'UserController::delete');

