<?php
    include("src/processos/Conexao.php");
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
        </section>
    </section>

    <img src="src/public/Imagems/Notebook/FundoNotebook02Login.png" alt="" id="img1">
    <img src="src/public/Imagems/Notebook/FundoNotebook03Login.png" alt="" id="img2">
</body>

</html>