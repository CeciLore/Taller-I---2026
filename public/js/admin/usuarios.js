document.addEventListener('DOMContentLoaded', () => {

    const formulario = document.getElementById('filtroUsuarios');
    const buscar = document.getElementById('buscar');
    const rol = document.getElementById('rol');

    if (!formulario || !buscar || !rol) {
        return;
    }

    let timeout;

    buscar.addEventListener('input', () => {

        clearTimeout(timeout);

        timeout = setTimeout(() => {

            formulario.submit();

        }, 700);

    });

    rol.addEventListener('change', () => {

        formulario.submit();

    });

});