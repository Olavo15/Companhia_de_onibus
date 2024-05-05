<?php
require_once '../Conexao.php';

class assentoMigration{
    protected $conexao;

    public function __construct(){
        $this->conexao = Conexao::getConexao();
    }


    public function migration(){
        $sql = "CREATE TABLE assento (
            id VARCHAR(255) PRIMARY KEY,
            n_assento VARCHAR(8) NOT NULL,
            disponivel BOOLEAN NOT NULL,
            onibus_id VARCHAR(255) NOT NULL,
            FOREIGN KEY (onibus_id) REFERENCES onibus(id)
        )";
    
        if ($this->conexao->query($sql) === TRUE) {
            echo "Tabela ASSENTO criada com sucesso!.\n";
        } else {
            echo "Erro na criação da tabela: " . $this->conexao->error;
        }
    }
    
}

$assentoMigration = new assentoMigration();


$assentoMigration->migration();
?>