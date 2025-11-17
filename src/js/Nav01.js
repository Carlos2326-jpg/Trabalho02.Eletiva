// Função para criar a navegação
function criarNav01() {
    const nav = document.createElement('nav');
    nav.style.backgroundColor = '#CC3921';
    nav.style.boxShadow = '0 2px 5px rgba(0,0,0,0.1)';
    nav.style.border = '1px solid #000000ff';
    
    const container = document.createElement('div');
    container.style.width = '   100vw';
    container.style.height = '86.54px'
    container.style.border = '1px solid #0000'; 
    container.style.display = 'flex';
    container.style.justifyContent = 'center';
    container.style.justifyContent = 'center';

    const navList = document.createElement('ul');
    navList.style.display = 'flex';
    navList.style.listStyle = 'none';
    navList.style.margin = '0';
    navList.style.padding = '0';
    navList.style.gap = '60px';
    navList.style.alignItems = 'center';

    const menuItems = [
<<<<<<< HEAD
        { texto: 'Home', href: '../viwer/TelaHome.php' },
        { texto: 'Mapa do Vôlei', href: '../viwer/MapaVolei.php' },
        { texto: 'Mapa dos Clubes', href: '../viwer/MapaClube.php' },
        { texto: 'Regulamentos do Vôlei', href: '../viwer/TelaRegulamentos.php' }   
=======
        { texto: 'Home', href: '../viwer/Home.php' },
        { texto: 'Mapa do Vôlei', href: '../viwer/MapaVolei.php' },
        { texto: 'Mapa dos Clubes', href: '../viwer/MapaClube.php' },
        { texto: 'Regulamentos do Vôlei', href: '../viwer/TelaRegulamentos.php' }
>>>>>>> origin/main
    ];

    menuItems.forEach(item => {
        const listItem = document.createElement('li');
        
        const link = document.createElement('a');
        link.href = item.href;
        link.textContent = item.texto;
        link.style.color = '#ffff';
        link.style.textDecoration = 'none';
        link.style.fontWeight = '500';
        link.style.fontSize = '24px';
        link.style.padding = '10px 15px';
        link.style.display = 'block';

        link.addEventListener('mouseover', function() {
            this.style.backgroundColor = '#af311eff';
            this.style.color = '#d3d3d3ff';
        });

        link.addEventListener('mouseout', function() {
            this.style.backgroundColor = 'transparent';
            this.style.color = '#ecf0f1';
        });

        // Adicionar classe ativa se for a página atual
        if (window.location.href.includes(item.href.replace('.php', ''))) {
            link.style.backgroundColor = '#3498db';
            link.style.color = 'white';
        }

        listItem.appendChild(link);
        navList.appendChild(listItem);
    });

    container.appendChild(navList);
    nav.appendChild(container);

    return nav;
}

// Função para adicionar a navegação
function adicionarNav01() {
    if (document.querySelector('nav.nav-principal')) {
        console.log('Navegação já existe');
        return;
    }

    const nav = criarNav01();
    nav.className = 'nav-principal';
    
    // Inserir após o header se existir, senão no topo do body
    const header = document.querySelector('header');
    if (header) {
        header.parentNode.insertBefore(nav, header.nextSibling);
    } else {
        document.body.insertBefore(nav, document.body.firstChild);
    }
    
    console.log('Navegação adicionada com sucesso!');
}

// Carregar a navegação quando a página estiver pronta
if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', adicionarNav01);
} else {
    adicionarNav01();
}