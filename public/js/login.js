(function () {

    'use strict';

    const form = document.getElementById('formLogin');

    if (!form) return;

    const emailInput = document.getElementById('email');
    const passInput = document.getElementById('password');

    form.addEventListener('submit', function (event) {

        let isValid = true;

        const isEmptyOrSpaces = (input) =>
            input.value.trim().length === 0;

        const hasDots = (input) =>
            input.value.includes('.');

        const hasDoubleDots = (input) =>
            /\.{2,}/.test(input.value);

        if (
            isEmptyOrSpaces(emailInput) ||
            hasDoubleDots(emailInput)
        ) {

            emailInput.setCustomValidity("Inválido");
            isValid = false;

        } else {

            emailInput.setCustomValidity("");

        }

        if (
            isEmptyOrSpaces(passInput) ||
            hasDots(passInput)
        ) {

            passInput.setCustomValidity("Inválido");
            isValid = false;

        } else {

            passInput.setCustomValidity("");

        }

        if (!form.checkValidity() || !isValid) {

            event.preventDefault();
            event.stopPropagation();

        } else {

            const btn = document.getElementById('btnLogin');

            btn.innerHTML =
                '<span class="spinner-border spinner-border-sm"></span> Validando...';

            btn.disabled = true;

        }

        form.classList.add('was-validated');

    });


    [emailInput, passInput]
        .forEach(input => {

            input.addEventListener('input', () => {

                input.setCustomValidity("");

            });

        });

})();