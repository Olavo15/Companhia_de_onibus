<?php
require_once '../Conexao.php';

class ReservaMigration{
    protected $conexao;

    public function __construct() {
        $this->conexao = Conexao::getConexao();
    }

    public function migration(){
        $sql = "CREATE TABLE reserva (
            id VARCHAR(255) PRIMARY KEY,
            viagem_id VARCHAR(255),
            passageiro_id VARCHAR(255),
            assento_id VARCHAR(255),
            onibus_id VARCHAR(255),
            create_at DATETIME,
            FOREIGN KEY (viagem_id) REFERENCES viagem(id),
            FOREIGN KEY (passageiro_id) REFERENCES passageiro(id),
            FOREIGN KEY (assento_id) REFERENCES assento(id),
            FOREIGN KEY (onibus_id) REFERENCES onibus(id)
        )";

        if ($this->conexao->query($sql) === TRUE) {
            echo "Tabela RESERVA criada com sucesso!.\n";
        } else {
            echo "Erro na criação da tabela: " . $this->conexao->error;
        }
    }
}

$reservaMigration = new reservaMigration();


$reservaMigration->migration();
?>