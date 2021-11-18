<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('/about', 'Home::about');
$routes->get('/services', 'Home::service');
$routes->delete('/admin/deleteMenu/(:num)', 'Admin::deleteMenu/$1');
$routes->get('/admin', 'admin::index', ['filter' => 'role:admin']);
$routes->get('/admin/home', 'admin::index', ['filter' => 'role:admin']);
$routes->get('/admin/usersTable', 'Admin::usersTable',['filter' => 'role:admin']);
$routes->get('/admin/restoTable', 'Admin::restoTable',['filter' => 'role:admin']);
$routes->get('/admin/consoleTable', 'Admin::restoTable',['filter' => 'role:admin']);
$routes->get('/admin/newMenu', 'Admin::newMenu',['filter' => 'role:admin']); 
$routes->get('/admin/editMenu', 'Admin::editMenu',['filter' => 'role:admin']);
$routes->get('/admin/userlist/(:num)', 'Admin::detail/$1',['filter' => 'role:admin']);

// Menu Category
$routes->get('/(:num)', 'Menu::categoryMenu/$1');

// Order
$routes->get('/order/index/(:num)', 'Order::index/$1',['filter' => 'role:customer']);


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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
