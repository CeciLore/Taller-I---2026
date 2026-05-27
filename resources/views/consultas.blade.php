@extends('layouts.app')

@section('content')

<!-- HERO -->
<div class="hero">
    <div class="hero-content text-center">
        <h1>Consultas</h1>
        <span class="slogan d-block mb-4">
            Estamos aquí para ayudarte a ti y a tu mascota.
        </span>
    </div>
</div>

<!-- CONSULTAS -->
<main class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <section class="card card-consultas shadow-lg border-0 p-4">
                <h2 class="text-center mb-4 fw-bold title-purple">
                    Envíanos un mensaje 🐾
                </h2>
                <form action="{{ url('/consultas') }}"
                      method="POST"
                      id="formConsultas"
                      class="needs-validation"
                      novalidate>
                    @csrf
                    <!-- NOMBRE -->
                    <div class="mb-3">
                        <label for="nombre"
                               class="form-label fw-bold">
                            Nombre
                        </label>
                        <input type="text"
                               class="form-control form-input-custom"
                               id="nombre"
                               name="nombre"
                               placeholder="Ej: Juan Pérez"
                               required>
                        <div class="invalid-feedback">
                            El nombre debe tener al menos 5 caracteres.
                        </div>
                    </div>
                    <!-- EMAIL -->
                    <div class="mb-3">
                        <label for="email"
                               class="form-label fw-bold">
                            Correo Electrónico
                        </label>
                        <input type="email"
                               class="form-control form-input-custom"
                               id="email"
                               name="email"
                               placeholder="nombre@ejemplo.com"
                               required>
                        <div class="invalid-feedback">
                            Dinos un email válido.
                        </div>
                    </div>
                    <!-- ASUNTO -->
                    <div class="mb-3">
                        <label for="asunto"
                               class="form-label fw-bold">
                            Asunto
                        </label>
                        <select class="form-select form-input-custom"
                                id="asunto"
                                name="asunto"
                                required>
                            <option value="" selected disabled>
                                Selecciona una opción
                            </option>
                            <option value="pedidos">
                                Sobre mi pedido
                            </option>
                            <option value="productos">
                                Duda sobre un producto
                            </option>
                            <option value="otros">
                                Otros motivos
                            </option>
                        </select>
                        <div class="invalid-feedback">
                            Por favor, selecciona un motivo.
                        </div>
                    </div>
                    <!-- MENSAJE -->
                    <div class="mb-3">
                        <label for="mensaje"
                               class="form-label fw-bold">
                            ¿En qué podemos ayudarte?
                        </label>
                        <textarea class="form-control form-input-custom"
                                  id="mensaje"
                                  name="mensaje"
                                  rows="5"
                                  placeholder="Escribe tu consulta aquí..."
                                  required></textarea>
                        <div class="invalid-feedback">
                            El mensaje no puede estar vacío.
                        </div>
                    </div>
                    <!-- BOTÓN -->
                    <div class="d-grid">
                        <button type="submit"
                                id="btnConsulta"
                                class="btn btn-submit-consultas btn-lg text-dark py-3 fw-bold shadow">
                            ENVIAR
                        </button>
                    </div>
                    <!-- ALERTA -->
                    <div id="alertaExito"
                         class="alert alert-success mt-3 d-none text-center fw-bold alert-custom"
                         role="alert">
                        ¡Consulta enviada!
                        Nos pondremos en contacto muy pronto.
                    </div>
                </form>
            </section>
        </div>
    </div>
</main>
@endsection