<?php 

require_once __DIR__.'/src/routes/router.php';

$requestUri = $_SERVER['REQUEST_URI'];

$router = new router();
$router->run($requestUri);