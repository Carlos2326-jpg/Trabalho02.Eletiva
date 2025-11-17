<?php
	session_start();
	include_once("Conexao.php");
	
	$nome = $_POST['usuario'];
	$email = $_POST['email'];
	$conEmail = $_POST['conEmail'];
    $senha = $_POST['senha'];
    $conSenha = $_POST['conSenha'];

	

        // Verifica se os emails são iguais
    if ($email !== $conEmail) {
        $_SESSION['msg'] = "<p style='color:red;'>Erro: Os e-mails não coincidem!</p>";
        header("Location: ../viwer/CadastrarUsuario.php");
        die();
    }

    // Verifica se as senhas são iguais
    if ($senha !== $conSenha) {
        $_SESSION['msg'] = "<p style='color:red;'>Erro: As senhas não coincidem!</p>";
        header("Location: ../viwer/CadastrarUsuario.php");
        die();
    }

    $sql = "INSERT INTO usuario (nome, email, senha) VALUES 
	('$nome', '$email', '$senha')";
	$comando = mysqli_query($mySql, $sql);

	if(mysqli_insert_id($mySql))
	{
		$_SESSION['msg'] = "<p style='color:green;'>Usuário cadastrado com sucesso</p>";
		header("Location: ../viwer/CadastrarUsuario.php");
	}
	else
	{
		$_SESSION['msg'] = "<p style='color:red;'>Usuário não foi 
		cadastrado com sucesso</p>";
		header("Location: ../viwer/CadastrarUsuario.php");
	}
?>