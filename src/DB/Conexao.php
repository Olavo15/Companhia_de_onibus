<?php

class Conexao {
    private static $conexao;

    public static function getConexao(){
        if (!self::$conexao){
            self::$conexao = new mysqli("localhost", "olavo", "QnE8UA", "Onibus");
            if (self::$conexao->connect_error) {
                die("Erro ao conectar ao banco de dados: " . self::$conexao->connect_error);
            }
        }
        return self::$conexao;
    }
}
?>
