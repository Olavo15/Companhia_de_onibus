<?php

require_once __DIR__."/../DB/Conexao.php";
header('Content-Type: application/json');

class assentoModel {
    private static $conexao;

    public function __construct() {
        self::$conexao = Conexao::getConexao();
    }


    public static function assentosOnibus($onibusId){
        $sql = self::$conexao->prepare("SELECT * FROM assento WHERE onibus_id = ?");
        $sql->bind_param('s', $onibusId);
        $sql->execute();
        $result = $sql->get_result();
        if ($result->num_rows > 0) {
            echo json_encode($result->fetch_all(MYSQLI_ASSOC));
        } else {
            echo json_encode(["mensagem" => "Nenhum assento encontrado para o ônibus especificado"]);
        }
        $sql->close();
    }
    


    public static function create($dados) {
        $id = uniqid();
        $sql = self::$conexao->prepare("INSERT INTO assento (id, n_assento, disponivel, onibus_id) VALUES (?, ?, ?, ?)");
        $sql->bind_param("ssss", $id , $dados['n_assento'], $dados['disponivel'], $dados['onibus_id']);

        if ($sql->execute()) {
            echo json_encode(["mensagem" => "Deu certo meu amigo!."]);
        } else {
            echo json_encode(["mensagem" => "Erro ao criar ônibus: " . self::$conexao->error]);
        }
        $sql->close();
    }
}