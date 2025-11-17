<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/CadastrarClube02.css">
    <title>Arena/Ginásio</title>
</head>
<body>

    <main id="main-content">
        <section class="form-section">

            <div class="menu-container">
                <div class="menu">
                    <a href="../viwer/CadastrarClube01.php" aria-label="Identidade Principal" class="menu-item">
                        <img src="../public/icones/prancheta.png" alt="Ícone de prancheta" class="menu-icon">
                    </a>
                    <a href="../viwer/CadastrarClube02.php" aria-label="Informações Jurídicas" class="menu-item active">
                        <img src="../public/icones/tribunal.png" alt="Ícone de tribunal" class="menu-icon">
                    </a>
                    <a href="../viwer/CadastrarClube03.php" aria-label="Estrutura do Time" class="menu-item">
                        <img src="../public/icones/time-de-futebol.png" alt="Ícone de time de futebol" class="menu-icon">
                    </a>
                    <a href="../viwer/CadastrarClube04.php" aria-label="Análise de Dados" class="menu-item">
                        <img src="../public/icones/grafico-preditivo.png" alt="Ícone de gráfico preditivo" class="menu-icon">
                    </a>
                </div>
            </div>

            <a href="../viwer/CadastrarClube01.php" class="return-link" aria-label="Voltar para página inicial">
                <img src="../public/icones/de-volta.png" alt="Ícone de voltar" class="return-icon">
            </a>

            <form class="form-container" action="../processos/Proc_IdentidadePrincipa.php" method="POST" enctype="multipart/form-data" id="club-form">   
                <div class="form-wrapper">
                    <h1 class="form-title">Arena/Ginásio</h1>
                    
                    <div class="form-content">
                        <div class="input-group">
                            <div class="input-field">
                                <input type="text" id="nomeGinasio" name="nomeGinasio" placeholder=" " required>
                                <label for="nomeGinasio">Nome do ginásio</label>
                                <span class="error-message" id="nomeGinasio-error"></span>
                            </div>
                        </div>

                        <div class="input-group">
                            <div class="input-field">
                                <input type="number" id="capacidadeTotal" name="capacidadeTotal" placeholder=" " min="1" required>
                                <label for="capacidadeTotal">Capacidade total</label>
                                <span class="error-message" id="capacidadeTotal-error"></span>
                            </div>
                        </div>

                        <div class="input-group input-group-row">
                            <div class="input-field">
                                <input type="text" id="cep" name="cep" placeholder=" " maxlength="9" required>
                                <label for="cep">CEP</label>
                                <span class="error-message" id="cep-error"></span>
                            </div>

                            <div class="input-field">
                                <input type="text" id="estado" name="estado" placeholder=" " required readonly>
                                <label for="estado">Estado</label>
                            </div>  
                        </div>  

                        <div class="input-group input-group-row">
                            <div class="input-field">
                                <input type="text" id="cidade" name="cidade" placeholder=" " required readonly>
                                <label for="cidade">Cidade</label>
                            </div>

                            <div class="input-field">
                                <input type="text" id="numero" name="numero" placeholder=" " required>
                                <label for="numero" class="date-label">N°</label>
                                <span class="error-message" id="dataInauguracao-error"></span>
                            </div>
                        </div>

                        <div class="input-group">
                            <div class="input-field">
                                <input type="text" id="bairro" name="bairro" placeholder=" " min="1" required>
                                <label for="bairro">Bairro</label>
                                <span class="error-message" id="capacidadeTotal-error"></span>
                            </div>
                        </div>  

                        <div class="input-group">
                            <div class="input-field">
                                <input type="text" id="rua" name="rua" placeholder=" " min="1" required>
                                <label for="rua">Rua</label>
                                <span class="error-message" id="capacidadeTotal-error"></span>
                            </div>
                        </div>  

                        <h2 class="form-subtitle">Contatos Oficiais</h2>

                        <div class="input-group">
                            <div class="input-field">
                                <input type="url" id="instagram" name="instagram" placeholder=" " pattern="https?://(www\.)?instagram\.com/.+">
                                <label for="instagram">Instagram (opcional)</label>
                                <span class="error-message" id="instagram-error"></span>
                            </div>
                        </div>

                        <div class="input-group">
                            <div class="input-field">
                                <input type="url" id="facebook" name="facebook" placeholder=" " pattern="https?://(www\.)?facebook\.com/.+">
                                <label for="facebook">Facebook (opcional)</label>
                                <span class="error-message" id="facebook-error"></span>
                            </div>
                        </div>
                        
                        <button type="submit" class="submit-button" id="submit-button">
                            <span class="button-text">Próximo</span>
                            <span class="loading-spinner" id="loading-spinner"></span>
                        </button>
                    </div>
                </div>
            </form>
        </section>
    </main>

    <script src="../js/header.js"></script>
    <script src="../js/Nav01.js"></script>
    <footer id="footer-container"></footer>
    <script src="../js/footer.js"></script>
</body>
</html>