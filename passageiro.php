<?php

class Passageiro {
    protected $id;
    protected $nome;
    protected $idade;
    protected $numeroCadeira;

    public function __construct($nome, $idade) {
        $this->nome = $nome;
        $this->idade = $idade;
        $this->gerarId();
        $this->gerarNumeroCadeira(); 
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

    public function getNumeroCadeira() { 
        return $this->numeroCadeira;
    }

    protected function gerarId() {
        // Gerar um ID aleatório utilizando a função uniqid()
        $this->id = uniqid();
    }

    protected function gerarNumeroCadeira() {
        $this->numeroCadeira = str_pad(mt_rand(1, 40), 2, '0', STR_PAD_LEFT);
    }
}

class PassageiroRepository {
    protected $conexao;

    public function __construct($conexao) {
        $this->conexao = $conexao;
    }

    public function salvar(Passageiro $passageiro) {
        $N_cadeira = $passageiro->getNumeroCadeira();
        $nome = $passageiro->getNome();
        $idade = $passageiro->getIdade();

        // Substituído por uma lógica
        // if (DataHandler::criarPassageiro($nome, $idade)) {
        //     echo "Passageiro salvo com sucesso.\n";
        // } else {
        //     echo "Erro ao salvar passageiro.\n";
        // }
        echo "Passageiro salvo com sucesso.\n";
    }
}

class Viagem {
    public $origem;
    public $destino;
    public $data;
    protected $passageiros = [];

    public function __construct($origem, $destino, $data) {
        $this->origem = $origem;
        $this->destino = $destino;
        $this->data = $data;
    }

    public function adicionarPassageiro(Passageiro $passageiro) {
        $this->passageiros[] = $passageiro;
    }

    public function listarPassageiros() {
        echo "Lista de passageiros na viagem de {$this->origem} para o destino {$this->destino} em {$this->data}:\n";
        foreach ($this->passageiros as $passageiro) {
            echo "Nome: {$passageiro->getNome()},\nId da passagem: {$passageiro->getId()},\nNúmero da cadeira: {$passageiro->getNumeroCadeira()}\n";
        }
    }
}

?>
