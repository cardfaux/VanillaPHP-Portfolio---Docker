<?php
ob_start(); // Start output buffering

// Autoload composer dependencies
require '../vendor/autoload.php';
// Include helper functions
require '../core/helpers.php';
// Include the routes file
require '../app/routes.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

use Bramus\Router\Router;

$router = new Router();

$router->get('/', function () {
  echo 'Welcome to the blog!';
});

$router->run();

ob_end_flush(); // Flush the output buffer and send it to the browser