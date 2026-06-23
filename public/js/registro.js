(function () {

    'use strict';

    const form = document.getElementById('formRegistro');

    if (!form) return;

    const nameInput = document.getElementById('name');
    const emailInput = document.getElementById('email');
    const passInput = document.getElementById('password');
    const confirmInput = document.getElementById('password_confirmation');

    form.addEventListener('submit', function (event) {

        let isValid = true;

        const isEmptyOrSpaces = (input) =>
            input.value.trim().length === 0;

        const hasDots = (input) =>
            input.value.includes('.');

        const hasDoubleDots = (input) =>
            /\.{2,}/.test(input.value);

        if (isEmptyOrSpaces(nameInput) || hasDots(nameInput)) {

            nameInput.setCustomValidity("Inválido");
            isValid = false;

        } else {

            nameInput.setCustomValidity("");

        }

        if (hasDoubleDots(emailInput)) {

            emailInput.setCustomValidity("Inválido");
            isValid = false;

        } else {

            emailInput.setCustomValidity("");

        }

        if (isEmptyOrSpaces(passInput) || hasDots(passInput)) {

            passInput.setCustomValidity("Inválido");
            isValid = false;

        } else {

            passInput.setCustomValidity("");

        }

        if (
            passInput.value !== confirmInput.value ||
            hasDots(confirmInput)
        ) {

            confirmInput.setCustomValidity("Inválido");
            isValid = false;

        } else {

            confirmInput.setCustomValidity("");

        }

        if (!form.checkValidity() || !isValid) {

            event.preventDefault();
            event.stopPropagation();

        } else {

            const btn = document.getElementById('btnRegistro');

            btn.innerHTML =
                '<span class="spinner-border spinner-border-sm"></span> Procesando...';

            btn.disabled = true;

        }

        form.classList.add('was-validated');

    });

    [nameInput, emailInput, passInput, confirmInput]
        .forEach(input => {

            input.addEventListener('input', () => {

                input.setCustomValidity("");

            });

        });

})();