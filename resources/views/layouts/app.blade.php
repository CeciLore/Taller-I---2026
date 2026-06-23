<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">

    <link rel="stylesheet" href="{{ asset('vendor/bootstrap-icons/font/bootstrap-icons.css') }}">

    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/myStyle.css') }}">

</head>

<body>

    <header class="navbar navbar-expand-lg sticky-top bg-white shadow-sm" style="padding: 0.4rem 1%;">

        <div class="container-fluid">

            <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">

                <img src="{{ asset('img/Picky.jpg') }}" alt="Logo" class="logo-img" style="height: 35px;">

                <span class="section-title ms-2" style="color: var(--brand-purple);
                         font-size: 1.15rem;
                         font-weight: bold;">

                    Picky

                </span>

            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">

                <span class="navbar-toggler-icon"></span>

            </button>

            <div class="collapse navbar-collapse" id="navbarNav">

                <ul class="navbar-nav ms-auto align-items-center" style="font-size: 0.85rem;
                       gap: 2px;">

                    <li class="nav-item">

                        <a class="nav-link px-2 {{ (Request::is('/') || Request::is('principal')) ? 'active' : '' }}"
                            href="{{ url('/') }}">

                            Inicio

                        </a>

                    </li>

                    <li class="nav-item">

                        <a class="nav-link px-2 {{ Request::is('quienessomos') ? 'active' : '' }}"
                            href="{{ url('/quienessomos') }}">

                            Nosotros

                        </a>

                    </li>

                    <li class="nav-item">

                        <a class="nav-link px-2 {{ Request::is('comercializacion') ? 'active' : '' }}"
                            href="{{ url('/comercializacion') }}">

                            Ventas

                        </a>

                    </li>

                    <li class="nav-item">

                        <a class="nav-link px-2 {{ Request::is('contacto') ? 'active' : '' }}"
                            href="{{ url('/contacto') }}">

                            Contacto

                        </a>

                    </li>

                    <li class="nav-item">

                        <a class="nav-link px-2 {{ Request::is('terminos') ? 'active' : '' }}"
                            href="{{ url('/terminos') }}">

                            Términos

                        </a>

                    </li>

                    @guest

                        <li class="nav-item ms-lg-2">

                            <a href="{{ route('login') }}" class="btn btn-picky-yellow fw-bold">

                                <i class="bi bi-box-arrow-in-right"></i>
                                Ingresar

                            </a>

                        </li>

                        <li class="nav-item ms-lg-2">

                            <a href="{{ route('register') }}" class="btn btn-login-submit fw-bold">

                                <i class="bi bi-person-plus-fill"></i>
                                Registrarse

                            </a>

                        </li>

                    @endguest

                    @auth

                        @if(Auth::user()->rol == 'usuario')

                                    <li class="nav-item me-2">

                                        <a class="btn btn-warning position-relative fw-bold" href="{{ route('carrito.index') }}" style="border-radius: 8px;
                                  font-size: 0.8rem;
                                  padding: 4px 12px;">

                                            <i class="bi bi-cart-fill"></i>

                                            Carrito

                                            <span id="contador-carrito"
                                                class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">

                                                {{
                            Auth::user()->carrito
                            ? Auth::user()->carrito->items->count()
                            : 0
                                }}

                                            </span>

                                        </a>

                                    </li>

                        @endif

                        @if(Auth::user()->rol == 'admin')

                                <li class="nav-item me-2">

                                    <a class="btn btn-warning fw-bold" href="{{ route('admin.dashboard') }}" style="border-radius: 8px;
                              font-size: 0.8rem;
                              padding: 4px 12px;">

                                        Panel Admin

                                    </a>

                                </li>

                        @endif

                        <li class="nav-item dropdown">

                            <a class="nav-link dropdown-toggle fw-bold" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">

                                <i class="bi bi-person-circle"></i>
                                {{ explode(' ', Auth::user()->nombre)[0] }}

                            </a>

                            <ul class="dropdown-menu dropdown-menu-end shadow">

                                @if(Auth::user()->rol == 'usuario')

                                    <li>

                                        <a class="dropdown-item" href="{{ route('perfil') }}">

                                            <i class="bi bi-person"></i>
                                            Mi Perfil

                                        </a>

                                    </li>

                                    <li>

                                        <a class="dropdown-item" href="{{ route('consultas') }}">

                                            <i class="bi bi-chat-dots"></i>
                                            Consultas

                                        </a>

                                    </li>

                                    <li>

                                        <a class="dropdown-item" href="{{ route('miscompras') }}">

                                            <i class="bi bi-bag-check"></i>
                                            Mis Compras

                                        </a>

                                    </li>

                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>

                                @endif

                                <li>

                                    <form action="{{ route('logout') }}" method="POST">

                                        @csrf

                                        <button type="submit" class="dropdown-item text-danger">

                                            <i class="bi bi-box-arrow-right"></i>
                                            Salir

                                        </button>

                                    </form>

                                </li>

                            </ul>

                        </li>

                    @endauth


                </ul>

            </div>

        </div>

    </header>

    <main>

        @yield('content')

    </main>

    <footer class="custom-footer">

        <div class="container text-center">

            <h2 class="footer-title section-title">

                Picky Petshop

            </h2>

            <p class="slogan-footer">

                Elegido por humanos, aprobado por mascotas.

            </p>

            <div class="socials my-4 d-flex align-items-center gap-2">

                <a href="https://www.instagram.com/" target="_blank" class="social-link">

                    <img src="{{ asset('img/instaicon.jpg') }}" alt="Instagram" style="width: 50px;
                            height: 50px;
                            object-fit: contain;">

                </a>

                <a href="https://www.tiktok.com/" target="_blank" class="social-link">

                    <img src="{{ asset('img/tiktokicon.jpg') }}" alt="TikTok" style="width: 50px;
                            height: 50px;
                            object-fit: contain;">

                </a>

                <a href="https://www.facebook.com/" target="_blank" class="social-link">

                    <img src="{{ asset('img/faceicon.jpg') }}" alt="Facebook" style="width: 50px;
                            height: 50px;
                            object-fit: contain;">

                </a>

                <a href="https://web.whatsapp.com/" target="_blank" class="social-link">

                    <img src="{{ asset('img/wpicon.jpg') }}" alt="WhatsApp" style="width: 30px;
                            height: 30px;
                            object-fit: contain;">

                </a>

            </div>

            <hr class="custom-hr mx-auto">

            <p class="small mb-0 opacity-75">

                &copy; 2026
                <strong>Picky PetShop</strong>.

                Desarrollado para el bienestar animal.

            </p>

        </div>

    </footer>

    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <script src="{{ asset('js/registro.js') }}"></script>

    <script src="{{ asset('js/consulta.js') }}"></script>

    <script src="{{ asset('js/contacto.js') }}"></script>

    <script src="{{ asset('js/login.js') }}"></script>

    <script src="{{ asset('js/agregarCarrito.js') }}"></script>

</body>

</html>