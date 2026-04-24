@extends('layouts.app')

@section('content')
<section class="py-5 bg-light">
    <div class="container my-5">
        <div class="bg-white p-4 p-md-5 shadow-sm" style="border-radius: 40px; border-left: 10px solid var(--brand-cyan); border-bottom: 5px solid #000; box-shadow: 15px 15px 0px rgba(0,0,0,0.05)!important;">
            
            <h1 class="display-5 fw-bold mb-5 text-center" style="color: var(--brand-purple); text-shadow: 2px 2px 0px var(--brand-cyan);">
                Aviso Legal y Reglas de la Casa Picky
            </h1>
            
            <div class="terms-list">
                
                <div class="term-item mb-5">
                    <h3 class="fw-bold h4" style="color: var(--brand-pink);">
                        <i class="bi bi-shield-check me-2"></i> 01. Términos de Uso y Servicios
                    </h3>
                    <div class="ms-4 text-muted">
                        <p>Al navegar por <strong>Picky PetShop</strong>, aceptas nuestras reglas. Este sitio ofrece productos de pet shop, accesorios y alimentos. Nos reservamos el derecho de actualizar precios o stock sin previo aviso (¡a veces los humanos se olvidan de actualizar el sistema!). Queda prohibido el uso del sitio para fines ilícitos o que dañen la experiencia de otros humanos o mascotas.</p>
                    </div>
                </div>

                <div class="term-item mb-5">
                    <h3 class="fw-bold h4" style="color: var(--brand-pink);">
                        <i class="bi bi-lock-fill me-2"></i> 02. Tu Privacidad es Sagrada
                    </h3>
                    <div class="ms-4 text-muted">
                        <p>Tus datos están más seguros que un hueso enterrado. Los usamos exclusivamente para procesar tus pedidos y enviarte novedades (solo si quieres). Nunca compartiremos tu info con terceros. Tienes derecho a rectificar o eliminar tus datos cuando quieras escribiéndonos a nuestro correo oficial.</p>
                    </div>
                </div>

                <div class="term-item mb-5">
                    <h3 class="fw-bold h4" style="color: var(--brand-pink);">
                        <i class="bi bi-truck me-2"></i> 03. Envíos Relámpago
                    </h3>
                    <div class="ms-4 text-muted">
                        <p><strong>Zonas:</strong> Repartimos en toda la ciudad de Corrientes.</p>
                        <p><strong>Tiempos:</strong> Los pedidos realizados antes de las 13:00hs salen el mismo día. El resto, en un plazo máximo de 24 a 48hs hábiles.</p>
                        <p><strong>Costo:</strong> Se calcula al finalizar la compra según tu ubicación.</p>
                    </div>
                </div>

                <div class="term-item mb-5">
                    <h3 class="fw-bold h4" style="color: var(--brand-pink);">
                        <i class="bi bi-heart-pulse-fill me-2"></i> 04. Garantía y Postventa
                    </h3>
                    <div class="ms-4 text-muted">
                        <p><strong>Garantía de Fábrica:</strong> Todos nuestros productos tienen garantía contra fallas de fabricación. Si algo sale mal, ¡te respaldamos!</p>
                        <p><strong>Soporte:</strong> ¿Dudas después de la compra? Nuestro equipo está disponible vía WhatsApp para ayudarte a configurar ese comedero automático o elegir el talle correcto.</p>
                    </div>
                </div>

                <div class="term-item mb-5">
                    <h3 class="fw-bold h4" style="color: var(--brand-pink);">
                        <i class="bi bi-arrow-left-right me-2"></i> 05. Cambios y Devoluciones
                    </h3>
                    <div class="ms-4 text-muted">
                        <p>¿No le quedó bien el arnés? Tienes 48hs para solicitar el cambio. 
                           <br><strong>Condición Picky:</strong> El producto debe estar limpio, con etiqueta y <em>sin marcas de mordidas o pelos</em> por higiene.</p>
                    </div>
                </div>

                <div class="term-item mb-4">
                    <h3 class="fw-bold h4" style="color: var(--brand-pink);">
                        <i class="bi bi-award-fill me-2"></i> 06. Calidad Aprobada
                    </h3>
                    <div class="ms-4 text-muted">
                        <p>Solo vendemos lo que nosotros mismos le daríamos a nuestros mejores amigos de cuatro patas. Todos nuestros productos cumplen con las normativas vigentes de seguridad para mascotas.</p>
                    </div>
                </div>

            </div>

            <hr class="my-5 opacity-10">
            
            <p class="text-center small text-muted italic">
                Última actualización: Abril 2026. Picky PetShop - Amor por los animales, seriedad con los humanos.
            </p>

        </div>
    </div>
</section>
@endsection
