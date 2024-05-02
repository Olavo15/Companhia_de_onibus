<?php 

require_once 'routerSwitch.php';

class router extends routerSwitch{
    public function run(string $requestUri){
        $route = substr($requestUri, 1);
        switch ($route) {
            case 'on':
                $this->on();
                break;
            case 'test2':
                $this->test2();
                break;
            default: 
                echo json_encode("dados");
                break;
        }
    }
}

// php -S localhost:8080