<?php

session_start();

if (!isset($_SESSION['logado']) || $_SESSION['logado'] !== true) {
    $_SESSION['msg'] = "<p style='color:red;'>Acesso negado. Por favor, faça login.</p>";

    header("Location: ../../login.php");
    die();
}

?>