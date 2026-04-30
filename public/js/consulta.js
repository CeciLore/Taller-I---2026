(function () {
    'use strict';

    const form = document.getElementById('formConsultas');
    if (!form) return; // 👈 evita errores en otras páginas

    const mensajeInput = document.getElementById('mensaje');

    function validarMensaje(input) {
        if (input.value.trim().length === 0) {
            input.setCustomValidity("Invalid");
        } else {
            input.setCustomValidity("");
        }
    }

    form.addEventListener('submit', function (event) {

        validarMensaje(mensajeInput);

        if (!form.checkValidity()) {
            event.preventDefault();
            event.stopPropagation();
        } else {
            event.preventDefault();

            const btn = document.getElementById('btnConsulta');
            const alerta = document.getElementById('alertaExito');

            btn.innerHTML = '<span class="spinner-border spinner-border-sm"></span> Enviando...';
            btn.disabled = true;

            setTimeout(() => {
                alerta.classList.remove('d-none');
                btn.innerHTML = '¡MENSAJE RECIBIDO! ✅';
                btn.style.backgroundColor = '#2ecc71';
                btn.style.color = 'white';

                form.reset();
                form.classList.remove('was-validated');
            }, 1500);
        }

        form.classList.add('was-validated');
    });

})();