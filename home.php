<?php
require_once 'passageiro.php';
require_once 'DB/Conexao.php';

$conexao = new Conexao(); 

$viagem = new Viagem('Juazeiro do Norte-CE', 'Fortaleza-CE', '2024-04-10');

$passageiroRepository = new PassageiroRepository($conexao);

$passageiro1 = new Passageiro('Santos 2024!!!', 666);
$passageiro2 = new Passageiro('Olavo', 21);
$passageiro3 = new Passageiro('Ari', 21);
$passageiro4 = new Passageiro('Pierre', 45);


$passageiroRepository->salvar($passageiro1);
$passageiroRepository->salvar($passageiro2);
$passageiroRepository->salvar($passageiro3);
$passageiroRepository->salvar($passageiro4);

$viagem->adicionarPassageiro($passageiro1);
$viagem->adicionarPassageiro($passageiro2);
$viagem->adicionarPassageiro($passageiro3);
$viagem->adicionarPassageiro($passageiro4);

$viagem->listarPassageiros();

?>
