const botonesAgregar = document.querySelectorAll('.btn-agregar-carrito');

botonesAgregar.forEach(boton => {
    boton.addEventListener('click', function() {
        const btn = this;
        const textoOriginal = btn.innerHTML;

        btn.innerHTML = '¡Agregado! 🛒';
        btn.classList.remove('btn-picky-yellow');
        btn.classList.add('btn-success');
        btn.style.color = "white";
        btn.disabled = true;

        setTimeout(() => {
            btn.innerHTML = textoOriginal;
            btn.classList.remove('btn-success');
            btn.classList.add('btn-picky-yellow');
            btn.style.color = "black";
            btn.disabled = false;
        }, 1000);
    });
});