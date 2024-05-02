<?php 


abstract class routerSwitch{
    protected function on(){
        require_once __DIR__.'/test.php';
    }

    protected function test2(){
        require_once __DIR__ .'/../App/Controller/test2.php';
        $controller = new test2();
        $controller->run();
    }
}