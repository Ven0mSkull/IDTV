document.addEventListener("DOMContentLoaded", () => {
    const popup = document.getElementById("login-popup");
    const closeButton = document.getElementById("close-popup");
    const loginButton = document.getElementById("login-button");
    const loginForm = document.getElementById("login-form");

    // Exibe o popup ao clicar no botão de login
    loginButton.addEventListener("click", (event) => {
        event.preventDefault(); // Evita redirecionamento se for um link
        popup.classList.remove("hidden");
        popup.classList.add("active");
    });

    // Fecha o popup ao clicar no botão de fechar
    closeButton.addEventListener("click", () => {
        popup.classList.add("hidden");
        popup.classList.remove("active");
        // Aguarda a animação terminar antes de esconder o elemento
        setTimeout(() => popup.classList.remove("hidden"), 300);
    });

    // Opcional: Fecha o popup ao clicar fora do conteúdo
    popup.addEventListener("click", (event) => {
        if (event.target === popup) {
            popup.classList.add("hidden");
            popup.classList.remove("active");
            setTimeout(() => popup.classList.remove("hidden"), 300);
        }
    });

    // Impede o redirecionamento padrão do formulário e processa o login
    loginForm.addEventListener("submit", (event) => {
        event.preventDefault();

        const username = document.getElementById("username").value;
        const password = document.getElementById("password").value;

        if (username === "admin" && password === "1234") {
            alert("Login bem-sucedido!");
            popup.classList.add("hidden");
            popup.classList.remove("active");
            setTimeout(() => popup.classList.remove("hidden"), 300);
        } else {
            alert("Usuário ou senha inválidos.");
        }
    });
});
