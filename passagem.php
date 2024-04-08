<?php

class Passageiro {
    protected $id;
    protected $nome;
    protected $idade;

    public function __construct($nome, $idade) {
        $this->nome = $nome;
        $this->idade = $idade;
        $this->gerarId();
    }

    public function getNome() {
        return $this->nome;
    }

    public function getIdade() {
        return $this->idade;
    }

    public function getId() {
        return $this->id;
    }

    protected function gerarId() {
        // Gere um ID aleatório utilizando a função uniqid()
        $this->id = uniqid();
    }
}

class PassageiroRepository {
    protected $conexao;

    public function __construct($conexao) {
        $this->conexao = $conexao;
    }

    public function salvar(Passageiro $passageiro) {
        $id = $passageiro->getId();
        $nome = $passageiro->getNome();
        $idade = $passageiro->getIdade();

        // Prepare a consulta SQL para inserir o passageiro no banco de dados
        $sql = "INSERT INTO passageiros (id, nome, idade) VALUES ('$id', '$nome', '$idade')";

        // Execute a consulta
        if ($this->conexao->query($sql) === TRUE) {
            echo "Passageiro salvo no banco de dados com sucesso.\n";
        } else {
            echo "Erro ao salvar passageiro no banco de dados: " . $this->conexao->error;
        }
    }
}


$conexao = new mysqli("localhost", "usuario", "senha", "nome_do_banco");
if ($conexao->connect_error) {
    die("Erro de conexão: " . $conexao->connect_error);
}

$passageiroRepository = new PassageiroRepository($conexao);

$passageiro1 = new Passageiro('João', 30);
$passageiro2 = new Passageiro('Maria', 25);


$passageiroRepository->salvar($passageiro1);
$passageiroRepository->salvar($passageiro2);

// Fechando a conexão com o banco de dados
$conexao->close();

?>
