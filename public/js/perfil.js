document.addEventListener('DOMContentLoaded', () => {

    const nombre =
        document.querySelector('[name="nombre"]');

    const telefono =
        document.querySelector('[name="telefono"]');

    const email =
        document.querySelector('[name="email"]');

    if (nombre) {

        nombre.addEventListener('input', function () {

            this.value = this.value.replace(
                /[^A-Za-zÁÉÍÓÚáéíóúÑñ\s]/g,
                ''
            );

        });

    }

    if (telefono) {

        telefono.addEventListener('input', function () {

            this.value = this.value.replace(
                /[^0-9]/g,
                ''
            );

        });

    }

    if (email) {

        email.addEventListener('input', function () {

            this.value = this.value
                .toLowerCase()
                .replace(/\s/g, '');

        });
    }

});
