import 'bootstrap';

// Función para cambiar el tema y actualizar la interfaz
function setTheme(themeValue) {
    document.documentElement.setAttribute('data-bs-theme', themeValue);
    localStorage.setItem('theme', themeValue);

    // Agregar o quitar la clase 'active' según el tema seleccionado
    document.querySelectorAll('.dropdown-item').forEach(button => {
        button.classList.remove('active');
    });
    document.querySelector(`[data-bs-theme-value="${themeValue}"]`).classList.add('active');

    // Ocultar todos los iconos
    document.querySelectorAll('.dropdown-item svg').forEach(icon => {
        icon.classList.add('d-none');
    });

    // Mostrar el icono correspondiente al tema seleccionado
    document.querySelector(`[data-bs-theme-value="${themeValue}"] svg`).classList.remove('d-none');
}

// Obtener el tema almacenado en localStorage o establecer 'auto' como predeterminado
const storedTheme = localStorage.getItem('theme') || 'auto';
document.documentElement.setAttribute('data-bs-theme', storedTheme);

// Manejar clic en los botones de tema
document.querySelectorAll('.dropdown-item').forEach(item => {
    item.addEventListener('click', (event) => {
        const themeValue = event.currentTarget.getAttribute('data-bs-theme-value');
        setTheme(themeValue);
    });
});

// Llamar a setTheme con el tema almacenado para asegurarse de que la interfaz esté actualizada
setTheme(storedTheme);