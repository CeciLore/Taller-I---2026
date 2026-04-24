@extends('layouts.app')

@section('content')

<section id="contacto" style="background: var(--brand-purple); padding: 120px 5% 80px 5%; position: relative; z-index: 10;">
    <div class="container">
        <div class="row align-items-start mt-lg-5"> 
            
            <div class="col-lg-5 text-white mb-5 mb-lg-0">
                <h1 class="display-3 mb-4 fw-bold" style="text-shadow: 4px 4px 0px var(--brand-pink); line-height: 1;">¡HOLA!</h1>
                <p class="lead fw-bold mb-4" style="font-size: 1.5rem;">¿Tienes dudas o quieres hacer un pedido especial? ¡Escríbenos!</p>
                
                <div class="mb-5 bg-dark bg-opacity-25 p-4" style="border-radius: 15px; border-left: 5px solid var(--accent-yellow);">
                    <p class="mb-2"><i class="bi bi-geo-alt-fill me-2 text-accent-yellow"></i> Corrientes, Argentina</p>
                    <p class="mb-2"><i class="bi bi-whatsapp me-2 text-accent-yellow"></i> +54 123 456 789</p>
                    <p class="mb-2"><i class="bi bi-envelope-heart-fill me-2 text-accent-yellow"></i> pickypetshop@gmail.com</p>
                </div>

                <div class="p-4" style="background: rgba(255,255,255,0.1); border-radius: 20px; border: 2px dashed var(--brand-pink);">
                    <h5 class="fw-bold mb-3" style="color: var(--accent-yellow);">DATOS DE LA EMPRESA</h5>
                    <ul class="list-unstyled small mb-0">
                        <li class="mb-2"><strong>Titular:</strong> Laura Rodríguez</li>
                        <li class="mb-2"><strong>Razón Social:</strong> Picky PetShop S.R.L.</li>
                        <li class="mb-2"><strong>Domicilio Legal:</strong> La Rioja 1345, CP 3400, Corrientes</li>
                        <li class="mb-2"><strong>CUIT:</strong> 30-XXXXXXXX-0</li>
                        <li class="mb-0"><strong>Horario de atención:</strong> Lun a Vie 09:00 a 18:00hs</li>
                    </ul>
                </div>
            </div>
            
            <div class="col-lg-7">
                <form id="formContacto" class="contact-form p-4 p-md-5 bg-white shadow-lg" style="border-radius: 30px; border: 4px solid #000; box-shadow: 15px 15px 0px #000 !important;">
                    <div class="mb-3">
                        <label class="fw-bold mb-2 text-dark">NOMBRE Y APELLIDO</label>
                        <input type="text" class="form-control border-2 shadow-none" placeholder="Ej: Juan Perez" required style="border-color: #000; height: 50px;">
                    </div>
                    <div class="mb-3">
                        <label class="fw-bold mb-2 text-dark">EMAIL DE CONTACTO</label>
                        <input type="email" class="form-control border-2 shadow-none" placeholder="juan@ejemplo.com" required style="border-color: #000; height: 50px;">
                    </div>
                    <div class="mb-3">
                        <label class="fw-bold mb-2 text-dark">MOTIVO DE TU CONSULTA</label>
                        <select class="form-select border-2 shadow-none" style="border-color: #000; height: 50px;" required>
                            <option value="" selected disabled>Selecciona una opción...</option>
                            <option value="pedido">Pedido Especial</option>
                            <option value="duda">Dudas sobre productos</option>
                            <option value="reclamo">Reclamos</option>
                            <option value="otro">Otros motivos</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="fw-bold mb-2 text-dark">MENSAJE / CONSULTA</label>
                        <textarea class="form-control border-2 shadow-none" rows="4" placeholder="Cuéntanos más..." required style="border-color: #000;"></textarea>
                    </div>
                    
                    <button type="submit" id="btnEnviar" class="btn btn-warning btn-lg w-100 py-3 mt-3 fw-bold shadow-none" style="border: 4px solid #000; transition: 0.3s; font-size: 1.2rem;">
                        ENVIAR MENSAJE
                    </button>

                    <div id="mensajeExito" class="mt-4 text-center d-none" style="background: #2ecc71; color: white; padding: 20px; border-radius: 20px; border: 3px solid #000; box-shadow: 5px 5px 0px #000;">
                        <div class="perrito-animado" style="font-size: 2rem;">🐕</div>
                        <h4 class="mb-1 fw-bold">¡MENSAJE ENVIADO!</h4>
                        <p class="mb-0">Pronto recibirás una respuesta. Gracias.</p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<script>
    document.getElementById('formContacto').addEventListener('submit', function(e) {
        e.preventDefault();

        const btn = document.getElementById('btnEnviar');
        const mensaje = document.getElementById('mensajeExito');

        // Efecto visual de envío
        btn.innerHTML = '¡ENVIADO CORRECTAMENTE! ✅';
        btn.style.background = '#2ecc71'; 
        btn.style.color = 'white';
        btn.disabled = true;

        mensaje.classList.remove('d-none');
        this.reset();

        setTimeout(() => {
            mensaje.classList.add('d-none');
            btn.innerHTML = 'ENVIAR MENSAJE';
            btn.style.background = ''; 
            btn.style.color = '';
            btn.disabled = false;
        }, 5000);
    });
</script>

@endsection