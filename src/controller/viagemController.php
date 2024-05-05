<?php 

require_once __DIR__."/../model/viagemModel.php";

class viagemController{

    private $model;

    public function __construct(){
        $this->model = new viagemModel();
    }

    public function listaViagens(){
        return json_encode($this->model->listaViagens());
    }

    public function novaViagem($dados){
        if(!isset($dados['onibus_id']) || !isset($dados['origem']) || !isset($dados['destino']) || !isset($dados['partida_dt']) || !isset($dados['chegada_dt']) || !isset($dados['valor'])) {
            echo json_encode(["mensagem" => "Dados incompletos. Por favor, forneça todas as informações necessárias para o cadastro!."]);
            return exit;
        }
        return json_encode($this->model->create($dados));
    }
}

