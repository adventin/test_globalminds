<?php

require dirname(__DIR__) . '/vendor/autoload.php';

error_reporting(E_ALL);
set_error_handler('Core\Error::errorHandler');
set_exception_handler('Core\Error::exceptionHandler');

$router = new Core\Router();

$router->add('', ['controller' => 'Home', 'action' => 'index']);
$router->add('api/contacts/search', [
    'controller' => 'Home',
    'action'     => 'search'
]);
$router->add('api/contacts/create', [
    'controller' => 'Home',
    'action'     => 'create'
]);
$router->dispatch($_SERVER['QUERY_STRING']);