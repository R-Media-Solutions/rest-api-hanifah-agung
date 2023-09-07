<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('reservation', 'ReservationController::index', ['filter' => 'cors']);
$routes->post('reservation', 'ReservationController::create', ['filter' => 'cors']);

$routes->resource('reservation');
