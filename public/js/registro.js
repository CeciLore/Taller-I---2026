(function () {
    'use strict'

    const form = document.getElementById('formRegistro');
    if (!form) return; // 👈 importante (evita errores en otras vistas)

    const nameInput = document.getElementById('name');
    const emailInput = document.getElementById('email');
    const passInput = document.getElementById('password');
    const confirmInput = document.getElementById('password_confirmation');

    form.addEventListener('submit', function (event) {
        let isValid = true;

        const isEmptyOrSpaces = (input) => input.value.trim().length === 0;
        const hasDots = (input) => input.value.includes('.');
        const hasDoubleDots = (input) => /\.{2,}/.test(input.value);

        if (isEmptyOrSpaces(nameInput) || hasDots(nameInput)) {
            nameInput.setCustomValidity("Invalido");
            isValid = false;
        } else {
            nameInput.setCustomValidity("");
        }

        if (hasDoubleDots(emailInput)) {
            emailInput.setCustomValidity("Invalido");
            isValid = false;
        } else {
            emailInput.setCustomValidity("");
        }

        if (isEmptyOrSpaces(passInput) || hasDots(passInput)) {
            passInput.setCustomValidity("Invalido");
            isValid = false;
        } else {
            passInput.setCustomValidity("");
        }

        if (passInput.value !== confirmInput.value || hasDots(confirmInput)) {
            confirmInput.setCustomValidity("Invalido");
            isValid = false;
        } else {
            confirmInput.setCustomValidity("");
        }

        if (!form.checkValidity() || !isValid) {
            event.preventDefault();
            event.stopPropagation();
        } else {
            event.preventDefault();

            const btn = document.getElementById('btnRegistro');
            btn.innerHTML = '<span class="spinner-border spinner-border-sm"></span> Procesando...';
            btn.disabled = true;

            setTimeout(() => {
                document.getElementById('alertaExito').classList.remove('d-none');
                btn.innerHTML = '¡CUENTA CREADA! ✨';
                btn.style.backgroundColor = '#2ecc71';
                btn.style.color = 'white';
                btn.style.borderColor = '#155724';
            }, 1500);
        }

        form.classList.add('was-validated');
    });

    [nameInput, emailInput, passInput, confirmInput].forEach(input => {
        input.addEventListener('input', () => input.setCustomValidity(""));
    });

})();