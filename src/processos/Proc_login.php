<?php
    session_start();//iniciando a sessão
    include_once("Conexao.php");
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
	$senha = (filter_input(INPUT_POST, 'senha',FILTER_SANITIZE_STRING));
	//aplicando a cryptografia MD5 na senha que veio do formulário
	
	$sql = "SELECT * FROM usuario WHERE email = '$email' or nome = '$email' and senha = '$senha' LIMIT 1";
	$comando = mysqli_query($mySql, $sql);
	$row_usuario = mysqli_fetch_array($comando);
	
	if(!empty($row_usuario['nome'])) //se achou alguma informação
    {
        $_SESSION['msg'] = "<p style='color:green;'>Bem vindo ao Sistema, " 
		. $row_usuario['nome']. "!</p>";
        header("Location: ../viwer/MapaVolei.php"); //vai abrir a página principal
    }
    else //se não achou
    {
		$_SESSION['msg'] = "<p style='color:red;'>Email ou Senha incorretos!</p>"; 
		//enviará essa mensagem de erro
		header("Location: ../../login.php"); //vai apontar para refazer o login
    }
?>