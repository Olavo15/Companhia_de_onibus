<?php 

namespace Controller;

class test3Controller{
    private $props;

    public function __construction($props){
        $this->props = $props;
    }
    public function execute(){
        return json_encode(["Status Code", "200","Mensagem"=>"Rota encontrada com sucesso!", "Metodo" => $this->props]);
    } 
}