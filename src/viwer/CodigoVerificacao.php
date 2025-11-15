<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/CodigoVerificacao.css">
    <title>Código de Verificação</title>
</head>

<body>
    <header>
        <h1 id="title">RadarVôlei</h1>
    </header>

    <img src="../public/Imagems/Notebook/FundoNotebook06Senha-removebg-preview.png" alt="Ilustração Tanaka" id="tanaka">

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

                    <img src="../public/icones/perfil-de-usuario.png" alt="Ícone de usuário" class="user-icon">

                    <p class="instructions">
                        Enviamos um código de 6 dígitos para o email cadastrado.
                        Por favor, digite o código recebido:
                    </p>

                    <p>Não recebeu o código? <a href="#" id="link">Reenviar</a></p>

                    <form id="verification-form" action="../processos/Proc_CodigoVerificacao.php" method="POST">
                        <div id="bloc">
                            <div id="bloc01">
                                <input type="text" class="input" maxlength="1" pattern="[0-9]" required>
                                <input type="text" class="input" maxlength="1" pattern="[0-9]" required>
                                <input type="text" class="input" maxlength="1" pattern="[0-9]" required>
                            </div>
                            <div id="bloc02">
                                <input type="text" class="input" maxlength="1" pattern="[0-9]" required>
                                <input type="text" class="input" maxlength="1" pattern="[0-9]" required>
                                <input type="text" class="input" maxlength="1" pattern="[0-9]" required>
                            </div>
                        </div>
                        
                        <button type="submit" class="submit-button">Continuar</button>
                    </form>
                </div>
            </div>
        </section>
    </section>

    <img src="../public/Imagems/Notebook/FundoNotebook07Senha-removebg-preview.png" alt="Decoração lateral esquerda" id="img1">
    <img src="../public/Imagems/Notebook/FundoNotebook08Senha-removebg-preview.png" alt="Decoração lateral direita" id="img2">

    <script src="../js/codigoVerificacao.js"></script>
</body>

</html>