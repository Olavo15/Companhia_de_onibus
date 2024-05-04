<?php 

abstract class routerSwitchPost{
    protected $route;

    public function routerSwitchPost(){
        switch ($this->route) {
            case 'test1':
                return 'test1 POST';
                break;
            case 'test2':
                return 'test2 POST';
                break;
            case 'test3':
                $test3 = new \Controller\test3Controller('post');
                $test3->execute();
            default: 
                return json_encode(["Status Code" => "404","Mensagem" => "Not Fund"]);
                break;
        }
    }
}
