<?php 

include_once("../processos/verificaLogin.php");

if (!isset($_SESSION['logado']) || $_SESSION['logado'] !== true) {
    // Se o usuário não estiver logado, redireciona para o login
    $_SESSION['msg'] = "<p style='color:red;'>Acesso restrito. Faça login.</p>";
    header("Location: ../../login.php"); 
    die();
}
    
    
include("../processos/Conexao.php");

$id_usuario = $_SESSION['id_usuario'];

$sql = "SELECT nome, email FROM usuario WHERE id = $id_usuario LIMIT 1";
$comando = mysqli_query($mySql, $sql);
$dados_usuario = mysqli_fetch_assoc($comando);
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/Home.css">
    <title>RadarVôlei</title>
</head>

<body>

    <section id="section-bloc">
        <section class="section-colun">
            <img src="../public/Imagems/Noticias/Noticia01.png" alt="">
            <img src="../public/Imagems/Anuncios/Anuncio02.jpg" alt="">
            <img src="../public/Imagems/Anuncios/Anuncio05.jpg" alt="">
            <img src="../public/Imagems/Anuncios/Anuncio07.jpg" alt="">
            <img src="../public/Imagems/Anuncios/Anuncio10.jpg" alt="">
        </section>

        <section id="section">

            <section id="section-home">
                <div class="bloc-rules">
                    <h2>Meu Perfil</h2>
                    <div class="block-content">
                        <?php
                        
                            echo "<p><strong>ID do Usuário: </strong>" . $id_usuario . "</p>";
                            echo "<p><strong>Nome: </strong>" . $dados_usuario['nome'] . "</p>";
                            echo "<p><strong>Email: </strong>" . $dados_usuario['email'] . "</p>";

                        ?>
                    </div>
                </div>
            </section>

        </section>

        <section class="section-colun">
            <img src="../public/Imagems/Anuncios/Anuncio03.jpg" alt="">
            <img src="../public/Imagems/Anuncios/Anuncio04.jpg" alt="">
            <img src="../public/Imagems/Anuncios/Anuncio06.jpg" alt="">
            <img src="../public/Imagems/Anuncios/Anuncio08.jpg" alt="">
            <img src="../public/Imagems/Anuncios/Anuncio09.jpg" alt="">
        </section>
    </section>

    <script src="../js/header.js"></script>
    <script src="../js/Nav01.js"></script>
    <footer id="footer-container"></footer>
    <script src="../js/footer.js"></script>
</body>

</html>