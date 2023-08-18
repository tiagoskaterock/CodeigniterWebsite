<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'HomeController::index');


// dashboard
$routes->get('/admin/', 'DashboardController::index', ['as' => 'admin.dashboard', 'filter' => 'group:user']);


// blog routes
$routes->group('admin/posts', ['namespace' => 'App\Controllers', 'filter' => 'group:admin'], static function ($routes) {
    $routes->get('', 'PostController::index', ['as' => 'admin.posts']);

    $routes->get('(:num)', 'PostController::show/$1', ['as' => 'admin.posts.show']);

    $routes->get('(:num)/edit', 'PostController::edit/$1', ['as' => 'admin.posts.edit']);

    $routes->patch('(:num)', 'PostController::update/$1', ['as' => 'admin.posts.update']);

    $routes->get('create', 'PostController::create', ['as' => 'admin.posts.create']);

    $routes->post('', 'PostController::store', ['as' => 'admin.posts.store']);

    $routes->delete('delete/(:num)', 'PostController::delete/$1', ['as' => 'admin.posts.delete']);    
});


// users routes
$routes->group('admin/users', ['namespace' => 'App\Controllers', 'filter' => 'group:admin'], static function ($routes) {

    // index
    $routes->get('', 'UserController::index', ['as' => 'admin.users']);

    // show
    $routes->get('(:num)', 'UserController::show/$1', ['as' => 'admin.users.show']);

    // edit
    $routes->get('(:num)/edit', 'UserController::edit/$1', ['as' => 'admin.users.edit']);

    // update
    $routes->patch('(:num)', 'UserController::update/$1', ['as' => 'admin.users.update']);

    // create
    $routes->get('create', 'UserController::create', ['as' => 'admin.users.create']);

    // store
    $routes->post('', 'UserController::store', ['as' => 'admin.users.store']);

    // delete
    $routes->delete('delete/(:num)', 'UserController::delete/$1', ['as' => 'admin.users.delete']);

    // show groups
    $routes->get('(:num)/show_groups', 'UserController::show_groups/$1', ['as' => 'admin.users.show_groups']);

    // update groups
    $routes->patch('(:num)/groups', 'UserController::update_groups/$1', ['as' => 'admin.users.update_groups']);
});


service('auth')->routes($routes);
/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
