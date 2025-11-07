// Função para criar o header
function criarHeader() {
    const header = document.createElement('header');
    header.style.backgroundColor = '#CC3921';
    header.style.color = 'white';
    header.style.padding = '15px 0';
    header.style.position = 'sticky';
    header.style.top = '0';
    header.style.zIndex = '1000';

    const container = document.createElement('div');
    container.style.width = '100vw';
    container.style.height = '123.21px';
    container.style.display = 'flex';
    container.style.justifyContent = 'space-between';
    container.style.alignItems = 'center';
    container.style.padding = '0 20px';

    // Logo
    const logo = document.createElement('div');
    logo.style.display = 'flex';
    logo.style.alignItems = 'center';
    logo.style.gap = '10px';
    
    // Criar elemento img para a logo
    const logoIcon = document.createElement('img');
    
    // Definir atributos da logo
    logoIcon.src = '../public/icones/voleibol.png'; 
    logoIcon.alt = 'Ícone de Voleibol'; 
    logoIcon.style.width = '100px'; 
    logoIcon.style.height = '100px';
    // REMOÇÃO: Não deve adicionar a imagem diretamente ao body aqui

    const logoText = document.createElement('h1');
    logoText.textContent = 'RadarVôlei';
    logoText.style.margin = '0'; 
    logoText.style.fontSize = '48px';
    logoText.style.fontWeight = 'bold';
    logoText.style.color = '#FFFFFF'; 
    logoText.style.textShadow = '2px 4px 4px rgba(0, 0, 0, 1)'; 
    
    logo.appendChild(logoIcon);
    logo.appendChild(logoText);

    // Utils container
    const utils = document.createElement('div');
    utils.style.display = 'flex';
    utils.style.alignItems = 'center';
    utils.style.gap = '15px';

    // Ícone do usuário
    const userIcon = document.createElement('img'); 
    
    // Definir atributos do ícone do usuário
    userIcon.src = '../public/icones/conta-de-usuario.png';
    userIcon.alt = 'Perfil do usuário'; 
    userIcon.style.width = '70px'; 
    userIcon.style.height = '70px';
    userIcon.style.cursor = 'pointer';
    userIcon.style.borderRadius = '50%';
    userIcon.style.transition = 'background-color 0.3s ease';
    userIcon.style.padding = '5px'; 

    userIcon.addEventListener('mouseover', function() {
        this.style.backgroundColor = '#a52e1cff';
    });

    userIcon.addEventListener('mouseout', function() {
        this.style.backgroundColor = 'transparent';
    });

    utils.appendChild(userIcon);

    container.appendChild(logo);
    container.appendChild(utils);

    header.appendChild(container);

    return header;
}

// Adicionar o header ao início do body
function adicionarHeader() {
    if (document.querySelector('header')) {
        console.log('Header já existe');
        return;
    }

    const header = criarHeader();
    document.body.insertBefore(header, document.body.firstChild);   
    console.log('Header adicionado com sucesso!');
}

// Carregar o header quando a página estiver pronta
if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', adicionarHeader);
} else {
    adicionarHeader();
}