<?php 

require_once __DIR__."/../model/passageiroModel.php";

class passageiroController{
    private $model;

    public function __construct(){
        $this->model = new assentoModel();
    }


    public function passageirto($dados){
        $this->model->create($dados);
    }
}