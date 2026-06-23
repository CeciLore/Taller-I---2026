document.addEventListener('DOMContentLoaded', () => {

    const csrf = document
        .querySelector('meta[name="csrf-token"]')
        .getAttribute('content');

    document
        .querySelectorAll('.form-agregar-carrito')
        .forEach(form => {

            form.addEventListener('submit', async function (e) {

                e.preventDefault();

                const boton = this.querySelector(
                    '.btn-agregar-carrito'
                );

                try {

                    const response = await fetch(
                        this.action,
                        {
                            method: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': csrf,
                                'Accept': 'application/json'
                            }
                        }
                    );

                    const data = await response.json();

                    if (data.success) {

                        const contador = document.getElementById(
                            'contador-carrito'
                        );

                        if (contador) {
                            contador.textContent =
                                data.cantidadItems;
                        }

                        const textoOriginal =
                            boton.textContent;

                        boton.textContent =
                            '✓ Agregado';

                        boton.disabled = true;

                        const modalElement =
                            this.closest('.modal');

                        if (modalElement) {

                            const modal =
                                bootstrap.Modal.getInstance(
                                    modalElement
                                );

                            if (modal) {
                                modal.hide();
                            }
                        }

                        setTimeout(() => {

                            boton.textContent =
                                textoOriginal;

                            boton.disabled = false;

                        }, 1500);
                    }

                } catch (error) {

                    console.error(
                        'Error al agregar producto:',
                        error
                    );

                }

            });

        });

});