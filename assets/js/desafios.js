document.addEventListener('DOMContentLoaded', () => {
  const links = document.querySelectorAll('.sidebar a');
  const contents = document.querySelectorAll('.content div');
  const sidebar = document.querySelector('.sidebar');
  let toggleBtn;

  // Cria o botão de toggle para mobile
  if (window.innerWidth <= 768) {
    toggleBtn = document.createElement('button');
    toggleBtn.className = 'toggle-btn';
    toggleBtn.textContent = '☰ Menu';
    document.body.appendChild(toggleBtn);

    toggleBtn.addEventListener('click', () => {
      sidebar.classList.toggle('active');
    });
  }

  // Controle dos links
  links.forEach(link => {
    link.addEventListener('click', (e) => {
      e.preventDefault(); // Evita comportamento padrão do :target
      links.forEach(l => l.classList.remove('active'));
      link.classList.add('active');

      contents.forEach(content => content.style.display = 'none');
      const targetId = link.getAttribute('href').substring(1);
      const targetContent = document.getElementById(targetId);
      targetContent.style.display = 'block';

      // Fecha a sidebar em mobile após clique
      if (window.innerWidth <= 768) {
        sidebar.classList.remove('active');
      }
    });
  });

  // Mostra o primeiro desafio por padrão
  document.getElementById('desafio-1').style.display = 'block';
  document.getElementById('link-1').classList.add('active');
});