<?php 

require_once __DIR__."/../model/onibusModel.php";

class onibusController{

    private $model;

    public function __construct(){
        $this->model = new onibusModel();
    }

    public function busMany(){
        $model = new onibusModel();
        return json_encode($this->model->Many());
    }


    public function createBus($dados){
        if(!isset($dados['numero']) || !isset($dados['max_assento'])) {
            echo json_encode(["mensagem" => "Dados incompletos. Por favor, forneça todas as informações necessárias para o cadastro!."]);
            return exit;
        }
        $this->model->create($dados);
    }

    public function onibusById($onibusId){
        $this->model->getOnibusById($onibusId);
    }
}

