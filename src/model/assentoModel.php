<?php

require_once __DIR__."/../DB/Conexao.php";
header('Content-Type: application/json');

class assentoModel {
    private static $conexao;

    public function __construct() {
        self::$conexao = Conexao::getConexao();
    }


    public static function assentosOnibus($onibus_id){
        $sql = self::$conexao->query("SELECT st.id, st.n_assento, bus.numero as placa FROM assento st INNER JOIN onibus bus ON bus.id = st.onibus_id WHERE bus.is = ?");
        $sql->bind_param('s', $onibus_id);
        $result = $sql->get_result();
        if ($result->num_rows > 0) {
            echo json_encode($result->fetch_all(MYSQLI_ASSOC));
        } else {
            echo json_encode(["mensagem" => "Nenhum ônibus encontrado com o ID especificado"]);
        }
        $sql->close();
    }
}