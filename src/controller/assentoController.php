<?php 

require_once __DIR__."/../model/assentoModel.php";

class assentoController{
    private $model;

    public function __construct(){
        $this->model = new assentoModel();
    }

    public function assentoOnibusById($onibusId){
        $this->model->assentosOnibus($onibusId);
    }
}