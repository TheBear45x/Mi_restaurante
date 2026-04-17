function mostrarAnimacion() {
    const nombre = document.getElementById('nombre').value;

    if (nombre === "") {
        Swal.fire({
            icon: 'warning',
            title: '¡Espera!',
            text: 'Por favor, escribe al menos tu nombre.',
            confirmButtonColor: '#00FF88'
        });
        return;
    }

    Swal.fire({
        title: '¡Cuenta creada!',
        text: 'Bienvenido ' + nombre + ', tu cuenta ha sido registrada con éxito.',
        icon: 'success',
        confirmButtonColor: '#00FF88',
        confirmButtonText: '¡A comer!'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = "/"; 
        }
    });
}

// Menu //
function toggleMenu() {
    document.getElementById("sidebar").classList.toggle("active");
}

document.addEventListener('click', function(event) {
    const sidebar = document.getElementById('sidebar');
    const menuBtn = document.querySelector('.menu-btn');
    
    if (!sidebar.contains(event.target) && !menuBtn.contains(event.target)) {
        sidebar.classList.remove('active');
    }
});

function toggleMenu() {
    const sidebar = document.getElementById('sidebar');
    sidebar.classList.toggle('active');
}

// Abrir y cerrar menú lateral
function toggleMenu() {
    const sidebar = document.getElementById('sidebar');
    const main = document.getElementById('main-content');
    sidebar.classList.toggle('active');
    main.classList.toggle('shifted');
}

// Efecto de aparición suave para las tarjetas al hacer scroll
document.addEventListener("DOMContentLoaded", function() {
    const cards = document.querySelectorAll('.card');
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = "1";
                entry.target.style.transform = "translateY(0)";
            }
        });
    }, { threshold: 0.1 });

    cards.forEach(card => {
        card.style.opacity = "0";
        card.style.transform = "translateY(20px)";
        card.style.transition = "all 0.5s ease-out";
        observer.observe(card);
    });
});