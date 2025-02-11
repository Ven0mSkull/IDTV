const container = document.querySelector('.container');
const registerBtn = document.querySelector('.register-btn');
const loginBtn = document.querySelector('.login-btn');

registerBtn.addEventListener('click', () => {
    container.classList.add('active');
});

loginBtn.addEventListener('click', () => {
    container.classList.remove('active');
});

// Validação de confirmação de senha
const registerForm = document.querySelector('.register form');
registerForm.addEventListener('submit', function(event) {
    const password = document.querySelector('.register input[name="password"]').value;
    const confirmPassword = document.querySelector('.register input[name="confirm_password"]').value;

    if (password !== confirmPassword) {
        alert('As senhas não coincidem!');
        event.preventDefault(); // Impede o envio do formulário
    }
});