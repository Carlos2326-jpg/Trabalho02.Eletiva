document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('redefinir-senha-form');
    const senhaInput = document.getElementById('senha');
    const confSenhaInput = document.getElementById('confSenha');
    const toggleButtons = document.querySelectorAll('.toggle-password');
    const submitButton = document.querySelector('.submit-button');

    // Toggle para mostrar/ocultar senha
    toggleButtons.forEach(button => {
        button.addEventListener('click', function() {
            const targetId = this.getAttribute('data-target');
            const targetInput = document.getElementById(targetId);
            const eyeIcon = this.querySelector('.eye-icon');
            
            if (targetInput.type === 'password') {
                targetInput.type = 'text';
                eyeIcon.src = '../public/icones/olho.png';
                eyeIcon.alt = 'Ocultar senha';
            } else {
                targetInput.type = 'password';
                eyeIcon.src = '../public/icones/olho-vermelho.png';
                eyeIcon.alt = 'Mostrar senha';
            }
        });
    });

    // Validação em tempo real da senha
    senhaInput.addEventListener('input', function() {
        validatePassword();
        validatePasswordMatch();
    });

    confSenhaInput.addEventListener('input', validatePasswordMatch);

    // Validação dos requisitos da senha
    function validatePassword() {
        const password = senhaInput.value;
        const requirements = {
            length: password.length >= 8,
            uppercase: /[A-Z]/.test(password),
            lowercase: /[a-z]/.test(password),
            number: /[0-9]/.test(password),
            special: /[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]/.test(password)
        };

        // Atualiza visual dos requisitos
        Object.keys(requirements).forEach(req => {
            const element = document.getElementById(`req-${req}`);
            if (element) {
                if (requirements[req]) {
                    element.classList.add('valid');
                    element.classList.remove('invalid');
                } else {
                    element.classList.add('invalid');
                    element.classList.remove('valid');
                }
            }
        });

        return Object.values(requirements).every(req => req);
    }

    // Validação se as senhas coincidem
    function validatePasswordMatch() {
        const senha = senhaInput.value;
        const confSenha = confSenhaInput.value;
        const confSenhaField = confSenhaInput.closest('.input-field');

        if (confSenha && senha !== confSenha) {
            confSenhaField.classList.add('error');
            confSenhaField.classList.remove('success');
            return false;
        } else if (confSenha && senha === confSenha) {
            confSenhaField.classList.add('success');
            confSenhaField.classList.remove('error');
            return true;
        }
        
        return false;
    }

    // Validação do formulário
    form.addEventListener('submit', function(e) {
        e.preventDefault();
        
        const isPasswordValid = validatePassword();
        const isMatchValid = validatePasswordMatch();
        
        if (!isPasswordValid) {
            alert('Por favor, atenda a todos os requisitos da senha.');
            return;
        }
        
        if (!isMatchValid) {
            alert('As senhas não coincidem. Por favor, verifique.');
            return;
        }

    });
});