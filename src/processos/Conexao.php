<?php
$hostName = "localhost";
$bancoDados = 'radarvolei';
$usuario = "root";
$senha = "";

$mySql = new mysqli($hostName, $usuario, $senha, $bancoDados);

if ($mySql->connect_errno) {
    echo "<h1>Falha ao conectar: (" . $mySql->connect_errno . ") " . $mySql->connect_error . "</h1>";
}
?>