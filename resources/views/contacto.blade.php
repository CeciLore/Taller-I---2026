@extends('layouts.app')

@section('content')

<section id="contacto" style="background: var(--brand-purple); padding: 120px 5% 80px 5%; position: relative; z-index: 10;">
    <div class="container">
        <div class="row align-items-start mt-lg-5"> 
            
            <div class="col-lg-5 text-white mb-5 mb-lg-0">
                <h1 class="display-3 mb-4 fw-bold" style="text-shadow: 4px 4px 0px var(--brand-pink); line-height: 1;">CONTACTO</h1>
                <p class="lead fw-bold mb-4" style="font-size: 1.5rem;">Información oficial de Picky Petshop.</p>
                
                <div class="mb-5 bg-dark bg-opacity-25 p-4" style="border-radius: 15px; border-left: 5px solid var(--accent-yellow);">
                    <p class="mb-2"><i class="bi bi-geo-alt-fill me-2 text-accent-yellow"></i> <strong>Domicilio:</strong> Corrientes, Argentina</p>
                    <p class="mb-2"><i class="bi bi-whatsapp me-2 text-accent-yellow"></i> <strong>WhatsApp:</strong> +54 123 456 789</p>
                    <p class="mb-2"><i class="bi bi-envelope-heart-fill me-2 text-accent-yellow"></i> <strong>Email:</strong> pickypetshop@gmail.com</p>
                </div>

                <div class="p-4" style="background: rgba(255,255,255,0.1); border-radius: 20px; border: 2px dashed var(--brand-pink);">
                    <h5 class="fw-bold mb-3" style="color: var(--accent-yellow);">INFORMACIÓN LEGAL</h5>
                    <ul class="list-unstyled small mb-0">
                        <li class="mb-2"><strong>Titular:</strong> Laura Rodríguez</li>
                        <li class="mb-2"><strong>Razón Social:</strong> Picky PetShop S.R.L.</li>
                        <li class="mb-2"><strong>CUIT:</strong> 30-71234567-0</li>
                    </ul>
                </div>
            </div>
            
            <div class="col-lg-7">
                <form action="{{ url('/contacto') }}" method="POST" id="formContacto" class="contact-form p-4 p-md-5 bg-white shadow-lg needs-validation" novalidate style="border-radius: 30px; border: 4px solid #000; box-shadow: 15px 15px 0px #000 !important;">
                    @csrf 
                    <h3 class="fw-bold text-dark mb-4 text-center">CUESTIONARIO</h3>
                    
                    <div class="mb-3">
                        <label class="fw-bold mb-2 text-dark">NOMBRE COMPLETO</label>
                        <input type="text" name="nombre" class="form-control border-2 shadow-none" placeholder="Ingresa tu nombre y apellido" required style="border-color: #000; height: 50px;">
                        <div class="invalid-feedback fw-bold">Por favor, dinos tu nombre.</div>
                    </div>

                    <div class="mb-3">
                        <label class="fw-bold mb-2 text-dark">EMAIL DE CONTACTO</label>
                        <input type="email" name="email" class="form-control border-2 shadow-none" placeholder="tu-email@correo.com" required style="border-color: #000; height: 50px;">
                        <div class="invalid-feedback fw-bold">Necesitamos un email válido para responderte.</div>
                    </div>

                    <div class="mb-3">
                        <label class="fw-bold mb-2 text-dark">TELÉFONO / CELULAR</label>
                        <input type="text" 
                            name="telefono" 
                            class="form-control border-2 shadow-none" 
                            placeholder="Ej: 3794000000" 
                            required 
                            style="border-color: #000; height: 50px;"
                            pattern="[0-9]+" 
                            oninput="this.value = this.value.replace(/[^0-9]/g, '');">
                        <div class="invalid-feedback fw-bold">El teléfono debe contener solo números.</div>
                    </div>

                    <div class="mb-3">
                        <label class="fw-bold mb-2 text-dark">ÁREA DE COMUNICACIÓN</label>
                        <select name="area" class="form-select border-2 shadow-none" style="border-color: #000; height: 50px;" required>
                            <option value="" selected disabled>¿Con quién deseas hablar?</option>
                            <option value="ventas">Atención al Cliente / Ventas</option>
                            <option value="legal">Consultas Administrativas</option>
                            <option value="soporte">Soporte y Reclamos</option>
                        </select>
                        <div class="invalid-feedback fw-bold">Selecciona un área de contacto.</div>
                    </div>

                    <div class="mb-3">
                        <label class="fw-bold mb-2 text-dark">MENSAJE PARA LA EMPRESA</label>
                        <textarea name="mensaje" id="mensaje" class="form-control border-2 shadow-none" rows="4" placeholder="Escribe aquí tu mensaje detallado..." required style="border-color: #000;"></textarea>
                        <div class="invalid-feedback fw-bold">El mensaje no puede estar vacío.</div>
                    </div>
                    
                    <button type="submit" id="btnEnviar" class="btn btn-warning btn-lg w-100 py-3 mt-3 fw-bold shadow-none" style="border: 4px solid #000; transition: 0.3s; font-size: 1.2rem;">
                        ENVIAR
                    </button>

                    <div id="mensajeExito" class="mt-4 text-center d-none" style="background: #2ecc71; color: white; padding: 20px; border-radius: 20px; border: 3px solid #000; box-shadow: 5px 5px 0px #000;">
                        <h4 class="mb-1 fw-bold">¡COMUNICACIÓN ENVIADA!</h4>
                        <p class="mb-0">Un miembro de nuestra empresa se contactará a la brevedad.</p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<script>
    (function () {
        'use strict'
        var form = document.getElementById('formContacto')
        var mensajeArea = document.getElementById('mensaje')

        form.addEventListener('submit', function (event) {
           
            if (mensajeArea.value.trim().length === 0) {
                mensajeArea.setCustomValidity('Invalid');
            } else {
                mensajeArea.setCustomValidity('');
            }

            if (!form.checkValidity()) {
                event.preventDefault()
                event.stopPropagation()
            } else {
                
                event.preventDefault()
                const btn = document.getElementById('btnEnviar');
                const mensajeExito = document.getElementById('mensajeExito');

                btn.innerHTML = 'ENVIANDO...';
                btn.disabled = true;

                setTimeout(() => {
                    btn.innerHTML = 'MENSAJE RECIBIDO ✅';
                    btn.style.background = '#2ecc71'; 
                    btn.style.color = 'white';
                    mensajeExito.classList.remove('d-none');
                    form.reset();
                    form.classList.remove('was-validated'); 
                }, 1000);
            }

            form.classList.add('was-validated')
        }, false)

        
        mensajeArea.addEventListener('input', function() {
            if (this.value.trim().length > 0) {
                this.setCustomValidity('');
            }
        });
    })()
</script>

@endsection