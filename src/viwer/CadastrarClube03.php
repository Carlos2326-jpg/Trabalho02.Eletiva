<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/CadastrarClube03.css">
    <title>Estrutura do Time</title>
</head>
<body>

    <main id="main-content">
        <section class="form-section">

            <div class="menu-container">
                <div class="menu">
                    <a href="../viwer/CadastrarClube01.php" aria-label="Identidade Principal" class="menu-item">
                        <img src="../public/icones/prancheta.png" alt="Ícone de prancheta" class="menu-icon">
                    </a>
                    <a href="../viwer/CadastrarClube02.php" aria-label="Arena/Ginásio" class="menu-item">
                        <img src="../public/icones/tribunal.png" alt="Ícone de tribunal" class="menu-icon">
                    </a>
                    <a href="../viwer/CadastrarClube03.php" aria-label="Estrutura do Time" class="menu-item active">
                        <img src="../public/icones/time-de-futebol.png" alt="Ícone de time de futebol" class="menu-icon">
                    </a>
                    <a href="../viwer/CadastrarClube04.php" aria-label="Títulos e Conquistas" class="menu-item">
                        <img src="../public/icones/grafico-preditivo.png" alt="Ícone de gráfico preditivo" class="menu-icon">
                    </a>
                </div>
            </div>

            <a href="../viwer/CadastrarClube02.php" class="return-link" aria-label="Voltar para página anterior">
                <img src="../public/icones/de-volta.png" alt="Ícone de voltar" class="return-icon">
            </a>

            <!-- CORREÇÃO: Form único para comissão técnica -->
            <form class="form-container" action="../processos/Proc_Diretoria.php" method="POST" id="comissao-form">   
                <div class="form-wrapper">
                    <h1 class="form-title">Diretoria e Comissão</h1>
                    
                    <div class="form-content">
                        <div class="input-group">
                            <div class="input-field">
                                <input type="text" id="presidente" name="presidente" placeholder=" " required>
                                <label for="presidente">Presidente</label>
                                <span class="error-message" id="presidente-error"></span>
                            </div>
                        </div>

                        <div class="input-group">
                            <div class="input-field">
                                <input type="text" id="diretor" name="diretor" placeholder=" " required>
                                <label for="diretor">Diretor de vôlei</label>
                                <span class="error-message" id="diretor-error"></span>
                            </div>
                        </div>

                        <div class="input-group">
                            <div class="input-field">
                                <input type="text" id="tecnico" name="tecnico" placeholder=" " required>
                                <label for="tecnico">Técnico principal</label>
                                <span class="error-message" id="tecnico-error"></span>
                            </div>
                        </div>

                        <div class="input-group">
                            <div class="input-field">
                                <input type="text" id="auxiliares" name="auxiliares" placeholder=" " required>
                                <label for="auxiliares">Auxiliares técnicos</label>
                                <span class="error-message" id="auxiliares-error"></span>
                            </div>
                        </div>
                        
                        <div class="input-group">
                            <div class="input-field">
                                <input type="text" id="preparador" name="preparador" placeholder=" " required>
                                <label for="preparador">Preparador físico</label>
                                <span class="error-message" id="preparador-error"></span>
                            </div>
                        </div>

                        <div class="input-group">
                            <div class="input-field">
                                <input type="text" id="fisioterapeuta" name="fisioterapeuta" placeholder=" " required>
                                <label for="fisioterapeuta">Fisioterapeuta</label>
                                <span class="error-message" id="fisioterapeuta-error"></span>
                            </div>
                        </div>

                        <button type="submit" class="submit-button" id="submit-comissao">
                            <span class="button-text">Salvar Comissão</span>
                            <span class="loading-spinner" id="loading-comissao"></span>
                        </button>
                    </div>
                </div>
            </form>

            <!-- CORREÇÃO: Form separado para jogadores -->
            <form class="form-container" action="../processos/Proc_Elenco.php" method="POST" id="jogador-form"> 
                <div class="form-wrapper">
                    <h2 class="form-subtitle">Cadastro de Jogador</h2>

                    <div class="form-content">
                        <div class="input-group">
                            <div class="input-field">
                                <input type="text" id="nomecompleto" name="nomecompleto" placeholder=" " required>
                                <label for="nomecompleto">Nome completo</label>
                                <span class="error-message" id="nomecompleto-error"></span>
                            </div>
                        </div>

                        <div class="input-group input-group-row">
                            <div class="input-field">
                                <input type="number" id="numero" name="numero" placeholder=" " min="1" max="99" required>
                                <label for="numero">N°</label>
                                <span class="error-message" id="numero-error"></span>
                            </div>

                            <div class="input-field">
                                <select id="posicao" name="posicao" required>
                                    <option value="">Selecione a posição</option>
                                    <option value="Levantador">Levantador</option>
                                    <option value="Oposto">Oposto</option>
                                    <option value="Ponteiro">Ponteiro</option>
                                    <option value="Central">Central</option>
                                    <option value="Líbero">Líbero</option>
                                </select>
                                <label for="posicao" class="select-label">Posição</label>
                                <span class="error-message" id="posicao-error"></span>
                            </div>
                        </div>

                        <div class="input-group">
                            <div class="input-field">
                                <input type="text" id="nacionalidade" name="nacionalidade" placeholder=" " required>
                                <label for="nacionalidade">Nacionalidade</label>
                                <span class="error-message" id="nacionalidade-error"></span>
                            </div>
                        </div>

                        <div class="input-group input-group-row">
                            <div class="input-field">
                                <input type="date" id="dataNascimento" name="dataNascimento" placeholder=" " required>
                                <label for="dataNascimento">Data de nascimento</label>
                                <span class="error-message" id="dataNascimento-error"></span>
                            </div>

                            <div class="input-field">
                                <input type="number" id="peso" name="peso" placeholder=" " step="0.1" min="0" required>
                                <label for="peso">Peso (kg)</label>
                                <span class="error-message" id="peso-error"></span>
                            </div>
                        </div>

                        <div class="input-group input-group-row">
                            <div class="input-field">
                                <input type="number" id="altura" name="altura" placeholder=" " step="0.01" min="0" required>
                                <label for="altura">Altura (m)</label>
                                <span class="error-message" id="altura-error"></span>
                            </div>

                            <div class="input-field">
                                <input type="date" id="contrato" name="contrato" placeholder=" " required>
                                <label for="contrato">Data do contrato</label>
                                <span class="error-message" id="contrato-error"></span>
                            </div>
                        </div>
                        
                        <button type="submit" class="submit-button" id="submit-jogador">
                            <span class="button-text">Adicionar Jogador</span>
                            <span class="loading-spinner" id="loading-jogador"></span>
                        </button>

                        <a href="../viwer/CadastrarClube04.php" class="next-page-button">
                            <span class="button-text">Próxima Etapa</span>
                        </a>
                    </div>
                </div>
            </form>
        </section>
    </main>

    <script src="../js/header.js"></script>
    <script src="../js/Nav01.js"></script>
    <footer id="footer-container"></footer>
    <script src="../js/footer.js"></script>
    <script src="../js/validacaoClube03.js"></script>
</body>
</html>