<?php
require_once '../Conexao.php';

class viagemMigration{
    protected $conexao;

    public function __construct() {
        $this->conexao = Conexao::getConexao();
    }

    public function migration(){
        $sql = "CREATE TABLE viagem (
            id VARCHAR(255) PRIMARY KEY,
            onibus_id VARCHAR(255),
            origem VARCHAR(50),
            destino VARCHAR(50),
            partida_dt DATETIME NOT NULL,
            chegada_dt DATETIME NOT NULL,
            valor FLOAT NOT NULL,
            FOREIGN KEY (onibus_id) REFERENCES onibus(id)
        )";

        if ($this->conexao->query($sql) === TRUE) {
            echo "Tabela VIAGEM criada com sucesso!.\n";
        } else {
            echo "Erro na criação da tabela: " . $this->conexao->error;
        }
    }
}

$viagemMigration = new viagemMigration();


$viagemMigration->migration();
?>