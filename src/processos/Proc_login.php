<?php
    session_start();
    include_once("Conexao.php");

    $email = $_POST['email'];
    $senha = $_POST['senha'];
	
	$sql = "SELECT * FROM Usuario WHERE email = '$email' or nome = '$email' and senha = '$senha' LIMIT 1";
	$comando = mysqli_query($mySql, $sql);
	$row_usuario = mysqli_fetch_array($comando);
<<<<<<< HEAD
    
	if(!empty($row_usuario['nome'])) //se achou alguma informação
    {           
        $_SESSION['msg'] = "<p style='color:green;'>Bem vindo ao Sistema, " 
		. $row_usuario['nome']. "!</p>";
        header("Location: src/viwer/MapaVolei.php   "); //vai abrir a página principal
=======
	
	if(!empty($row_usuario['nome']))
    {
        $_SESSION['logado'] = true;
        $_SESSION['id_usuario'] = $row_usuario['id'];
        $_SESSION['nome_usuario'] = $row_usuario['nome'];
        $_SESSION['email_usuario'] = $row_usuario['email'];
        header("Location: ../viwer/Home.php");
>>>>>>> origin/main
    }
    else
    {
<<<<<<< HEAD
		$_SESSION['msg'] = "<p style='color:red;'>Email ou Senha incorretos!</p>"; 
		//enviará essa mensagem de erro
		header("Location: login.php"); //vai apontar para refazer o login
=======
		$_SESSION['msg'] = "<p style='color:red;'>Email ou Senha incorretos!</p>";
		header("Location: ../../login.php");
>>>>>>> origin/main
    }
?>