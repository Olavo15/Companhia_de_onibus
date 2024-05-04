<?php 

require_once __DIR__ . '../models/onibusModel.php';

class onibusController extends onibusModel{
    public function many(){
        $onibusModel = new onibusModel();
        $onibusModel->Many();
    }

    // public function create(){
    //     self::$conexao = Conexao::getConexao(); // Inicializa a conexão
    //     $id = uniqid();
        
    //     $stmt = self::$conexao->prepare(
    //         "INSERT INTO viacaoJuina (id, nome, idade, Ncadeira) 
    //         VALUES (
    //             '$id', 
    //             '$nome', 
    //             '$idade', 
    //             '$Ncadeira'
    //         )"
    //     );

    //     if ($stmt->execute()) {
    //         return true;
    //     } else {
    //         return false;
    //     }
    // }
}

$ex = new onibusController();
$ex->many();