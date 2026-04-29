@extends('layouts.app')

@section('content')
<div class="hero hero-consultas">
    <div class="hero-content text-center">
        <h1>Consultas</h1>
        <span class="slogan d-block mb-4">Estamos aquí para ayudarte a ti y a tu mascota.</span>
    </div>
</div>

<main class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <section class="card card-consultas shadow-lg border-0 p-4">
                <h2 class="text-center mb-4 fw-bold title-purple">Envíanos un mensaje 🐾</h2>
                
                <form action="{{ url('/consultas') }}" method="POST" id="formConsultas" class="needs-validation" novalidate>
                    @csrf 
                    
                    <div class="mb-3">
                        <label for="nombre" class="form-label fw-bold">Nombre</label>
                        <input type="text" 
                            class="form-control form-input-custom" 
                            id="nombre" 
                            name="nombre" 
                            placeholder="Ej: JuanPerez" 
                            required
                            oninput="this.value = this.value.replace(/[ .\s]/g, '');">
                        <div class="invalid-feedback">No se permiten espacios ni puntos en este campo.</div>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label fw-bold">Correo Electrónico</label>
                        <input type="email" class="form-control form-input-custom" id="email" name="email" placeholder="nombre@ejemplo.com" required>
                        <div class="invalid-feedback">Dinos un email válido para poder responderte.</div>
                    </div>

                    <div class="mb-3">
                        <label for="asunto" class="form-label fw-bold">Asunto</label>
                        <select class="form-select form-input-custom" id="asunto" name="asunto" required>
                            <option value="" selected disabled>Selecciona una opción</option>
                            <option value="pedidos">Sobre mi pedido</option>
                            <option value="productos">Duda sobre un producto</option>
                            <option value="otros">Otros motivos</option>
                        </select>
                        <div class="invalid-feedback">Por favor, selecciona un motivo.</div>
                    </div>

                    <div class="mb-3">
                        <label for="mensaje" class="form-label fw-bold">¿En qué podemos ayudarte?</label>
                        <textarea 
                            class="form-control form-input-custom" 
                            id="mensaje" 
                            name="mensaje" 
                            rows="5" 
                            placeholder="Escribe tu consulta aquí..." 
                            required
                            oninput="validarMensaje(this)"
                        ></textarea>
                        <div class="invalid-feedback">No dejes el mensaje vacío ni uses solo espacios, ¡queremos ayudarte!</div>
                    </div>

                    <div class="d-grid">
                        <button type="submit" id="btnConsulta" class="btn btn-submit-consultas btn-lg text-dark py-3 fw-bold shadow">
                            ENVIAR
                        </button>
                    </div>

                    <div id="alertaExito" class="alert alert-success mt-3 d-none text-center fw-bold alert-custom" role="alert">
                        ¡Consulta enviada! Nos pondremos en contacto muy pronto.
                    </div>
                </form>
            </section>
        </div>
    </div>
</main>

<script>
    
    function validarMensaje(input) {
        if (input.value.trim().length === 0) {
            input.setCustomValidity("Invalid");
        } else {
            input.setCustomValidity("");
        }
    }

    (function () {
        'use strict'
        const form = document.getElementById('formConsultas');
        const mensajeInput = document.getElementById('mensaje');

        form.addEventListener('submit', function (event) {
            
            validarMensaje(mensajeInput);

            if (!form.checkValidity()) {
                event.preventDefault();
                event.stopPropagation();
            } else {
                event.preventDefault();
                const btn = document.getElementById('btnConsulta');
                const alerta = document.getElementById('alertaExito');

                btn.innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Enviando...';
                btn.disabled = true;

                setTimeout(() => {
                    alerta.classList.remove('d-none');
                    btn.innerHTML = '¡MENSAJE RECIBIDO! ✅';
                    btn.style.backgroundColor = '#2ecc71';
                    btn.style.color = 'white';
                    form.reset();
                    form.classList.remove('was-validated');
                }, 1500);
            }
            form.classList.add('was-validated');
        }, false);
    })();
</script>
@endsection