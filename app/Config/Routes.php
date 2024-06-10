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

$routes->get('/news', 'NewsController::news', ['filter' => 'pgf']);
$routes->get('/news/create', 'NewsController::create');
$routes->post('/news/save', 'NewsController::save');

// use App\Filters\PakGuardFilter;
$routes->group('/product', ['filter' => ['pgf:user','audit']], static function ($routes) {
    $routes->get('list', 'ProductController::index');
    $routes->get('create', 'ProductController::create');
    $routes->post('save', 'ProductController::save');
    $routes->post('edit', 'ProductController::edit');
    $routes->post('delete', 'ProductController::delete');
});

$routes->group('/user', ['filter' => ['pgf:admin','audit']], static function ($routes) {
    $routes->get('list', 'UserController::index');
    $routes->get('create', 'UserController::create');
    $routes->post('save', 'UserController::save');
    $routes->post('edit', 'UserController::edit');
    $routes->post('delete', 'UserController::delete');
    $routes->get('janapdf', 'UserController::genPDF');
});

$routes->get('/login/index', 'LoginController::index');
$routes->post('/login/auth', 'LoginController::auth');
$routes->get('/login/logout', 'LoginController::logout');

$routes->group('/admin', static function ($routes) {
    $routes->get('admin', 'AdminController::admin_dashboard');
    $routes->get('user', 'AdminController::user_dashboard');
    $routes->get('no_access', 'AdminController::no_access');
});

// $routes->get('/list', 'ProductController::index');
// $routes->get('/create', 'ProductController::create');
// $routes->post('/save', 'ProductController::save');
// $routes->post('/edit', 'ProductController::edit');
// $routes->post('/delete', 'ProductController::delete');

// $routes->get('/product/list', 'ProductController::index');
// $routes->get('/product/create', 'ProductController::create');
// $routes->post('/product/save', 'ProductController::save');
// $routes->post('/product/edit', 'ProductController::edit');
// $routes->post('/product/delete', 'ProductController::delete');

// $routes->get('/user/list', 'UserController::index');
// $routes->get('/user/create', 'UserController::create');
// $routes->post('/user/save', 'UserController::save');
// $routes->post('/user/edit', 'UserController::edit');
// $routes->post('/user/delete', 'UserController::delete');


// $routes->get('/login/index', 'LoginController::index');
// $routes->post('/login/auth', 'LoginController::auth');
// $routes->post('/login/logout', 'LoginController::logout');

