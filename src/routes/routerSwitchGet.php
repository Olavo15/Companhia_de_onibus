<?php 

abstract class routerSwitchGet{
    protected $route;

    public function run(){
        switch ($this->route) {
            case 'test1':
                return 'test1 GET';
                break;
            case 'test2':
                return 'test2 GET';
                break;
            case 'test3':
                $test3 = new \Controller\test3Controller('get');
                $test3->execute();
            default: 
                return json_encode(["Status Code" => "404","Mensagem" => "Not Fund"]);
                break;
        }
    }
}
