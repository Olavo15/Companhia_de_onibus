<?php

require_once __DIR__."/../DB/Conexao.php";
header('Content-Type: application/json');

class passageiroModel {
    private static $conexao;

    public function __construct() {
        self::$conexao = Conexao::getConexao();
    }

    public static function create($dados) {
        $id = uniqid();
        $sql = self::$conexao->prepare("INSERT INTO passageiro (id, nome, idade, cpf) VALUES (?, ?, ?, ?)");
        $sql->bind_param("ssss", $id , $dados['nome'], $dados['idade'], $dados['cpf']);

        if ($sql->execute()) {
            echo json_encode(["mensagem" => "Deu certo meu amigo!."]);
        } else {

        }
        $sql->close();
    }
}