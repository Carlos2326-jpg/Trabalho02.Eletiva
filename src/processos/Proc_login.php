<?php
    session_start();
    include_once("Conexao.php");

    $email = $_POST['email'];
    $senha = $_POST['senha'];
	
	$sql = "SELECT * FROM usuario WHERE email = '$email' or nome = '$email' and senha = '$senha' LIMIT 1";
	$comando = mysqli_query($mySql, $sql);
	$row_usuario = mysqli_fetch_array($comando);
	
	if(!empty($row_usuario['nome']))
    {
        $_SESSION['logado'] = true;
        $_SESSION['id_usuario'] = $row_usuario['id'];
        $_SESSION['nome_usuario'] = $row_usuario['nome'];
        $_SESSION['email_usuario'] = $row_usuario['email'];
        header("Location: ../viwer/Home.php");
    }
    else
    {
		$_SESSION['msg'] = "<p style='color:red;'>Email ou Senha incorretos!</p>";
		header("Location: ../../login.php");
    }
?>