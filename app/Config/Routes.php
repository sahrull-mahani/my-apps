<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/sppd-form', 'Home::sppd');
$routes->get('/pegawai', 'Pimpinan::index');

$routes->get('get-pimpinan/(:segment)/(:segment)', 'Home::getPimpinan/$1/$2');

$routes->get('/ajax-pimpinan', 'Pimpinan::ajaxPimpinan');
$routes->get('create-pimpinan', 'Pimpinan::create');
$routes->get('edit-pimpinan', 'Pimpinan::edit');
$routes->post('save-pimpinan', 'Pimpinan::save');

$routes->post('/print-spt', 'Home::print_spt');
$routes->post('/print-sppd', 'Home::print_sppd');
$routes->post('/save-pegawai', 'Home::save_pegawai');