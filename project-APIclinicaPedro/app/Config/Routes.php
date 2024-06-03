<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
//$routes->get('/', 'Home::index');
$routes->get('paciente', 'Home::index');
//$routes->get('clinica', 'Home::index');

$routes->get('paciente','pacienteController::index');
$routes->get('paciente/(:num)','pacienteController::show/$1');
$routes->post('paciente','pacienteController::create');
$routes->put('paciente/(:num)','pacienteController::update/$1');
$routes->delete('paciente/(:num)','pacienteController::delete/$1');


// Ruta de pacientes del hospital
$routes->get('clinica','clinicaController::index');
$routes->get('clinica/(:num)','clinicaController::show/$1');
$routes->post('clinica','clinicaController::create');
$routes->put('clinica/(:num)','clinicaController::update/$1');
$routes->delete('clinica/(:num)','clinicaController::delete/$1');