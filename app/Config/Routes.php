<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/coba2', function () {
    echo 'Anonymous Function';
});

$routes->get('/tangkap/(:any)', 'Coba::tangkap/$1/$2');

$routes->get('/users', 'Admin\Users::index');

####################CRUD################################

$routes->get('/komik', 'Komik::index');
$routes->get('/komik/create', 'Komik::create');
$routes->get('/komik/edit/(:segment)', 'komik::edit/$1');
$routes->delete('/komik/(:num)', 'komik::delete/$1');
$routes->get('/komik/(:any)', 'komik::detail/$1');

$routes->get('/user', 'User::index');

####################API################################
$routes->get('/create-api', 'CreateApi::index');

####################DATA TABLE################################
$routes->get('/data-table', 'DataTable::index');
