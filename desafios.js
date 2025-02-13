// Animação da Logo
const logo = document.querySelector('.logo');

logo.addEventListener('mouseover', () => {
    logo.style.animationPlayState = 'paused';
});

logo.addEventListener('mouseout', () => {
    logo.style.animationPlayState = 'running';
});