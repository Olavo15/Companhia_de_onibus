<?php 

require_once __DIR__. '/routerSwitch.php';

class router extends routerSwitch{
    public function run(string $requestUri){
        $route = substr($requestUri, 1);

        if($route == 'test'){
            $this->test();
        }else{
            echo "Rota não encontrar 404";
        }
    }
}

// php -S localhost:8080