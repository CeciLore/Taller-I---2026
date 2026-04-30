document.addEventListener('DOMContentLoaded', function () {

    const form = document.getElementById('formLogin');

    form.addEventListener('submit', function (event) {

        const passwordInput = document.getElementById('password');
        const emailInput = document.getElementById('email');

        const tienePuntos = passwordInput.value.includes('.');
        const soloEspacios = passwordInput.value.trim().length === 0;

        if (!form.checkValidity() || soloEspacios || tienePuntos) {
            event.preventDefault();
            event.stopPropagation();

            if (tienePuntos) {
                passwordInput.setCustomValidity("No se permiten puntos");
            } else if (soloEspacios) {
                passwordInput.setCustomValidity("Inválido");
            }

        } else {
            passwordInput.setCustomValidity("");
            event.preventDefault();

            const btn = document.getElementById('btnLogin');
            const alerta = document.getElementById('alertaExito');

            btn.innerHTML = '<span class="spinner-border spinner-border-sm"></span> Validando...';
            btn.disabled = true;

            setTimeout(() => {
                alerta.classList.remove('d-none');
                btn.innerHTML = '¡BIENVENIDO! ✨';
                btn.style.backgroundColor = '#2ecc71';
                btn.style.color = 'white';
                btn.style.borderColor = '#155724';
            }, 1500);
        }

        form.classList.add('was-validated');

    });

    document.querySelectorAll('input').forEach(input => {
        input.addEventListener('input', function () {
            this.setCustomValidity("");
        });
    });

});