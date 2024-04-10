User
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
       
        $this->numeroCadeira = str_pad(mt_rand(1, 99), 2, '0', STR_PAD_LEFT);
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
            echo "Nome: {$passageiro->getNome()}, ID do passageiro: {$passageiro->getId()}, Número da cadeira: {$passageiro->getNumeroCadeira()}\n";
        }
    }
}

?>