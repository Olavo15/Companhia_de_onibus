<?php
require_once '../Conexao.php';

class onibusMigration{
    protected $conexao;

    public function __construct() {
        $this->conexao = Conexao::getConexao();
    }

    public function migration(){
        $sql = "CREATE TABLE onibus (
            id VARCHAR(255) PRIMARY KEY,
            numero VARCHAR(8) NOT NULL,
            max_assento INT NOT NULL
        )";

        if ($this->conexao->query($sql) === TRUE) {
            echo "Tabela ONIBUS criada com sucesso!.\n";
        } else {
            echo "Erro na criação da tabela: " . $this->conexao->error;
        }
    }
}

$onibusMigration = new onibusMigration();


$onibusMigration->migration();
?>