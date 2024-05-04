<?php 

require_once __DIR__. "/../routerSwitch.php";

class router{
    public function run(string $requestUri){
        $route = substr($requestUri, 1);
        $method = $requestUri = $_SERVER['REQUEST_METHOD'];

        switch ($method){
            case 'GET':
                require_once __DIR__. "/src/routes/routerSwitchGet.php";
                $routerGet = new routerSwitchGet();
                $routerGet->run();
                break;
            case 'POST':
                break;
            case 'PUT':
                break;
            case 'Delete':
                break;
        }

    }
}

// php -S localhost:8080