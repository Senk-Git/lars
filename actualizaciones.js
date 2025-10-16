// Espera a que el documento esté completamente cargado
document.addEventListener("DOMContentLoaded", function () {

    // Agregar un manejador de eventos de clic a toda la sección de actualizaciones
    document.querySelector('.recent-updates').addEventListener('click', function (event) {
        
        // Verifica si se hizo clic en una actualización específica
        const updateClicked = event.target.closest('.update');

        // Si se hizo clic en una actualización, procedemos a actualizarla
        if (updateClicked) {

            // Obtiene el índice de la actualización clickeada
            const updates = document.querySelectorAll('.update');
            const index = Array.from(updates).indexOf(updateClicked) + 1; // índice empieza desde 1

            // Encuentra el contenedor de mensaje dentro de la actualización
            const messageElement = updateClicked.querySelector('.message');

            // Actualiza el contenido con el mensaje de clic
            messageElement.innerHTML = `
                <p><b>Evento registrado:</b> Hiciste clic en la actualización número ${index}.</p>
                <small class="text-muted">Hace justo ahora</small>
            `;
        }
    });
});
