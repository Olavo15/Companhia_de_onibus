<?php
require_once 'Conexao.php';

class DataHandler {
    protected static $conexao;

    public static function criarPassageiro($nome, $idade, $Ncadeira) {
        self::$conexao = Conexao::getConexao(); // Inicializa a conexão
        $id = uniqid();
        $stmt = self::$conexao->prepare("INSERT INTO viacaoJuina (id, nome, idade, Ncadeira) VALUES ('$id', '$nome', '$idade', '$Ncadeira')");

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
