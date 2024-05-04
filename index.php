<?php 

require_once __DIR__.'/router.php';
require_once __DIR__.'/autoload.php';

$requestUri = $_SERVER['REQUEST_URI'];

$router = new router();
$router->run($requestUri);