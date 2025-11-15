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

    <img src="../public/Imagems/Notebook/FundoNotebook06Senha-removebg-preview.png" alt="Ilustração Tanaka" id="tanaka">

    <section class="container">
        <div class="header-block">
            <h2>Redefinir Senha</h2>
        </div>

        <section class="form-container">
            <div id="form">
                <a href="../viwer/CodigoVerificacao.php" class="return-link">
                    <img src="../public/icones/de-volta.png" alt="Voltar" class="return-icon">
                </a>

                <form id="redefinir-senha-form" class="form-content" action="../processos/Proc_Senha.php" method="POST">
                    <img src="../public/icones/perfil-de-usuario.png" alt="Ícone de usuário" class="user-icon">

                    <div class="input-group">
                        <img src="../public/icones/senha.png" alt="Ícone de senha" class="input-icon">
                        <div class="input-field">
                            <input type="password" id="senha" name="senha" placeholder=" " required>
                            <label for="senha">Nova Senha</label>
                            <button type="button" class="toggle-password" data-target="senha">
                                <img src="../public/icones/olho-vermelho.png" alt="Mostrar senha" class="eye-icon">
                            </button>
                        </div>
                    </div>

                    <div class="input-group">
                        <img src="../public/icones/senha.png" alt="Ícone de senha" class="input-icon">
                        <div class="input-field">
                            <input type="password" id="confSenha" name="confSenha" placeholder=" " required>
                            <label for="confSenha">Confirmar Senha</label>
                            <button type="button" class="toggle-password" data-target="confSenha">
                                <img src="../public/icones/olho-vermelho.png" alt="Mostrar senha" class="eye-icon">
                            </button>
                        </div>
                    </div>

                    <div id="password-requirements">
                        <p>A senha deve conter:</p>
                        <ul>
                            <li id="req-length">Mínimo 8 caracteres</li>
                            <li id="req-uppercase">Pelo menos uma letra maiúscula</li>
                            <li id="req-lowercase">Pelo menos uma letra minúscula</li>
                            <li id="req-number">Pelo menos um número</li>
                            <li id="req-special">Pelo menos um caractere especial</li>
                        </ul>
                    </div>

                    <button type="submit" class="submit-button">Finalizar</button>
                </form>
            </div>
        </section>
    </section>

    <img src="../public/Imagems/Notebook/FundoNotebook07Senha-removebg-preview.png" alt="Decoração lateral esquerda" id="img1">
    <img src="../public/Imagems/Notebook/FundoNotebook08Senha-removebg-preview.png" alt="Decoração lateral direita" id="img2">

    <script src="../js/redefinirSenha.js"></script>
</body>

</html>