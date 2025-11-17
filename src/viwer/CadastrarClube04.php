<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/CadastrarClube04.css"> <!-- CORREÇÃO: CSS correto -->
    <title>Títulos e Conquistas</title>
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
                    <a href="../viwer/CadastrarClube03.php" aria-label="Estrutura do Time" class="menu-item">
                        <img src="../public/icones/time-de-futebol.png" alt="Ícone de time de futebol" class="menu-icon">
                    </a>
                    <a href="../viwer/CadastrarClube04.php" aria-label="Títulos e Conquistas" class="menu-item active">
                        <img src="../public/icones/grafico-preditivo.png" alt="Ícone de gráfico preditivo" class="menu-icon">
                    </a>
                </div>
            </div>

            <a href="../viwer/CadastrarClube03.php" class="return-link" aria-label="Voltar para página anterior">
                <img src="../public/icones/de-volta.png" alt="Ícone de voltar" class="return-icon">
            </a>

            <form class="form-container" action="../processos/Proc_Historico.php" method="POST" id="historico-form">   
                <div class="form-wrapper">
                    <h1 class="form-title">Títulos e Conquistas</h1>
                    
                    <div class="form-content">
                        <!-- Seção de Títulos Nacionais -->
                        <div class="trophy-section">
                            <h3 class="section-title">Títulos Nacionais</h3>
                            
                            <div class="input-group input-group-row">
                                <div class="input-field">
                                    <input type="number" id="campeonatos_nacionais" name="campeonatos_nacionais" placeholder=" " min="0" value="0">
                                    <label for="campeonatos_nacionais">Campeonatos Nacionais</label>
                                </div>

                                <div class="input-field">
                                    <input type="number" id="copas_nacionais" name="copas_nacionais" placeholder=" " min="0" value="0">
                                    <label for="copas_nacionais">Copas Nacionais</label>
                                </div>
                            </div>

                            <div class="input-group input-group-row">
                                <div class="input-field">
                                    <input type="number" id="torneios_nacionais" name="torneios_nacionais" placeholder=" " min="0" value="0">
                                    <label for="torneios_nacionais">Torneios Nacionais</label>
                                </div>

                                <div class="input-field">
                                    <input type="number" id="outros_nacionais" name="outros_nacionais" placeholder=" " min="0" value="0">
                                    <label for="outros_nacionais">Outros Nacionais</label>
                                </div>
                            </div>
                        </div>

                        <!-- Seção de Títulos Internacionais -->
                        <div class="trophy-section">
                            <h3 class="section-title">Títulos Internacionais</h3>
                            
                            <div class="input-group input-group-row">
                                <div class="input-field">
                                    <input type="number" id="campeonatos_internacionais" name="campeonatos_internacionais" placeholder=" " min="0" value="0">
                                    <label for="campeonatos_internacionais">Campeonatos Internacionais</label>
                                </div>

                                <div class="input-field">
                                    <input type="number" id="copas_internacionais" name="copas_internacionais" placeholder=" " min="0" value="0">
                                    <label for="copas_internacionais">Copas Internacionais</label>
                                </div>
                            </div>

                            <div class="input-group input-group-row">
                                <div class="input-field">
                                    <input type="number" id="torneios_internacionais" name="torneios_internacionais" placeholder=" " min="0" value="0">
                                    <label for="torneios_internacionais">Torneios Internacionais</label>
                                </div>

                                <div class="input-field">
                                    <input type="number" id="outros_internacionais" name="outros_internacionais" placeholder=" " min="0" value="0">
                                    <label for="outros_internacionais">Outros Internacionais</label>
                                </div>
                            </div>
                        </div>

                        <!-- Seção de Títulos Estaduais -->
                        <div class="trophy-section">
                            <h3 class="section-title">Títulos Estaduais</h3>
                            
                            <div class="input-group">
                                <div class="input-field">
                                    <input type="number" id="campeonatos_estaduais" name="campeonatos_estaduais" placeholder=" " min="0" value="0">
                                    <label for="campeonatos_estaduais">Campeonatos Estaduais</label>
                                </div>
                            </div>

                            <div class="input-group input-group-row">
                                <div class="input-field">
                                    <input type="number" id="copas_estaduais" name="copas_estaduais" placeholder=" " min="0" value="0">
                                    <label for="copas_estaduais">Copas Estaduais</label>
                                </div>

                                <div class="input-field">
                                    <input type="number" id="torneios_estaduais" name="torneios_estaduais" placeholder=" " min="0" value="0">
                                    <label for="torneios_estaduais">Torneios Estaduais</label>
                                </div>
                            </div>
                        </div>

                        <!-- Seção de Histórico -->
                        <div class="history-section">
                            <h3 class="section-title">Histórico do Clube</h3>
                            
                            <div class="input-group">
                                <div class="input-field textarea-field">
                                    <textarea id="historico_clube" name="historico_clube" placeholder=" " rows="4" maxlength="1000"></textarea>
                                    <label for="historico_clube">Histórico do Clube (máx. 1000 caracteres)</label>
                                    <div class="char-counter">
                                        <span id="char-count">0</span>/1000
                                    </div>
                                </div>
                            </div>

                            <div class="input-group">
                                <div class="input-field textarea-field">
                                    <textarea id="conquistas_destaque" name="conquistas_destaque" placeholder=" " rows="3" maxlength="500"></textarea>
                                    <label for="conquistas_destaque">Conquistas em Destaque (máx. 500 caracteres)</label>
                                    <div class="char-counter">
                                        <span id="destaque-count">0</span>/500
                                    </div>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="submit-button" id="submit-button">
                            <span class="button-text">Finalizar Cadastro</span>
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

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('historico-form');
            const submitButton = document.getElementById('submit-button');
            const loadingSpinner = document.getElementById('loading-spinner');
            
            // Contador de caracteres para textareas
            const historicoTextarea = document.getElementById('historico_clube');
            const destaqueTextarea = document.getElementById('conquistas_destaque');
            const charCount = document.getElementById('char-count');
            const destaqueCount = document.getElementById('destaque-count');

            historicoTextarea.addEventListener('input', function() {
                charCount.textContent = this.value.length;
            });

            destaqueTextarea.addEventListener('input', function() {
                destaqueCount.textContent = this.value.length;
            });

            // Validação em tempo real para números
            const numberInputs = form.querySelectorAll('input[type="number"]');
            numberInputs.forEach(input => {
                input.addEventListener('input', function() {
                    if (this.value < 0) {
                        this.value = 0;
                    }
                });
            });

            // Envio do formulário
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                
                // Validar formulário
                if (validateForm()) {
                    // Mostrar loading
                    submitButton.disabled = true;
                    loadingSpinner.style.display = 'inline-block';
                    
                    // Enviar formulário
                    setTimeout(() => {
                        form.submit();
                    }, 1000);
                }
            });

            function validateForm() {
                let isValid = true;
                
                // Validação básica - todos os campos numéricos são opcionais
                // Pode adicionar validações específicas aqui se necessário
                
                return isValid;
            }

            // Função para mostrar erro
            function showError(elementId, message) {
                const errorElement = document.getElementById(elementId);
                if (errorElement) {
                    errorElement.textContent = message;
                    errorElement.style.display = 'block';
                }
            }

            // Função para limpar erro
            function clearError(elementId) {
                const errorElement = document.getElementById(elementId);
                if (errorElement) {
                    errorElement.textContent = '';
                    errorElement.style.display = 'none';
                }
            }
        });
    </script>
</body>
</html>