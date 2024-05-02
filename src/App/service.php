<?php 

abstract class service{
    protected function test(){
        require __DIR__ . '/api/tesetPost.php';
    }

    protected function listOnibus(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            echo "cheguei aqui!";
        } else {
            echo "Acesso inválido";
        }
    }
}