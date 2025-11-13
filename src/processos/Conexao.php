<?php
$hostName = "localhost";
$bancoDados = 'radarvolei';
$usuario = "root";
$senha = "123";

$mySql = new mysqli($hostName, $usuario, $senha, $bancoDados);

if ($mySql->connect_errno) {
    echo "<h1>Falha ao conectar: (" . $mySql->connect_errno . ") " . $mySql->connect_error . "</h1>";
}
