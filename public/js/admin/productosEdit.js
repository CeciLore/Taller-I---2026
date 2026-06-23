document.addEventListener('DOMContentLoaded', () => {

    const input = document.querySelector('input[name="url_imagen"]');

    if (!input) return;

    input.addEventListener('change', function (e) {

        const file = e.target.files[0];
        if (!file) return;

        const preview = document.getElementById('preview');
        const text = document.getElementById('preview-text');

        preview.src = URL.createObjectURL(file);
        preview.classList.remove('d-none');

        if (text) text.classList.add('d-none');
    });

});