<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
   <!-- 1. Bootstrap Primero -->
<link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
<!-- 2. Iconos -->
<link rel="stylesheet" href="{{ asset('vendor/bootstrap-icons/font/bootstrap-icons.css') }}">
<!-- 3. TU CSS AL FINAL (Para que mande sobre Bootstrap) -->
<link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/myStyle.css') }}">

</head>

<body>

    <!-- NAVBAR MEJORADA -->
    <header class="navbar navbar-expand-lg sticky-top" style="padding: 1.2rem 5%;">

        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">
                <img src="{{ asset('img/Picky.jpg') }}" alt="Logo" class="logo-img" style="height: 50px;">
                <span class="section-title ms-2" style="color: var(--brand-purple); font-size: 1.5rem;">Picky</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
           <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                     <li class="nav-item">
                          <!-- Usamos una validación doble para asegurar el Inicio -->
                             <a class="nav-link {{ (Request::is('/') || Request::is('principal')) ? 'active' : '' }}" href="{{ url('/') }}">Inicio</a>
                    </li>
                    <li class="nav-item">
                            <a class="nav-link {{ Request::is('quienessomos') ? 'active' : '' }}" href="{{ url('/quienessomos') }}">Quiénes Somos</a>
                     </li>
                   <li class="nav-item">
                           <a class="nav-link {{ Request::is('comercializacion') ? 'active' : '' }}" href="{{ url('/comercializacion') }}">Comercialización</a>
                   </li>
                   <li class="nav-item">
                         <a class="nav-link {{ Request::is('contacto') ? 'active' : '' }}" href="{{ url('/contacto') }}">Contacto</a>
                    </li>
                  <li class="nav-item">
                         <a class="nav-link {{ Request::is('terminos') ? 'active' : '' }}" href="{{ url('/terminos') }}">Términos</a>
                    </li>
                </ul>
            </div>

        </div>
    </header>

    <!-- CONTENIDO DINÁMICO -->
    <main>
        @yield('content')
    </main>

    <!-- FOOTER ÚNICO -->
    <footer class="custom-footer">
        <div class="container text-center">
            <h2 class="footer-title section-title">Picky Petshop</h2>
            <p class="slogan-footer">Elegido por humanos, aprobado por mascotas.</p>
            
            <div class="socials my-4 d-flex align-items-center gap-2">
    <a href="#" class="social-link">
        <img src="{{ asset('img/instaicon.jpg') }}" alt="Instagram" style="width: 50px; height: 50px; object-fit: contain;">
    </a>
    <a href="#" class="social-link">
        <img src="{{ asset('img/tiktokicon.jpg') }}" alt="TikTok" style="width: 50px; height: 50px; object-fit: contain;">
    </a>
    <a href="#" class="social-link">
        <img src="{{ asset('img/faceicon.jpg') }}" alt="Facebook" style="width: 50px; height: 50px; object-fit: contain;">
    </a>
    <a href="#" class="social-link">
        <img src="{{ asset('img/wpicon.jpg') }}" alt="WhatsApp" style="width: 50px; height: 50px; object-fit: contain;">
    </a>
</div>

            <hr class="custom-hr mx-auto">
            <p class="small mb-0 opacity-75">
                &copy; 2026 <strong>Picky PetShop</strong>. Desarrollado para el bienestar animal.
            </p>
        </div>
    </footer>

    <!-- Bootstrap JS Local -->
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
