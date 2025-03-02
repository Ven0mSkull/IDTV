const loginPopup = document.getElementById('login-popup');
const closePopup = document.getElementById('close-popup');
const showRegister = document.getElementById('show-register');
const loginForm = document.getElementById('login-form');
const registerForm = document.getElementById('register-form');

document.getElementById('login-button').addEventListener('click', (e) => {
    e.preventDefault();
    loginPopup.classList.add('active');
});

closePopup.addEventListener('click', () => {
    loginPopup.classList.remove('active');
});

showRegister.addEventListener('click', (e) => {
    e.preventDefault();
    loginForm.classList.add('hidden');
    registerForm.classList.remove('hidden');
});
