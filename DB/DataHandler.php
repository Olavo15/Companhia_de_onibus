<?php
require_once 'Conexao.php';

class DataHandler {
    protected static $conexao;

    public static function criarPassageiro($nome, $idade) {
        self::$conexao = Conexao::getConexao(); // Inicializa a conexão

        $stmt = self::$conexao->prepare("INSERT INTO passageiros (id, nome, idade) VALUES (?, ?, ?)");
        $id = uniqid();
        $stmt->bind_param("ssi", $id, $nome, $idade);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public static function listaPassageiro(){
        self::$conexao = Conexao::getConexao(); // Inicializa a conexão

        $result = self::$conexao->query("SELECT * FROM passageiros");

        if ($result) {
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            return [];
        }
    }
    // Outros métodos CRUD aqui... delet, update.....
}
?>
