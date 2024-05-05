<?php 
require_once __DIR__ . '/../controller/onibusController.php';
require_once __DIR__ . '/../controller/viagemController.php';
require_once __DIR__ . '/../controller/assentoController.php';


class RouterSwitch {
    private $onibusController;
    private $viagemController;
    private $assentoController;
    

    public function __construct(){
        $this->onibusController = new onibusController();
        $this->viagemController = new viagemController();
        $this->assentoController = new assentoController();

    }

    protected function busManyRouter() {
        $this->onibusController->busMany();
    }

    protected function createRouter() {
        $json = file_get_contents('php://input');
        $dados = json_decode($json, true);
        $this->onibusController->createBus($dados);
    }

    protected function onibusById(){
        $onibusId = isset($_GET['onibus']) ? $_GET['onibus'] : null;
        $this->onibusController->onibusById($onibusId);
    }

    protected function listaViagens(){
        $this->viagemController->listaViagens();
    }

    protected function novaViagem(){
        $json = file_get_contents('php://input');
        $dados = json_decode($json, true);
        $this->viagemController->novaViagem($dados);
    }

    protected function assentoOnibus(){
        $onibusId = isset($_GET['onibus']) ? $_GET['onibus'] : null;
        $this->assentoController->assentoOnibusById($onibusId);
    }
}

