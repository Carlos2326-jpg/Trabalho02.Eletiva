<?php
include("../processos/Conexao.php");
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/RedefinirSenha.css">
    <title>Redefinir Senha</title>
</head>

<body>
    <header>
        <h1 id="title">RadarVôlei</h1>
    </header>

    <img src="../public/Imagems/Notebook/FundoNotebook06Senha-removebg-preview.png" alt="" id="tanaka">

    <section class="container">
        <div class="header-block">
            <h2>Redefinir Senha</h2>
        </div>

        <section class="form-container">
            <div id="form">
                <a href="../viwer/CodigoVerificação.php " class="return-link">
                    <img src="../public/icones/de-volta.png" alt="Voltar" class="return-icon">
                </a>

                <div class="form-content">
                    <img src="../public/icones/perfil-de-usuario.png" alt="Ícone de usuário" class="user-icon">

                    <div class="input-group">
                        <img src="../public/icones/conta-de-usuario.png" alt="Ícone de conta" class="input-icon">

                        <div class="input-field">
                            <input type="password" id="username" name="senha" placeholder=" ">
                            <label for="username">Senha</label>
                        </div>
                    </div>

                    <div class="input-group">
                        <img src="../public/icones/conta-de-usuario.png" alt="Ícone de conta" class="input-icon">

                        <div class="input-field">
                            <input type="password" id="username" name="$confSenha" placeholder=" ">
                            <label for="username">Confirme a Senha</label>
                        </div>
                    </div>

                    <a href="#">
                        <button type="submit" class="submit-button">Finalizar</button>
                    </a>
                </div>
            </div>
        </section>
    </section>

    <img src="../public/Imagems/Notebook/FundoNotebook07Senha-removebg-preview.png" alt="" id="img1">
    <img src="../public/Imagems/Notebook/FundoNotebook08Senha-removebg-preview.png" alt="" id="img2">
</body>
</body>

</html>