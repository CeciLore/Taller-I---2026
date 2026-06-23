document.addEventListener('DOMContentLoaded', () => {

    const csrf = document
        .querySelector('meta[name="csrf-token"]')
        .getAttribute('content');

    function formatoPesos(numero) {
        return '$' + Number(numero).toLocaleString('es-AR');
    }

    document.querySelectorAll('.btn-sumar').forEach(btn => {

        btn.addEventListener('click', async function () {

            const itemId = this.dataset.id;

            try {

                const response = await fetch(`/carrito/sumar/${itemId}`, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': csrf,
                        'Accept': 'application/json'
                    }
                });

                const data = await response.json();

                if (data.success) {

                    document.getElementById(
                        `cantidad-${itemId}`
                    ).textContent = data.cantidad;

                    document.getElementById(
                        `subtotal-${itemId}`
                    ).textContent = formatoPesos(data.subtotal);

                    document.getElementById(
                        'resumen-subtotal'
                    ).textContent = formatoPesos(data.total);

                    document.getElementById(
                        'resumen-total'
                    ).textContent = formatoPesos(data.total);

                    const btnSumar = document.querySelector(
                        `.btn-sumar[data-id="${itemId}"]`
                    );

                    const btnRestar = document.querySelector(
                        `.btn-restar[data-id="${itemId}"]`
                    );

                    btnSumar.disabled = data.cantidad >= data.stock;

                    btnRestar.disabled = data.cantidad <= 1;
                }

            } catch (error) {

                console.error(error);

            }

        });

    });

    document.querySelectorAll('.btn-restar').forEach(btn => {

        btn.addEventListener('click', async function () {

            const itemId = this.dataset.id;

            try {

                const response = await fetch(`/carrito/restar/${itemId}`, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': csrf,
                        'Accept': 'application/json'
                    }
                });

                const data = await response.json();

                if (data.success) {

                    document.getElementById(
                        `cantidad-${itemId}`
                    ).textContent = data.cantidad;

                    document.getElementById(
                        `subtotal-${itemId}`
                    ).textContent = formatoPesos(data.subtotal);

                    document.getElementById(
                        'resumen-subtotal'
                    ).textContent = formatoPesos(data.total);

                    document.getElementById(
                        'resumen-total'
                    ).textContent = formatoPesos(data.total);

                    const btnSumar = document.querySelector(
                        `.btn-sumar[data-id="${itemId}"]`
                    );

                    const btnRestar = document.querySelector(
                        `.btn-restar[data-id="${itemId}"]`
                    );

                    btnSumar.disabled = data.cantidad >= data.stock;

                    btnRestar.disabled = data.cantidad <= 1;
                }

            } catch (error) {

                console.error(error);

            }

        });

    });

    document.querySelectorAll('.btn-restar').forEach(btn => {

        const itemId = btn.dataset.id;

        const cantidad = parseInt(
            document.getElementById(`cantidad-${itemId}`).textContent
        );

        btn.disabled = cantidad <= 1;
    });

});