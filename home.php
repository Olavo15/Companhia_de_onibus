<?php
require_once 'passageiro.php';
?>

<?php 
$viagem = new Viagem('Juazeiro do Norte-CE', 'Fortaleza-CE', '2024-04-10');

$passageiro1 = new Passageiro('João Paulo', 1);
$passageiro2 = new Passageiro('Joaquim', 5);
$passageiro3 = new Passageiro('Gil', 21);

$viagem->adicionarPassageiro($passageiro1);
$viagem->adicionarPassageiro($passageiro2);
$viagem->adicionarPassageiro($passageiro3);

$viagem->listarPassageiros();
?>