<?php

require_once __DIR__."/../DB/Conexao.php";
header('Content-Type: application/json');

class onibusModel {
    private static $conexao;

    public function __construct() {
        self::$conexao = Conexao::getConexao();
    }

    public function Many() {
        $sql = self::$conexao->query("SELECT * FROM onibus");
        if ($sql) {
            echo json_encode($sql->fetch_all(MYSQLI_ASSOC));
        } else {
            echo json_encode(["messagem"=>"Erro ao realizar consulta"]);
        }
        $sql->close();
    }

    public static function create($dados) {
        $id = uniqid();
        $sql = self::$conexao->prepare("INSERT INTO onibus (id, numero,  max_assento) VALUES (?, ?, ?)");
        $sql->bind_param("sss", $id , $dados['numero'], $dados['max_assento']);

        if ($sql->execute()) {
            echo json_encode(["mensagem" => "Ônibus criado com sucesso."]);
        } else {
            echo json_encode(["mensagem" => "Erro ao criar ônibus: " . self::$conexao->error]);
        }
        $sql->close();
    }

    public static function getOnibusById($onibusId) {
        $sql = self::$conexao->prepare("SELECT * FROM onibus WHERE id = ?");
        $sql->bind_param("s", $onibusId);
        $sql->execute();
        $result = $sql->get_result();
        if ($result->num_rows > 0) {
            echo json_encode($result->fetch_all(MYSQLI_ASSOC));
        } else {
            echo json_encode(["mensagem" => "Nenhum ônibus encontrado com o ID especificado"]);
        }
        $sql->close();
    }
}
?>
