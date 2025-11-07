<?php
if (!isset($_SESSION)) {
    session_start();
}

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/CodigoVerificacao.css">
    <title>Codigo de Verificção</title>
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
                <a href="../viwer/ConfirmarUsuario.php" class="return-link">
                    <img src="../public/icones/de-volta.png" alt="Voltar" class="return-icon">
                </a>

                <div class="form-content">

                    <p class="instructions">
                        Enviamos um código de 6 dígitos para o email cadastrado.
                        Por favor, digite o código recebido:
                    </p>

                    <p>Não recebeu o código?<a href="" id="link">Reenviar</a></p>

                    <div id="bloc">
                        <div id="bloc01">
                            <input type="text" class="input">
                            <input type="text" class="input">
                            <input type="text" class="input">
                        </div>
                        <div id="bloc02">
                            <input type="text" class="input">
                            <input type="text" class="input">
                            <input type="text" class="input">
                        </div>
                    </div>
                    <a href="../viwer/RedefinirSenha.php" cla="button-link">
                        <button type="submit" class="submit-button">Continuar</button>
                    </a>
                </div>
            </div>
        </section>
    </section>

    <img src="../public/Imagems/Notebook/FundoNotebook07Senha-removebg-preview.png" alt="" id="img1">
    <img src="../public/Imagems/Notebook/FundoNotebook08Senha-removebg-preview.png" alt="" id="img2">
</body>

</html>