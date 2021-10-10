<?php
$conexao = new PDO("mysql:host=localhost; dbname=pizza", "admpizza", "12345");
$consulta = $conexao->prepare("SELECT code, name, flavorsAmount, price FROM sizePizza where initials=:initials");
$consulta->bindParam(":initials", $_GET['initials']);
$consulta->execute();
$array = $consulta->fetch(PDO::FETCH_ASSOC);
$array = json_encode($array);
print_r($array);
?>