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
        echo "Lista de passageiros na viagem de {$this->origem} para destino {$this->destino} em {$this->data}:\n";
        foreach ($this->passageiros as $passageiro) {
            echo "Nome: {$passageiro->getNome()}, Numero da passagem: {$passageiro->getIdade()}\nO Numero da sua passagem: {$passageiro->getId()}\n";
        }
    }
}

?>