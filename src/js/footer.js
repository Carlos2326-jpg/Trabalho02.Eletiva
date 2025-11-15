// Função para criar o footer
function criarFooter() {
    const footer = document.createElement('footer');
    footer.style.backgroundColor = '#4D3632';
    footer.style.padding = '40px 20px';
    footer.style.fontFamily = 'Arial, sans-serif';
    footer.style.borderTop = '1px solid #4D3632';
    
    const container = document.createElement('div');
    container.style.width = '89vw'; 
    container.style.margin = '0 auto';
    container.style.display = 'flex';
    container.style.justifyContent = ' center';
    container.style.gridTemplateColumns = 'repeat(auto-fit, minmax(200px, 1fr))';
    container.style.gap = '30px 100px';
    
    // Coluna NAVEGAÇÃO
    const navegacao = criarColuna('NAVEGAÇÃO', [
        { texto: 'Notícias', href: '#' },
        { texto: 'Tabelas', href: '#' },
        { texto: 'Resultados', href: '#' },
        { texto: 'Calendário', href: '#' },
        { texto: 'Regulamentos', href: '#' }
    ]); 
    
    // Coluna EXPLORAR
    const explorar = criarColuna('EXPLORAR', [
        { texto: 'Clubes M', href: '#' },
        { texto: 'Clubes F', href: '#' },
        { texto: 'Atletas', href: '#' },
        { texto: 'Estatísticas', href: '#' },
        { texto: 'Transferências', href: '#' }
    ]);
    
    // Coluna RECURSOS
    const recursos = criarColuna('RECURSOS', [
        { texto: 'Infográficos', href: '#' },
        { texto: 'Galeria', href: '#' },
        { texto: 'Vídeos', href: '#' },
        { texto: 'Podcast', href: '#' }
    ]);
    
    // Coluna INSTITUCIONAL
    const institucional = criarColuna('INSTITUCIONAL', [
        { texto: 'Sobre Nós', href: '#' },
        { texto: 'Contato', href: '#' },
        { texto: 'Anuncie', href: '#' },
        { texto: 'Privacidade', href: '#' }
    ]);
    
    // Adicionar colunas ao container
    container.appendChild(navegacao);
    container.appendChild(explorar);
    container.appendChild(recursos);
    container.appendChild(institucional);
    
    footer.appendChild(container);
    
    return footer;
}

// Função auxiliar para criar uma coluna
function criarColuna(titulo, itens) {
    const coluna = document.createElement('div');
    
    const tituloElement = document.createElement('h3');
    tituloElement.textContent = titulo;
    tituloElement.style.color = '#ffff';
    tituloElement.style.marginBottom = '15px';
    tituloElement.style.fontSize = '20px';
    tituloElement.style.fontWeight = 'bold';
    tituloElement.style.textTransform = 'uppercase';
    
    const lista = document.createElement('ul');
    lista.style.listStyle = 'none';
    lista.style.padding = '0';
    lista.style.margin = '0';
    
    itens.forEach(item => {
        const listItem = document.createElement('li');
        listItem.style.marginBottom = '8px';
        
        const link = document.createElement('a');
        link.textContent = item.texto;
        link.href = item.href;
        link.style.color = '#ffff';
        link.style.textDecoration = 'none';
        link.style.fontSize = '16px';
        link.style.transition = 'color 0.3s ease';
        
        // Efeito hover
        link.addEventListener('mouseover', () => {
            link.style.color = '#007bff';
        });
        link.addEventListener('mouseout', () => {
            link.style.color = '#ffff   ';
        });
        
        listItem.appendChild(link);
        lista.appendChild(listItem);
    });
    
    coluna.appendChild(tituloElement);
    coluna.appendChild(lista);
    
    return coluna;
}

// Função para inicializar o footer
function inicializarFooter() {
    const footerContainer = document.getElementById('footer-container');
    if (footerContainer) {
        const footer = criarFooter();
        footerContainer.appendChild(footer);
    }
}

// Executar quando o DOM estiver carregado
document.addEventListener('DOMContentLoaded', inicializarFooter);