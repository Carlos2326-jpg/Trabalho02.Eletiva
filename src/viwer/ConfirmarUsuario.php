<?php
session_start();
include("../processos/Conexao.php");

if (isset($_POST['userName'])) {
    if (empty($_POST['userName'])) {
        $erro = "Preencha o campo de usuário";
    } else {
        $userName = $mysqli->real_escape_string($_POST['userName']);

        $sql_code = "SELECT * FROM Usuario WHERE nome = '$userName' OR email = '$userName'";
        $sql_query = $mysqli->query($sql_code) or die("Erro no SQL: " . $mysqli->error);

        $quantidade = $sql_query->num_rows;

        if ($quantidade == 1) {
            $usuario = $sql_query->fetch_assoc();

            // Armazena os dados na sessão
            $_SESSION['id'] = $usuario['id'];
            $_SESSION['nome'] = $usuario['nome'];

            header("Location: ../viwer/CodigoVerificacaoo.php");
            exit();
        } else {
            $erro = "Falha ao achar usuário ou usuário inválido";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/ConfirmarUsuario.css">
    <title>Confirmar Usuário</title>
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
            <form method="POST" action="" id="form">
                <a href="#" class="return-link">
                    <img src="../public/icones/de-volta.png" alt="Voltar" class="return-icon">
                </a>

                <div class="form-content">
                    <img src="../public/icones/perfil-de-usuario.png" alt="Ícone de usuário" class="user-icon">

                    <p class="instructions">Para redefinir sua senha, por favor informe seu nome de usuário ou email:</p>

                    <div class="input-group">
                        <img src="../public/icones/conta-de-usuario.png" alt="Ícone de conta" class="input-icon">

                        <div class="input-field">
                            <input type="text" id="userName" name="userName" placeholder=" " required>
                            <label for="userName">usuário/Email</label>
                        </div>
                    </div>

                    <?php if (isset($erro)): ?>
                        <div class="erro" style="color: red; text-align: center; margin-bottom: 15px;">
                            <?php echo $erro; ?>
                        </div>
                    <?php endif; ?>

                    <button type="submit" class="submit-button">Continuar</button>
                </div>
            </form>
        </section>
    </section>

    <img src="../public/Imagems/Notebook/FundoNotebook07Senha-removebg-preview.png" alt="" id="img1">
    <img src="../public/Imagems/Notebook/FundoNotebook08Senha-removebg-preview.png" alt="" id="img2">
</body>

</html>