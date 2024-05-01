<?php 

class test{
    public function oi(){
        echo " Olá meu amigo! ";
        return json_encode(200);
    }
}

$execute = new test();
$execute->oi();

