@extends('layouts.app')

@section('content')

<section id="contacto" class="contact-section">

    <div class="container mt-5 pt-5">

        <div class="row align-items-start mt-lg-5">

            <!-- INFO -->
            <div class="col-lg-5 text-white mb-5 mb-lg-0">

                <h1 class="contact-title display-3 mb-4 fw-bold">
                    CONTACTO
                </h1>

                <p class="contact-subtitle lead fw-bold mb-4">
                    Información oficial de Picky Petshop.
                </p>

                <!-- DATOS -->
                <div class="contact-info-box mb-5">

                    <p class="mb-2">
                        <i class="bi bi-geo-alt-fill me-2 text-accent-yellow"></i>
                        <strong>Domicilio:</strong>
                        Corrientes, Argentina
                    </p>

                    <p class="mb-2">
                        <i class="bi bi-whatsapp me-2 text-accent-yellow"></i>
                        <strong>WhatsApp:</strong>
                        +54 123 456 789
                    </p>

                    <p class="mb-2">
                        <i class="bi bi-envelope-heart-fill me-2 text-accent-yellow"></i>
                        <strong>Email:</strong>
                        pickypetshop@gmail.com
                    </p>

                </div>

                <!-- INFO LEGAL -->
                <div class="legal-info-box">

                    <h5 class="fw-bold mb-3 legal-title">
                        INFORMACIÓN LEGAL
                    </h5>

                    <ul class="list-unstyled small mb-0">

                        <li class="mb-2">
                            <strong>Titular:</strong>
                            Laura Rodríguez
                        </li>

                        <li class="mb-2">
                            <strong>Razón Social:</strong>
                            Picky PetShop S.R.L.
                        </li>

                        <li class="mb-2">
                            <strong>CUIT:</strong>
                            30-71234567-0
                        </li>

                    </ul>

                </div>

            </div>

            <!-- FORM -->
            <div class="col-lg-7">

                <form action="{{ url('/contacto') }}"
                      method="POST"
                      id="formContacto"
                      class="contact-form p-4 p-md-5 bg-white shadow-lg needs-validation"
                      novalidate>

                    @csrf

                    <h3 class="fw-bold text-dark mb-4 text-center">
                        CUESTIONARIO
                    </h3>

                    <!-- NOMBRE -->
                    <div class="mb-3">

                        <label class="fw-bold mb-2 text-dark">
                            NOMBRE COMPLETO
                        </label>

                        <input type="text"
                               name="nombre"
                               class="form-control contact-input border-2 shadow-none"
                               placeholder="Ingresa tu nombre y apellido"
                               required
                               minlength="5"
                               pattern="^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+$"
                               oninput="this.value = this.value.replace(/[^A-Za-zÁÉÍÓÚáéíóúÑñ\s]/g, '');">

                        <div class="invalid-feedback fw-bold">
                            El nombre debe tener al menos 5 caracteres.
                        </div>

                    </div>

                    <!-- EMAIL -->
                    <div class="mb-3">

                        <label class="fw-bold mb-2 text-dark">
                            EMAIL DE CONTACTO
                        </label>

                        <input type="email"
                               name="email"
                               class="form-control contact-input border-2 shadow-none"
                               placeholder="tu-email@correo.com"
                               required>

                        <div class="invalid-feedback fw-bold">
                            Necesitamos un email válido.
                        </div>

                    </div>

                    <!-- TELÉFONO -->
                    <div class="mb-3">

                        <label class="fw-bold mb-2 text-dark">
                            TELÉFONO / CELULAR
                        </label>

                        <input type="text"
                               name="telefono"
                               class="form-control contact-input border-2 shadow-none"
                               placeholder="Ej: 3794000000"
                               required>

                        <div class="invalid-feedback fw-bold">
                            El teléfono debe contener solo números.
                        </div>

                    </div>

                    <!-- ÁREA -->
                    <div class="mb-3">

                        <label class="fw-bold mb-2 text-dark">
                            ÁREA DE COMUNICACIÓN
                        </label>

                        <select name="area"
                                class="form-select contact-input border-2 shadow-none"
                                required>

                            <option value="" selected disabled>
                                ¿Con quién deseas hablar?
                            </option>

                            <option value="ventas">
                                Atención al Cliente / Ventas
                            </option>

                            <option value="legal">
                                Consultas Administrativas
                            </option>

                            <option value="soporte">
                                Soporte y Reclamos
                            </option>

                        </select>

                        <div class="invalid-feedback fw-bold">
                            Selecciona un área.
                        </div>

                    </div>

                    <!-- MENSAJE -->
                    <div class="mb-3">

                        <label class="fw-bold mb-2 text-dark">
                            MENSAJE PARA LA EMPRESA
                        </label>

                        <textarea name="mensaje"
                                  class="form-control contact-textarea border-2 shadow-none"
                                  rows="4"
                                  placeholder="Escribe aquí tu mensaje..."
                                  required></textarea>

                        <div class="invalid-feedback fw-bold">
                            El mensaje no puede estar vacío.
                        </div>

                    </div>

                    <!-- BOTÓN -->
                    <button type="submit"
                            id="btnEnviar"
                            class="btn btn-warning btn-lg w-100 py-3 mt-3 fw-bold shadow-none contact-btn">

                        ENVIAR

                    </button>

                    <!-- ALERTA -->
                    <div id="mensajeExito"
                         class="success-message mt-4 text-center d-none">

                        <h4 class="mb-1 fw-bold">
                            ¡COMUNICACIÓN ENVIADA!
                        </h4>

                        <p class="mb-0">
                            Un miembro de nuestra empresa se contactará.
                        </p>

                    </div>

                </form>

            </div>

        </div>

    </div>

    <!-- MAPA -->
    <div class="container mt-5">

        <h3 class="text-white mb-3 fw-bold">
            Nuestra ubicación
        </h3>

        <div class="map-container">

            <iframe
                src="https://www.google.com/maps?q=Corrientes+Capital,+Argentina&output=embed"
                width="100%"
                height="350"
                allowfullscreen
                loading="lazy">
            </iframe>

        </div>

    </div>

</section>

@endsection