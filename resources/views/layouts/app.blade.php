<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
<link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">


<link rel="stylesheet" href="{{ asset('vendor/bootstrap-icons/font/bootstrap-icons.css') }}">

<link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/myStyle.css') }}?v=2">

</head>

<body>

   
    <header class="navbar navbar-expand-lg sticky-top bg-white shadow-sm" style="padding: 0.4rem 1%;">
    <div class="container-fluid"> 
        <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">
            <img src="{{ asset('img/Picky.jpg') }}" alt="Logo" class="logo-img" style="height: 35px;">
            <span class="section-title ms-2" style="color: var(--brand-purple); font-size: 1.15rem; font-weight: bold;">Picky</span>
        </a>
        
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto align-items-center" style="font-size: 0.85rem; gap: 2px;">
                <li class="nav-item">
                    <a class="nav-link px-2 {{ (Request::is('/') || Request::is('principal')) ? 'active' : '' }}" href="{{ url('/') }}">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link px-2 {{ Request::is('quienessomos') ? 'active' : '' }}" href="{{ url('/quienessomos') }}">Nosotros</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link px-2 {{ Request::is('comercializacion') ? 'active' : '' }}" href="{{ url('/comercializacion') }}">Ventas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link px-2 {{ Request::is('contacto') ? 'active' : '' }}" href="{{ url('/contacto') }}">Contacto</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link px-2 {{ Request::is('terminos') ? 'active' : '' }}" href="{{ url('/terminos') }}">Términos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link px-2 {{ Request::is('consultas') ? 'active' : '' }}" href="{{ url('/consultas') }}">Consultas</a>
                </li>

                <li class="nav-item">
                    <a class="btn btn-dark text-white fw-bold ms-lg-1" 
                       href="{{ url('/login') }}" 
                       style="border-radius: 8px; font-size: 0.8rem; padding: 4px 12px;">
                       login
                    </a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-dark text-white fw-bold ms-lg-1" 
                       href="{{ url('/registro') }}" 
                       style="border-radius: 8px; font-size: 0.8rem; padding: 4px 12px;">
                       Registrarse
                    </a>
                </li>
            </ul>
        </div>
    </div>
    
</header>


    <main>
        @yield('content')
    </main>

  
    <footer class="custom-footer">
    <div class="container text-center">
        <h2 class="footer-title section-title">Picky Petshop</h2>
        <p class="slogan-footer">Elegido por humanos, aprobado por mascotas.</p>
        
        <div class="socials my-4 d-flex align-items-center gap-2">
            <a href="https://www.instagram.com/" target="_blank" class="social-link">
                <img src="{{ asset('img/instaicon.jpg') }}" alt="Instagram" style="width: 50px; height: 50px; object-fit: contain;">
            </a>

            <a href="https://www.tiktok.com/" target="_blank" class="social-link">
                <img src="{{ asset('img/tiktokicon.jpg') }}" alt="TikTok" style="width: 50px; height: 50px; object-fit: contain;">
            </a>

            <a href="https://www.facebook.com/" target="_blank" class="social-link">
                <img src="{{ asset('img/faceicon.jpg') }}" alt="Facebook" style="width: 50px; height: 50px; object-fit: contain;">
            </a>

            <a href="https://web.whatsapp.com/" target="_blank" class="social-link">
                <img src="{{ asset('img/wpicon.jpg') }}" alt="WhatsApp" style="width: 30px; height: 30px; object-fit: contain;">
            </a>
        </div>

        <hr class="custom-hr mx-auto">
        <p class="small mb-0 opacity-75">
            &copy; 2026 <strong>Picky PetShop</strong>. Desarrollado para el bienestar animal.
        </p>
    </div>
</footer>


    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/carrito.js') }}"></script>
    <script src="{{ asset('js/registro.js') }}"></script>
    <script src="{{ asset('js/consulta.js') }}"></script>
    <script src="{{ asset('js/contacto.js') }}"></script>
    <script src="{{ asset('js/login.js') }}"></script>
</body>
</html>
