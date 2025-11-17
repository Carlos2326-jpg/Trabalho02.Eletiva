<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Cadastro de notícias para o MapaVolei">
    <link rel="stylesheet" href="../css/CadastrarNoticia.css">
    <title>MapaVolei - Cadastro de Notícia</title>
</head>
<body>

    <main id="main-content">
        <section class="form-section">
            <a href="../viwer/MapaVolei.php" class="return-link" aria-label="Voltar para página inicial">
                <img src="../public/icones/de-volta.png" alt="Ícone de voltar" class="return-icon">
            </a>

            <form class="form-container" action="../processos/Proc_Noticias.php" method="POST" enctype="multipart/form-data">   
                <div class="form-wrapper">
                    <h1 class="form-title">Cadastrar Nova Notícia</h1>
                    
                    <div class="form-content">
                        <div class="input-group">
                            <img src="../public/icones/grampo.png" alt="Ícone de link" class="input-icon" aria-hidden="true">
                            <div class="input-field">
                                <input type="url" id="url" name="url" placeholder=" " required>
                                <label for="url">URL/Link da Notícia</label>
                            </div>
                        </div>

                        <div class="input-group">
                            <div class="input-field">
                                <input type="text" id="title" name="title" placeholder=" " required maxlength="200">
                                <label for="title">Título da Notícia</label>
                            </div>
                        </div>

                        <div class="input-group">
                            <div class="input-field textarea-field">
                                <textarea id="resumo" name="resumo" placeholder=" " required rows="5" maxlength="500"></textarea>
                                <label for="resumo">Resumo da Notícia</label>
                                <span class="char-counter" id="resumo-counter">0/500</span>
                            </div>
                        </div>

                        <div class="input-group file-input-group">
                            <div class="input-file">
                                <label for="img" class="file-label">
                                    <span class="file-text">Imagem da Notícia</span>
                                    <input type="file" name="img" id="img" accept="image/*" required>
                                    <span class="file-button">Selecionar Arquivo</span>
                                </label>
                                <div class="file-name" id="file-name">Nenhum arquivo selecionado</div>
                                <div class="image-preview" id="image-preview"></div>
                            </div>
                        </div>

                        <button type="submit" class="submit-button">
                            <span class="button-text">Finalizar Cadastro</span>
                        </button>
                    </div>
                </div>
            </form>
        </section>
    </main>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const fileInput = document.getElementById('img');
            const fileName = document.getElementById('file-name');
            const imagePreview = document.getElementById('image-preview');
            const resumoTextarea = document.getElementById('resumo');
            const resumoCounter = document.getElementById('resumo-counter');

            // Contador de caracteres para o resumo
            resumoTextarea.addEventListener('input', function() {
                const length = this.value.length;
                resumoCounter.textContent = `${length}/500`;
                
                if (length > 450) {
                    resumoCounter.style.color = '#ff4444';
                } else if (length > 400) {
                    resumoCounter.style.color = '#ffa500';
                } else {
                    resumoCounter.style.color = 'var(--preto)';
                }
            });

            // Preview de imagem
            fileInput.addEventListener('change', function(event) {
                const file = event.target.files[0];
                
                // Limpa preview anterior
                imagePreview.innerHTML = '';
                imagePreview.style.display = 'none';
                
                if (file) {
                    // Verifica se é uma imagem
                    if (!file.type.match('image.*')) {
                        alert('Por favor, selecione apenas arquivos de imagem!');
                        fileInput.value = '';
                        fileName.textContent = 'Nenhum arquivo selecionado';
                        return;
                    }
                    
                    // Verifica tamanho do arquivo (5MB)
                    if (file.size > 5 * 1024 * 1024) {
                        alert('A imagem deve ter menos de 5MB');
                        fileInput.value = '';
                        fileName.textContent = 'Nenhum arquivo selecionado';
                        return;
                    }
                    
                    fileName.textContent = file.name;
                    
                    const reader = new FileReader();
                    
                    reader.onload = function(e) {
                        // Cria a imagem de preview
                        const img = document.createElement('img');
                        img.src = e.target.result;
                        img.alt = 'Pré-visualização da imagem';
                        
                        // Adiciona a imagem ao container
                        imagePreview.appendChild(img);
                        imagePreview.style.display = 'block';
                        
                        // Adiciona botão de remover
                        const removeBtn = document.createElement('button');
                        removeBtn.textContent = 'Remover Imagem';
                        removeBtn.type = 'button';
                        removeBtn.className = 'remove-button';
                        
                        removeBtn.onclick = function() {
                            imagePreview.innerHTML = '';
                            imagePreview.style.display = 'none';
                            fileInput.value = '';
                            fileName.textContent = 'Nenhum arquivo selecionado';
                        };
                        
                        imagePreview.appendChild(removeBtn);
                    };
                    
                    reader.onerror = function() {
                        alert('Erro ao carregar a imagem. Tente novamente.');
                        fileInput.value = '';
                        fileName.textContent = 'Nenhum arquivo selecionado';
                    };
                    
                    reader.readAsDataURL(file);
                } else {
                    fileName.textContent = 'Nenhum arquivo selecionado';
                }
            });

            // Validação do formulário
            const form = document.querySelector('.form-container');
            form.addEventListener('submit', function(event) {
                const urlInput = document.getElementById('url');
                const titleInput = document.getElementById('title');
                const resumoInput = document.getElementById('resumo');
                
                // Validação básica de URL
                if (urlInput.value && !isValidUrl(urlInput.value)) {
                    event.preventDefault();
                    alert('Por favor, insira uma URL válida.');
                    urlInput.focus();
                    return;
                }
                
                // Validação de campos obrigatórios
                if (!titleInput.value.trim()) {
                    event.preventDefault();
                    alert('Por favor, preencha o título da notícia.');
                    titleInput.focus();
                    return;
                }
                
                if (!resumoInput.value.trim()) {
                    event.preventDefault();
                    alert('Por favor, preencha o resumo da notícia.');
                    resumoInput.focus();
                    return;
                }
                
                if (!fileInput.files[0]) {
                    event.preventDefault();
                    alert('Por favor, selecione uma imagem para a notícia.');
                    fileInput.focus();
                    return;
                }
            });

            function isValidUrl(string) {
                try {
                    new URL(string);
                    return true;
                } catch (_) {
                    return false;
                }
            }
        });
    </script>

    <footer id="footer-container"></footer>
    <script src="../js/header.js"></script>
    <script src="../js/Nav01.js"></script>
    <script src="../js/footer.js"></script>
</body>
</html>