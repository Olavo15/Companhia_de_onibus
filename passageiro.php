<?php

class Passageiro {
    protected $id;
    protected $nome;
    protected $idade;
    protected $numeroCadeira; 

    protected $formaPagamento;

    public function __construct($nome, $idade, $formaPagamento) {
        $this->nome = $nome;
        $this->idade = $idade;
        $this->formaPagamento = $formaPagamento;
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
    public function getForPagamento() {
        return $this->formaPagamento;
    }

    protected function gerarId() {
        // Gerar um ID aleatório utilizando a função uniqid()
        $this->id = uniqid();
    }

    protected function gerarNumeroCadeira() {
       // Gerar um número de cadeira entre 1 e 40
        $this->numeroCadeira = str_pad(mt_rand(1, 40), 2, '0', STR_PAD_LEFT);
    }
}

class Viagem {
    public $origem;
    public $destino;
    public $data;
    public $data2;
    private $valor;
    protected $passageiros = [];

    public function __construct($origem, $destino, $data,$data2, $valor) {
        $this->origem = $origem;
        $this->destino = $destino;
        $this->data = $data;
        $this->data2 = $data2;
        $this->valor = $valor;
    }

    public function adicionarPassageiro(Passageiro $passageiro) {
        $this->passageiros[] = $passageiro;
    }

    public function getValor() {
        return $this->valor;
    }

    public function listarPassageiros() {
        echo "------------------------------------------------------Lista de passageiros---------------------------------------------------- \n";
        echo "Origem: {$this->origem}\nDestino: {$this->destino}\nSaida: {$this->data}\nChegada: {$this->data2}\n";
        foreach ($this->passageiros as $passageiro) {
            echo "Passageiro: {$passageiro->getNome()},ID da passagem: {$passageiro->getId()}, Número da cadeira: {$passageiro->getNumeroCadeira()}, Valor da passagem: {$this->getValor()}({$passageiro->getForPagamento()})\n\n";
        }
        echo "----------------------------------------------------------------------------------------------------------------------------- \n";
    }
}



?>