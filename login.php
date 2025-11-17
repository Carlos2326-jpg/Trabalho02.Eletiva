<?php
<<<<<<< HEAD
    include("src/processos/Conexao.php");
=======
session_start();
if (isset($_SESSION['msg'])) {
    echo $_SESSION['msg'];
    unset($_SESSION['msg']);
}
include("src/processos/Conexao.php");
>>>>>>> origin/main
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="src/css/RedefinirSenha.css">
    <title>Login</title>
</head>

<body>
    <header>
        <h1 id="title">RadarVôlei</h1>
    </header>

    <img src="src/public/Imagems/Notebook/FundoNotebook01Login.png" alt="" id="azumane">

    <section class="container">
        <div class="header-block">
            <h2>Login</h2>
        </div>

        <section class="form-container">
            <div id="form">
                <form action="../Trabalho02.Eletiva/src/processos/Proc_login.php" method="POST">
                    <div class="form-content">

                        <div class="input-group">
                            <img src="src/public/icones/conta-de-usuario.png" alt="Ícone de conta" class="input-icon">

                            <div class="input-field">
                                <input type="text" id="email" name="email" placeholder=" " required>
                                <label for="username">Usuário/Email</label>
                            </div>
                        </div>

                        <div class="input-group">
                            <img src="src/public/icones/senha.png" alt="Ícone de conta" class="input-icon">

                            <div class="input-field">
                                <input type="password" id="senha" name="senha" placeholder=" " required>
                                <label for="username">Senha</label>
                            </div>
                        </div>
                        <button type="submit" class="submit-button">Finalizar</button>
			    </form>
            </div>
            <section id="forms-links">
            <a style="background-color: #77553B00; color: var(--Laranja); text-decoration: underline; border: none; text-align: center; margin-top: 10%;" href="src/viwer/CadastrarUsuario.php">Cadastrar</a>
            <a style="background-color: #77553B00; color: var(--Laranja); text-decoration: underline; border: none; text-align: center; margin-top: 10%;">Esqueceu a senha?</a>
        </section>
        </section>
    </section>
    <img src="src/public/Imagems/Notebook/FundoNotebook02Login.png" alt="" id="img1">
    <img src="src/public/Imagems/Notebook/FundoNotebook03Login.png" alt="" id="img2">
</body>

</html>