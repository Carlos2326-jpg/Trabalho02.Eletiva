document.addEventListener('DOMContentLoaded', function() {
    const inputs = document.querySelectorAll('.input');
    const form = document.getElementById('verification-form');
    const reenviarLink = document.getElementById('link');
    
    // Auto-focus e navegação entre inputs
    inputs.forEach((input, index) => {
        input.addEventListener('input', function(e) {
            // Permite apenas números
            this.value = this.value.replace(/[^0-9]/g, '');
            
            // Move para o próximo input automaticamente
            if (this.value.length === 1 && index < inputs.length - 1) {
                inputs[index + 1].focus();
            }
        });
        
        // Permite navegar com backspace
        input.addEventListener('keydown', function(e) {
            if (e.key === 'Backspace' && this.value === '' && index > 0) {
                inputs[index - 1].focus();
            }
        });
    });
    
    // Validação do formulário
    form.addEventListener('submit', function(e) {
        e.preventDefault();
        
        let codigo = '';
        inputs.forEach(input => {
            codigo += input.value;
        });
        
        if (codigo.length === 6) {
            // Aqui você pode adicionar a lógica de verificação do código
            console.log('Código enviado:', codigo);
            // Redirecionar ou fazer a verificação
            window.location.href = '../viwer/RedefinirSenha.php';
        } else {
            alert('Por favor, preencha todos os 6 dígitos do código.');
            inputs[0].focus();
        }
    });
    
    // Reenviar código
    reenviarLink.addEventListener('click', function(e) {
        e.preventDefault();
        // Aqui você pode adicionar a lógica para reenviar o código
        alert('Código reenviado para seu email!');
        
        // Limpa os inputs e foca no primeiro
        inputs.forEach(input => input.value = '');
        inputs[0].focus();
    });
});