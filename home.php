<?php
require_once 'passageiro.php';
require_once 'DB/Conexao.php';

$conexao = new Conexao(); 

$viagem = new Viagem('Juazeiro do Norte-CE', 'Fortaleza-CE', '2024-04-10');

$passageiroRepository = new PassageiroRepository($conexao);

$passageiro1 = new Passageiro('Jhon', 65);
$passageiro2 = new Passageiro('Olavo', 21);
$passageiro3 = new Passageiro('Ari', 21);
$passageiro4 = new Passageiro('Pierre', 45);
$passageiro5 = new Passageiro('Luiz', 32);
$passageiro6 = new Passageiro('Raphael', 19);
$passageiro7 = new Passageiro('Diogo', 20);
$passageiro8 = new Passageiro('D', 30);
$passageiro9 = new Passageiro('V', 34);
$passageiro10 = new Passageiro('L', 65);


$passageiroRepository->salvar($passageiro1);
$passageiroRepository->salvar($passageiro2);
$passageiroRepository->salvar($passageiro3);
$passageiroRepository->salvar($passageiro4);
$passageiroRepository->salvar($passageiro5);
$passageiroRepository->salvar($passageiro6);
$passageiroRepository->salvar($passageiro7);
$passageiroRepository->salvar($passageiro8);
$passageiroRepository->salvar($passageiro9);
$passageiroRepository->salvar($passageiro10);

$viagem->adicionarPassageiro($passageiro1);
$viagem->adicionarPassageiro($passageiro2);
$viagem->adicionarPassageiro($passageiro3);
$viagem->adicionarPassageiro($passageiro4);
$viagem->adicionarPassageiro($passageiro5);
$viagem->adicionarPassageiro($passageiro6);
$viagem->adicionarPassageiro($passageiro7);
$viagem->adicionarPassageiro($passageiro8);
$viagem->adicionarPassageiro($passageiro9);
$viagem->adicionarPassageiro($passageiro10);


$viagem->listarPassageiros();

?>
