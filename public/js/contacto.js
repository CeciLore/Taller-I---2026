(function () {
    'use strict';

    const form = document.getElementById('formContacto');
    if (!form) return;

    const mensajeArea = document.getElementById('mensaje');

    form.addEventListener('submit', function (event) {

        if (mensajeArea.value.trim().length === 0) {
            mensajeArea.setCustomValidity('Invalid');
        } else {
            mensajeArea.setCustomValidity('');
        }

        if (!form.checkValidity()) {
            event.preventDefault();
            event.stopPropagation();
        } else {
            event.preventDefault();

            const btn = document.getElementById('btnEnviar');
            const mensajeExito = document.getElementById('mensajeExito');

            btn.innerHTML = 'ENVIANDO...';
            btn.disabled = true;

            setTimeout(() => {
                btn.innerHTML = 'MENSAJE RECIBIDO ✅';
                btn.style.background = '#2ecc71';
                btn.style.color = 'white';

                mensajeExito.classList.remove('d-none');
                form.reset();
                form.classList.remove('was-validated');
            }, 1000);
        }

        form.classList.add('was-validated');
    });

    mensajeArea.addEventListener('input', function () {
        if (this.value.trim().length > 0) {
            this.setCustomValidity('');
        }
    });

})();