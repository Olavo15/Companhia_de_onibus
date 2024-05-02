<?php 

require_once __DIR__. '/migrations/assentoMigration.php';
require_once __DIR__. '/migrations/onibusMigration.php';
require_once __DIR__. '/migrations/passageiroMigration.php';
require_once __DIR__. '/migrations/reservaMigration.php';
require_once __DIR__. '/migrations/viagemMigration.php';


$onibusMigration = new OnibusMigration();
$onibusMigration->migration();

$migrationPassageiro = new MigrationPassageiro();
$migrationPassageiro->migration();

$viagemMigration = new ViagemMigration();
$viagemMigration->migration();

$assentoMigration = new AssentoMigration();
$assentoMigration->migration();



$reservaMigration = new ReservaMigration();
$reservaMigration->migration();

?>