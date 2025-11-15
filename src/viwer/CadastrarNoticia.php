<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/CadastrarNoticia.css">
    <title>MapaVolei - Cadastro de Notícia</title>
</head>

<body>

    <section id="section">
        <a href="../viwer/MapaVolei.php" class="return-link">
            <img src="../public/icones/de-volta.png" alt="Voltar" class="return-icon">
        </a>

        <form class="form-container">
            <div id="form">
                <div class="form-content">
                    <div class="input-group">
                        <img src="../public/icones/grampo.png" alt="Ícone de URL" class="input-icon">
                        <div class="input-field">
                            <input type="url" id="url" name="url" placeholder=" " required>
                            <label for="url">URL/Link da Notícia</label>
                        </div>
                    </div>

                    <div class="input-group">
                        <div class="input-title">
                            <input type="text" id="title" name="title" placeholder=" " required>
                            <label for="title">Título da Notícia</label>
                        </div>
                    </div>

                    <div class="input-group">
                        <div class="input-descricao">
                            <textarea id="resumo" name="resumo" placeholder=" " required></textarea>
                            <label for="resumo">Resumo da Notícia</label>
                        </div>
                    </div>

                    <button type="submit" id="button-cadastro">Finalizar</button>
                </div>
            </div>
        </form>
    </section>

    <script src="../js/header.js"></script>
    <script src="../js/Nav01.js"></script>
    <footer id="footer-container"></footer>
    <script src="../js/footer.js"></script>
</body>

</html>