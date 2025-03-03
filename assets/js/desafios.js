// Função para trocar entre os conteúdos dos desafios
const links = document.querySelectorAll('.sidebar a');
const contents = document.querySelectorAll('.content div');
// Animação da Logo
const logo = document.querySelector('.logo');

links.forEach(link => {
  link.addEventListener('click', function(event) {
    event.preventDefault();

    // Remover a classe active de todos os links e conteúdos
    links.forEach(link => link.classList.remove('active'));
    contents.forEach(content => content.style.display = 'none');

    // Adicionar a classe active ao link clicado e exibir o conteúdo correspondente
    this.classList.add('active');
    const target = document.querySelector(this.getAttribute('href'));
    target.style.display = 'block';
  });
});

logo.addEventListener('mouseover', () => {
    logo.style.animationPlayState = 'paused';
});

logo.addEventListener('mouseout', () => {
    logo.style.animationPlayState = 'running';
});