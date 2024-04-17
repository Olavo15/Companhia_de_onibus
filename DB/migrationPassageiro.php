<?php
require_once 'Conexao.php';

class migrationPassageiro{
    protected $conexao;

    public function __construct() {
        $this->conexao = Conexao::getConexao();
    }

    public function migration(){
        $sql = "CREATE TABLE IF NOT EXISTS viacaoJuina (
            id VARCHAR(255) PRIMARY KEY,
            nome VARCHAR(255) NOT NULL,
            idade INT NOT NULL,
            Ncadeira INT NOT NULL
        )";

        if ($this->conexao->query($sql) === TRUE) {
            echo "Tabela passageiros criada com sucesso!.\n";
        } else {
            echo "Erro na criação da tabela: " . $this->conexao->error;
        }
    }
}

$migrationPassageiro = new migrationPassageiro();


$migrationPassageiro->migration();
?>
