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
        echo "Lista de passageiros na viagem de {$this->origem} para {$this->destino} em {$this->data}:\n";
        foreach ($this->passageiros as $passageiro) {
            echo "Nome: {$passageiro->getNome()}, Idade: {$passageiro->getIdade()}\nO Numero da sua passagem: {$passageiro->getId()}\n";
        }
    }
}

// Exemplo de uso:
$viagem = new Viagem('Cidade A', 'Cidade B', '2024-04-10');

$passageiro1 = new Passageiro('João', 30);
$passageiro2 = new Passageiro('Maria', 25);
$passageiro3 = new Passageiro('Nemo', 21);

$viagem->adicionarPassageiro($passageiro1);
$viagem->adicionarPassageiro($passageiro2);
$viagem->adicionarPassageiro($passageiro3);

$viagem->listarPassageiros();

?>
