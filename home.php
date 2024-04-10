<?php
require_once 'passageiro.php';
?>

<?php 
$viagem = new Viagem('Juazeiro do Norte-CE', 'Fortaleza-CE', '10-04-2024 - 22:55h', '11-04-2024 - 06:55h','R$ 35');

$passageiro1 = new Passageiro('João Paulo Aquino', 25, 'PIX');
$passageiro2 = new Passageiro('Joaquim Cabral', 30,'Dinheiro');
$passageiro3 = new Passageiro('Gil Bacural', 21,'Cartão');

$viagem->adicionarPassageiro($passageiro1);
$viagem->adicionarPassageiro($passageiro2);
$viagem->adicionarPassageiro($passageiro3);

$viagem->listarPassageiros();
?>