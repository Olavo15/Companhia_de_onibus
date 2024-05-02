<?php 

class onibusModel{

    public function Many(){
        self::$conexao = Conexao::getConexao();
        $sql = self::$conexao->query("SELECT * FROM onibus");
        if ($result) {
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            return [];
        }
    }

    public function create(){

    }
}