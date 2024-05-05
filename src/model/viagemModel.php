<?php

require_once __DIR__."/../DB/Conexao.php";
require_once __DIR__."/onibusModel.php";
header('Content-Type: application/json');

class viagemModel {
    private static $conexao;

    public function __construct() {
        self::$conexao = Conexao::getConexao();
    }

    public static function listaViagens() {
        $listaViagem = self::$conexao->query(
            "
            SELECT 
                vg.id,
                vg.origem,
                vg.destino,
                vg.partida_dt,
                vg.chegada_dt,
                vg.valor,
                bus.numero AS onibus,
                bus.max_assento,
                COUNT(ast.id) AS assentos_ocupados
            FROM VIAGEM vg
                INNER JOIN onibus bus ON bus.id = vg.onibus_id
                LEFT JOIN assento ast ON ast.onibus_id = bus.id
            GROUP BY vg.id, vg.origem, vg.destino, vg.partida_dt, vg.chegada_dt, vg.valor, bus.numero, bus.max_assento;
            "
        );
        echo json_encode($listaViagem->fetch_all(MYSQLI_ASSOC));
    }
    
    public static function create($dados) {
        $verificandoOnibus = elf::$conexao->prepare("");
        $verificandoRotaOnibus = elf::$conexao->prepare("");

        $id = uniqid();
        $sqlNewViagem = self::$conexao->prepare("
            INSERT INTO VIAGEM (
                id, 
                onibus_id, 
                origem, 
                destino, 
                partida_dt,
                chegada_dt, 
                valor
            ) VALUES (?,?,?,?,?,?,?)");
    
        $sqlNewViagem->bind_param('sssssss', 
            $id,
            $dados['onibus_id'],
            $dados['origem'],
            $dados['destino'],
            $dados['partida_dt'],
            $dados['chegada_dt'],
            $dados['valor']
        );

        if ($sqlNewViagem->execute()) {
            echo json_encode(["mensagem" => "Viagem criada com sucesso."]); 
        } else {
            echo json_encode(["mensagem" => "Erro ao criar viagem: " . self::$conexao->error]); 
        }
    }

    public static function getOnibusById($onibusId) {

    }
}
?>
