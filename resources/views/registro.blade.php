@extends('layouts.app')

@section('content')
<div class="hero hero-register">
    <div class="hero-content text-center">
        <h1>¡Únete a la manada!</h1>
        <span class="slogan d-block mb-4">Crea tu cuenta para disfrutar de beneficios exclusivos en Picky Petshop.</span>
    </div>
</div>

<main class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">
            <section class="card card-register shadow-lg border-0 p-4">
                <h2 class="text-center mb-4 fw-bold title-brand">Crear Cuenta 🐾</h2>
                
                <form action="{{ url('/registro') }}" method="POST" id="formRegistro" class="needs-validation" novalidate>
                    @csrf 

                    <div class="mb-3">
                        <label for="name" class="form-label fw-bold">Nombre Completo</label>
                        <div class="input-group">
                            <span class="input-group-text icon-register-box">
                                <i class="bi bi-person-fill text-muted"></i>
                            </span>
                            <input type="text" name="name" class="form-control input-register-right" id="name" placeholder="Ej: Ana López" required pattern="^[^.]+$" oninput="this.value = this.value.replace(/\./g, '');">
                            <div class="invalid-feedback">El nombre no puede contener puntos.</div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label fw-bold">Correo Electrónico</label>
                        <div class="input-group">
                            <span class="input-group-text icon-register-box">
                                <i class="bi bi-envelope-fill text-muted"></i>
                            </span>
                            <input type="email" name="email" class="form-control input-register-right" id="email" placeholder="tu@ejemplo.com" required oninput="this.value = this.value.replace(/\.{2,}/g, '.');">
                            <div class="invalid-feedback">Ingresa un email válido (sin puntos seguidos).</div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label fw-bold">Contraseña</label>
                        <div class="input-group">
                            <span class="input-group-text icon-register-box">
                                <i class="bi bi-lock-fill text-muted"></i>
                            </span>
                            <input type="password" name="password" id="password" class="form-control input-register-right" placeholder="••••••••" required pattern="^[^.]+$" oninput="this.value = this.value.replace(/\./g, '');">
                            <div class="invalid-feedback">La contraseña no puede contener puntos.</div>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="password_confirmation" class="form-label fw-bold">Confirmar Contraseña</label>
                        <div class="input-group">
                            <span class="input-group-text icon-register-box">
                                <i class="bi bi-shield-lock-fill text-muted"></i>
                            </span>
                            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control input-register-right" placeholder="••••••••" required oninput="this.value = this.value.replace(/\./g, '');">
                            <div class="invalid-feedback" id="confirmFeedback">Las contraseñas deben coincidir y no tener puntos.</div>
                        </div>
                    </div>

                    <div class="d-grid gap-2">
                        <button type="submit" id="btnRegistro" class="btn btn-register-submit btn-lg text-dark py-3 fw-bold shadow-sm">
                            REGISTRARME 🐶
                        </button>
                    </div>

                    <div id="alertaExito" class="alert alert-register-success mt-4 d-none text-center shadow-sm" role="alert">
                        <i class="bi bi-check-circle-fill me-2"></i>
                        <strong>¡Registro exitoso!</strong> Bienvenida a Picky Petshop.
                    </div>
                </form>
            </section>
        </div>
    </div>
</main>

<script>
    (function () {
        'use strict'
        const form = document.getElementById('formRegistro');
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
            } else { nameInput.setCustomValidity(""); }

            
            if (hasDoubleDots(emailInput)) {
                emailInput.setCustomValidity("Invalido");
                isValid = false;
            } else { emailInput.setCustomValidity(""); }

           
            if (isEmptyOrSpaces(passInput) || hasDots(passInput)) {
                passInput.setCustomValidity("Invalido");
                isValid = false;
            } else { passInput.setCustomValidity(""); }

        
            if (passInput.value !== confirmInput.value || hasDots(confirmInput)) {
                confirmInput.setCustomValidity("Invalido");
                isValid = false;
            } else { confirmInput.setCustomValidity(""); }

            if (!form.checkValidity() || !isValid) {
                event.preventDefault();
                event.stopPropagation();
            } else {
                event.preventDefault();
                const btn = document.getElementById('btnRegistro');
                btn.innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Procesando...';
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
        }, false);

        [nameInput, emailInput, passInput, confirmInput].forEach(input => {
            input.addEventListener('input', () => input.setCustomValidity(""));
        });
    })();
</script>
@endsection