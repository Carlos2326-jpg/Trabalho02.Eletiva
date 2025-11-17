<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/CadastrarClube01.css">
    <title>Identidade Principal</title>
</head>
<body>

    <main id="main-content">
        <section class="form-section">

            <div class="menu-container">
                <div class="menu">
                    <a href="../viwer/CadastrarClube01.php" aria-label="Identidade Principal" class="menu-item active">
                        <img src="../public/icones/prancheta.png" alt="Ícone de prancheta" class="menu-icon">
                    </a>
                    <a href="../viwer/CadastrarClube02.php" aria-label="Informações Jurídicas" class="menu-item">
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

            <a href="../viwer/MapaClube.php" class="return-link" aria-label="Voltar para página inicial">
                <img src="../public/icones/de-volta.png" alt="Ícone de voltar" class="return-icon">
            </a>

            <form class="form-container" action="../processos/Proc_IdentidadePrincipa.php" method="POST" enctype="multipart/form-data" id="club-form">   
                <div class="form-wrapper">
                    <h1 class="form-title">Identidade Principal</h1>
                    
                    <div class="form-content">
                        <div class="input-group">
                            <div class="input-field">
                                <input type="text" id="oficialName" name="oficialName" placeholder=" " required>
                                <label for="oficialName">Nome Oficial</label>
                                <span class="error-message" id="oficialName-error"></span>
                            </div>
                        </div>

                        <div class="input-group">
                            <div class="input-field">
                                <input type="text" id="apelido" name="apelido" placeholder=" " required>
                                <label for="apelido">Apelido</label>
                                <span class="error-message" id="apelido-error"></span>
                            </div>
                        </div>
                        
                        <div class="input-group input-group-row">
                            <div class="input-field">
                                <input type="text" id="sigla" name="sigla" placeholder=" " maxlength="5" required>
                                <label for="sigla">Sigla</label>
                                <span class="error-message" id="sigla-error"></span>
                            </div>

                            <div class="input-field">
                                <input type="date" id="dataFundacao" name="dataFundacao" placeholder=" " required>
                                <label for="dataFundacao" class="date-label">Data de Fundação</label>
                                <span class="error-message" id="dataFundacao-error"></span>
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

                        <div class="input-group">
                            <div class="input-field">
                                <input type="text" id="cidade" name="cidade" placeholder=" " required readonly>
                                <label for="cidade">Cidade</label>
                            </div>
                        </div>  

                        <h2 class="form-subtitle">Identidade Visual</h2>

                        <div class="input-group">
                            <div class="input-field color-field">
                                <input type="color" id="cor" name="cor" placeholder=" " value="#000000" required>
                                <label for="cor">Cor Principal</label>
                            </div>
                        </div>

                        <div class="input-group">
                            <div class="input-field">
                                <input type="text" id="mascote" name="mascote" placeholder=" " required>
                                <label for="mascote">Mascote</label>
                                <span class="error-message" id="mascote-error"></span>
                            </div>
                        </div>

                        <div class="input-group file-input-group">
                            <div class="input-file">
                                <label for="escudo" class="file-label">
                                    <span class="file-text">Escudo do Time</span>
                                    <input type="file" name="escudo" id="escudo" accept="image/*" required>
                                    <span class="file-button">Selecionar Arquivo</span>
                                </label>
                                <div class="file-name" id="escudo-name">Nenhum arquivo selecionado</div>
                                <div class="image-preview" id="escudo-preview"></div>
                                <span class="error-message" id="escudo-error"></span>
                            </div>
                        </div>

                        <div class="input-group file-input-group">
                            <div class="input-file">
                                <label for="uniforme" class="file-label">
                                    <span class="file-text">Uniforme do Time</span>
                                    <input type="file" name="uniforme" id="uniforme" accept="image/*" required>
                                    <span class="file-button">Selecionar Arquivo</span>
                                </label>
                                <div class="file-name" id="uniforme-name">Nenhum arquivo selecionado</div>
                                <div class="image-preview" id="uniforme-preview"></div>
                                <span class="error-message" id="uniforme-error"></span>
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

    <script>
        // JavaScript para funcionalidades aprimoradas
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('club-form');
            const submitButton = document.getElementById('submit-button');
            const loadingSpinner = document.getElementById('loading-spinner');
            
            // Configuração para o escudo
            const escudoInput = document.getElementById('escudo');
            const escudoName = document.getElementById('escudo-name');
            const escudoPreview = document.getElementById('escudo-preview');

            escudoInput.addEventListener('change', function(e) {
                const file = e.target.files[0];
                if (file) {
                    // Validação de tipo de arquivo
                    if (!file.type.match('image.*')) {
                        showError('escudo-error', 'Por favor, selecione uma imagem válida.');
                        escudoInput.value = '';
                        return;
                    }
                    
                    // Validação de tamanho (máximo 5MB)
                    if (file.size > 5 * 1024 * 1024) {
                        showError('escudo-error', 'A imagem deve ter no máximo 5MB.');
                        escudoInput.value = '';
                        return;
                    }
                    
                    escudoName.textContent = file.name;
                    clearError('escudo-error');
                    
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        escudoPreview.innerHTML = `
                            <img src="${e.target.result}" alt="Pré-visualização do escudo">
                            <button type="button" class="remove-button" data-input="escudo">Remover</button>
                        `;
                        
                        // Adicionar evento para o botão de remover
                        document.querySelector('[data-input="escudo"]').addEventListener('click', function() {
                            escudoInput.value = '';
                            escudoName.textContent = 'Nenhum arquivo selecionado';
                            escudoPreview.innerHTML = '';
                        });
                    }
                    reader.readAsDataURL(file);
                } else {
                    escudoName.textContent = 'Nenhum arquivo selecionado';
                    escudoPreview.innerHTML = '';
                }
            });

            // Configuração para o uniforme
            const uniformeInput = document.getElementById('uniforme');
            const uniformeName = document.getElementById('uniforme-name');
            const uniformePreview = document.getElementById('uniforme-preview');

            uniformeInput.addEventListener('change', function(e) {
                const file = e.target.files[0];
                if (file) {
                    // Validação de tipo de arquivo
                    if (!file.type.match('image.*')) {
                        showError('uniforme-error', 'Por favor, selecione uma imagem válida.');
                        uniformeInput.value = '';
                        return;
                    }
                    
                    // Validação de tamanho (máximo 5MB)
                    if (file.size > 5 * 1024 * 1024) {
                        showError('uniforme-error', 'A imagem deve ter no máximo 5MB.');
                        uniformeInput.value = '';
                        return;
                    }
                    
                    uniformeName.textContent = file.name;
                    clearError('uniforme-error');
                    
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        uniformePreview.innerHTML = `
                            <img src="${e.target.result}" alt="Pré-visualização do uniforme">
                            <button type="button" class="remove-button" data-input="uniforme">Remover</button>
                        `;
                        
                        // Adicionar evento para o botão de remover
                        document.querySelector('[data-input="uniforme"]').addEventListener('click', function() {
                            uniformeInput.value = '';
                            uniformeName.textContent = 'Nenhum arquivo selecionado';
                            uniformePreview.innerHTML = '';
                        });
                    }
                    reader.readAsDataURL(file);
                } else {
                    uniformeName.textContent = 'Nenhum arquivo selecionado';
                    uniformePreview.innerHTML = '';
                }
            });

            // Formatação do CEP
            const cepInput = document.getElementById('cep');
            const estadoInput = document.getElementById('estado');
            const cidadeInput = document.getElementById('cidade');
            
            cepInput.addEventListener('input', function(e) {
                let value = e.target.value.replace(/\D/g, '');
                if (value.length > 5) {
                    value = value.substring(0,5) + '-' + value.substring(5,8);
                }
                e.target.value = value;
                
                // Buscar CEP quando tiver 8 dígitos
                if (value.replace(/\D/g, '').length === 8) {
                    buscarCEP(value);
                } else {
                    // Limpar campos se CEP for incompleto
                    estadoInput.value = '';
                    cidadeInput.value = '';
                }
            });

            // Formatação da sigla (maiúsculas)
            const siglaInput = document.getElementById('sigla');
            siglaInput.addEventListener('input', function(e) {
                e.target.value = e.target.value.toUpperCase();
            });

            // Validação em tempo real
            const inputs = form.querySelectorAll('input[required]');
            inputs.forEach(input => {
                input.addEventListener('blur', function() {
                    validateField(this);
                });
                
                input.addEventListener('input', function() {
                    clearError(this.id + '-error');
                });
            });

            // Envio do formulário
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                
                // Validar todos os campos
                let isValid = true;
                inputs.forEach(input => {
                    if (!validateField(input)) {
                        isValid = false;
                    }
                });
                
                if (isValid) {
                    // Mostrar loading
                    submitButton.disabled = true;
                    loadingSpinner.style.display = 'inline-block';
                    
                    // Simular envio (substituir pela lógica real)
                    setTimeout(() => {
                        // Aqui você enviaria o formulário normalmente
                        // form.submit();
                        
                        // Por enquanto, apenas resetamos o formulário
                        alert('Formulário enviado com sucesso!');
                        form.reset();
                        resetForm();
                        
                        // Restaurar botão
                        submitButton.disabled = false;
                        loadingSpinner.style.display = 'none';
                    }, 2000);
                }
            });

            // Função para buscar CEP
            function buscarCEP(cep) {
                cep = cep.replace(/\D/g, '');
                
                if (cep.length !== 8) return;
                
                // Mostrar loading no campo CEP
                cepInput.classList.add('loading');
                
                fetch(`https://viacep.com.br/ws/${cep}/json/`)
                    .then(response => response.json())
                    .then(data => {
                        cepInput.classList.remove('loading');
                        
                        if (!data.erro) {
                            estadoInput.value = data.uf;
                            cidadeInput.value = data.localidade;
                            clearError('cep-error');
                        } else {
                            showError('cep-error', 'CEP não encontrado.');
                            estadoInput.value = '';
                            cidadeInput.value = '';
                        }
                    })
                    .catch(error => {
                        cepInput.classList.remove('loading');
                        showError('cep-error', 'Erro ao buscar CEP. Tente novamente.');
                        console.error('Erro ao buscar CEP:', error);
                    });
            }

            // Função para validar campo
            function validateField(field) {
                const errorElement = document.getElementById(field.id + '-error');
                
                if (!field.value.trim()) {
                    showError(field.id + '-error', 'Este campo é obrigatório.');
                    return false;
                }
                
                // Validações específicas por tipo de campo
                switch(field.type) {
                    case 'text':
                        if (field.id === 'sigla' && field.value.length < 2) {
                            showError(field.id + '-error', 'A sigla deve ter pelo menos 2 caracteres.');
                            return false;
                        }
                        break;
                    case 'date':
                        const selectedDate = new Date(field.value);
                        const today = new Date();
                        if (selectedDate > today) {
                            showError(field.id + '-error', 'A data de fundação não pode ser futura.');
                            return false;
                        }
                        break;
                    case 'file':
                        if (!field.files || field.files.length === 0) {
                            showError(field.id + '-error', 'Este arquivo é obrigatório.');
                            return false;
                        }
                        break;
                }
                
                clearError(field.id + '-error');
                return true;
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

            // Função para resetar o formulário
            function resetForm() {
                escudoName.textContent = 'Nenhum arquivo selecionado';
                escudoPreview.innerHTML = '';
                uniformeName.textContent = 'Nenhum arquivo selecionado';
                uniformePreview.innerHTML = '';
                estadoInput.value = '';
                cidadeInput.value = '';
                
                // Limpar todos os erros
                const errorMessages = document.querySelectorAll('.error-message');
                errorMessages.forEach(error => {
                    error.textContent = '';
                    error.style.display = 'none';
                });
            }
        });
    </script>
</body>
</html>