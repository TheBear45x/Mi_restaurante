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