@php
    $image1 = URL::asset('image/flat-mountains-admin.svg');
    $image3 = URL::asset('image/flat-mountains-user.svg');
    $image2 = URL::asset('image/flat-mountains.svg');
    $logoPage = URL::asset('image\logo_negativo.svg');
    $fotoPerfil = Auth::user()->profile->image->url ?? URL::asset('image/logo.svg');
    $nameAuth = explode(' ', Auth::user()->profile->name)[0] . ' ' . explode(' ', Auth::user()->profile->last_name)[0];
    //****************************   Direcciones **************************\\
    $homeUrl = '/admin/home';
    $userUrl = '/admin/users';
    $userCreateUrl = '/admin/users/create';
    $CategoryRest = '/admin/users';
    $CategoryFood = '/admin/users';
    $RestaurantsUrl = '/admin/users';
    $RestCreateUrl = '/admin/users';
    $FoodsUrl = '/admin/users';
    $FoodsCreateUrl = '/admin/users';
    $mapaUrl = '/admin/users';
    $vincularMapaUrl = '#';
    $logOutUrl =route('logout');
    $profileUrl = '/admin/users/'.Auth::user()->user_id;
    $editProfileUrl = '/admin/users/'.Auth::user()->user_id.'/edit';
    $mensajeUrl='#';
    $starUrl='#';

@endphp

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>StarQfood</title>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <!-- Style -->
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href={{ URL::asset('css/admin/admin.css') }}>
    <script src="/js/admin/menu.js"></script>
    <link rel="stylesheet" href={{ URL::asset('css/admin/style.css') }}>
    {{--                                Fuente Logo                         --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@600&display=swap" rel="stylesheet">
    {{-- ------------------------------------------------------------------ --}}
</head>

<body>

    <body id="body-pd">
        <header class="d-block header" id="header">
            <div class="row align-items-center ">
                <div class="col-4 col-md-3 col-xl-2  header_toggle pt-2">
                    <i class='bx bx-menu' id="header-toggle">
                        <small
                            style="font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif">Menú</small>
                    </i>
                </div>
                <div class="col-5 col-md-6 col-xl-8 text-center pt-1">
                    <h1 style="font-family:Dancing Script">StarQfood</h1>
                </div>
                <div class=" d-none d-md-block  col-md-3 col-xl-2 p-0 m-0 pe-1">
                    @auth
                        <div class="row p-0">
                            <div class="dropdown p-0 ">
                                <a class="d-flex dropdown-toggle justify-content-center align-items-center text-dark"
                                    role="button" id="sesionMenu" data-bs-toggle="dropdown" aria-expanded="false">
                                    <small class="me-3">{{ $nameAuth }}</small>
                                    <div class="header_img me-1">
                                        <img src={{ $fotoPerfil }} alt="">
                                    </div>
                                </a>

                                <ul class="dropdown-menu" aria-labelledby="sesionMenu">
                                    <li><a class="dropdown-item" href={{ $profileUrl }}><i
                                                class='bx bx-user nav_icon'></i>
                                            <span>Perfil</span></a></li>
                                    <li><a class="dropdown-item" href={{ $editProfileUrl }}><i
                                                class='bx bx-wrench nav_icon'></i>
                                            <span>Configurar</span></a></li>
                                    <hr>
                                    <li><a class="dropdown-item" href={{ $logOutUrl }} 
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            <i
                                                class='bx bx-log-out nav_icon'></i>
                                            <span> Cerrar Sesión </span>
                                            <form id="logout-form" action={{$logOutUrl}} method="POST" class="d-none">
                                                @csrf
                                            </form>
                                        
                                        </a></li>
                                </ul>
                            </div>
                        </div>
                    @endauth
                </div>
            </div>


        </header>
        <div class="l-navbar" id="nav-bar">
            <nav class="nav ">
                <div class="pe-0">
                    <a href={{ $homeUrl }} class="nav_logo ps-2 pe-5 ">
                        <img src={{ $logoPage }} alt="logo"
                            style="width:50px !important; height:50px !important;" class="img-fluid">
                        <span class="nav_logo-name">StarQfood</span>
                    </a>
                    <div class="nav_list">
                        <a href={{ $homeUrl }} class="nav_link m-0"> <i class='bx bx-home nav_icon me-2'></i>
                            <span class="nav_name"> Inicio</span></a>
                        <div class="accordion accordion-flush p-0 m-0" id="accordionMenu">
                            <div class=" accordion-item p-0 m-0 mt-2 mb-1" style="background: #18181a">
                                <div class="accordion-header  " id="flush-headingUsers">
                                    <button class="nav_link d-flex accordion-button dack collapsed ps-3 pe-2 m-0 w-100"
                                        type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseUsers"
                                        aria-expanded="false" aria-controls="flush-collapseUsers">
                                        <i class='bx bx-user nav_icon ms-2 pe-2'></i><span
                                            class="nav_name">Usuarios</span>
                                    </button>
                                </div>
                                <div id="flush-collapseUsers" style="background: #242427"
                                    class="accordion-collapse collapse m-0 p-0" aria-labelledby="flush-headingUsers"
                                    data-bs-parent="#accordionMenu">
                                    <div class="accordion-body p-0 m-0 ">
                                        <a href={{ $userUrl }} class="nav_link m-0"> <i
                                                class='bx bxs-group nav_icon me-2'></i>
                                            <span class="nav_name">Index</span>
                                        </a>
                                        <a href={{ $userCreateUrl }} class="nav_link m-0"> <i
                                                class='bx bxs-user-account nav_icon me-2'></i>
                                            <span class="nav_name">Crear Usuario</span>
                                        </a>
                                    </div>

                                </div>
                            </div>
                            {{-- --------------------------------------------------------- --}}

                            <div class=" accordion-item p-0 m-0 mt-2 mb-1" style="background: #18181a">
                                <div class="accordion-header  " id="flush-headingCategory">
                                    <button class="nav_link d-flex accordion-button dack collapsed ps-3 pe-2 m-0 w-100"
                                        type="button" data-bs-toggle="collapse"
                                        data-bs-target="#flush-collapseCategory" aria-expanded="false"
                                        aria-controls="flush-collapseCategory">
                                        <i class='bx bxs-category-alt nav_icon ms-2 pe-2'></i><span
                                            class="nav_name">Categorias</span>
                                    </button>
                                </div>
                                <div id="flush-collapseCategory" style="background: #242427"
                                    class="accordion-collapse collapse m-0 p-0"
                                    aria-labelledby="flush-headingCategory" data-bs-parent="#accordionMenu">
                                    <div class="accordion-body p-0 m-0 ">
                                        <a href={{ $CategoryRest }} class="nav_link m-0"> <i
                                                class='bx bx-restaurant nav_icon me-2'></i>
                                            <span class="nav_name">Restaurantes</span>
                                        </a>
                                        <a href={{ $CategoryFood }} class="nav_link m-0"> <i
                                                class='bx bx-drink nav_icon me-2'></i>
                                            <span class="nav_name"> Alimentos</span>
                                        </a>
                                    </div>

                                </div>
                            </div>
                            {{-- --------------------------------------------------------- --}}

                            <div class=" accordion-item p-0 m-0 mt-2 mb-1" style="background: #18181a">
                                <div class="accordion-header  " id="flush-headingRestaur">
                                    <button class="nav_link d-flex accordion-button dack collapsed ps-3 pe-2 m-0 w-100"
                                        type="button" data-bs-toggle="collapse"
                                        data-bs-target="#flush-collapseRestaur" aria-expanded="false"
                                        aria-controls="flush-collapseRestaur">
                                        <i class='bx bx-restaurant nav_icon ms-2 pe-2'></i><span
                                            class="nav_name">Restaurantes</span>
                                    </button>
                                </div>
                                <div id="flush-collapseRestaur" style="background: #242427"
                                    class="accordion-collapse collapse m-0 p-0" aria-labelledby="flush-headingRestaur"
                                    data-bs-parent="#accordionMenu">
                                    <div class="accordion-body p-0 m-0 ">
                                        <a href={{ $RestaurantsUrl }} class="nav_link m-0"> <i
                                                class='bx bx-list-ul nav_icon me-2'></i>
                                            <span class="nav_name">Index</span>
                                        </a>
                                        <a href={{ $RestCreateUrl }} class="nav_link m-0"> <i
                                                class='bx bxs-book-add nav_icon me-2'></i>
                                            <span class="nav_name">Crear Restaurant</span>
                                        </a>
                                    </div>

                                </div>
                            </div>
                            {{-- --------------------------------------------------------- --}}
                            <div class=" accordion-item p-0 m-0 mt-2 mb-1" style="background: #18181a">
                                <div class="accordion-header" id="flush-headingFood">
                                    <button class="nav_link d-flex accordion-button dack collapsed ps-3 pe-2 m-0 w-100" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFood" aria-expanded="false" aria-controls="flush-collapseFood" >
                                        <i class='bx bx-drink nav_icon ms-2 pe-2'></i><span class="nav_name">Alimentos</span>
                                    </button>
                                </div>
                                <div id="flush-collapseFood" style="background: #242427" class="accordion-collapse collapse m-0 p-0" aria-labelledby="flush-headingFood" data-bs-parent="#accordionMenu">
                                    <div class="accordion-body p-0 m-0 " >
                                        <a href={{$FoodsUrl}} class="nav_link m-0"> <i class='bx bx-food-menu nav_icon me-2'></i>
                                            <span class="nav_name">Index</span>
                                        </a>
                                        <a href={{$FoodsCreateUrl}} class="nav_link m-0"> <i class='bx bxs-book-add nav_icon me-2'></i>
                                            <span class="nav_name">Agregar Platos</span>
                                        </a>
                                    </div>
                                        
                                </div>
                            </div>
                            
                             {{-- --------------------------------------------------------- --}}
                             <div class=" accordion-item p-0 m-0 mt-2 mb-1" style="background: #18181a">
                                <div class="accordion-header" id="flush-headingMap">
                                    <button class="nav_link d-flex accordion-button dack collapsed ps-3 pe-2 m-0 w-100" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseMap" aria-expanded="false" aria-controls="flush-collapseMap" >
                                        <i class='bx bx-map nav_icon ms-2 pe-2'></i><span class="nav_name">Ubicaciónes</span>
                                    </button>
                                </div>
                                <div id="flush-collapseMap" style="background: #242427" class="accordion-collapse collapse m-0 p-0" aria-labelledby="flush-headingMap" data-bs-parent="#accordionMenu">
                                    <div class="accordion-body p-0 m-0 " >
                                        <a href={{$mapaUrl}} class="nav_link m-0"> <i class='bx bx-map-alt nav_icon me-2'></i>
                                            <span class="nav_name">Mapa</span>
                                        </a>
                                        <a href={{$vincularMapaUrl}} class="nav_link m-0"> <i class='bx bx-map-pin nav_icon me-2'></i>
                                            <span class="nav_name">Agregar Ubicaciones</span>
                                        </a>
                                    </div>
                                        
                                </div>
                            </div>
                            
                            {{-- --------------------------------------------------------- --}}

                            <a href={{ $mensajeUrl }} class="nav_link mb-2"> <i
                                    class='bx bx-message-square-detail nav_icon me-2'></i>
                                <span class="nav_name">Mensajes</span>
                            </a>
                            <a href={{ $starUrl }} class="nav_link mt-1"> <i
                                class='bx bx-star nav_icon me-2'></i>
                            <span class="nav_name">Evaluaciones</span>
                        </a>
                            
                        </div>


                        <hr>
                        <div class="accordion accordion-flush d-md-none " id="menuaUser">
                            <div class="accordion-item">
                                <div class="accordion-header p-0" id="flush-headingUser">
                                    <a class="d-flex accordion-button collapsed m-0 p-0 ps-3 pe-1 nav_link"
                                        role="button" style="background: #18181a" data-bs-toggle="collapse"
                                        data-bs-target="#flush-collapseUser" id="flush-headingUser"
                                        aria-expanded="false" aria-controls="flush-collapseUser">
                                        <div class="header_img">
                                            <img src={{ $fotoPerfil }} alt="">
                                        </div>
                                        <span class="nav_name ms-1">{{ $nameAuth }}</span>
                                    </a>

                                </div>
                                <div id="flush-collapseUser" class="accordion-collapse collapse p-0 m-0"
                                    aria-labelledby="flush-headingUser" data-bs-parent="#menuaUser">
                                    <div class="accordion-body m-0 p-0" style="background: #18181a">
                                        <ul class="list-unstyled text-light p-0 pt-2">
                                            <li>
                                                <a class="nav_link" href={{ $profileUrl }}>
                                                    <i class='bx bx-user nav_icon'></i><span
                                                        class="nav_name ms-3">Perfil</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="nav_link" href={{ $editProfileUrl }}>
                                                    <i class='bx bx-wrench nav_icon'></i><span
                                                        class="nav_name ms-3">Configurar</span>
                                                </a>
                                            </li>
                                            <hr>
                                            <li>
                                                <a class="nav_link" href={{ $logOutUrl }} onclick="event.preventDefault(); document.getElementById('logout-form').submit();" >
                                                    <i class='bx bx-log-out nav_icon'></i><span class="nav_name ms-3">
                                                        Cerrar Sesión </span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="nav_list">
                    <a href={{$logOutUrl}} class="nav_link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> <i class='bx bx-log-out nav_icon'></i> <span
                            class="nav_name ps-3">SignOut</span> </a>
                </div>

            </nav>
        </div>
        <div class="height-100 ">
            <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel" style="height: 25vw;">
                <div class="carousel-inner">
                    <div class="carousel-item active" data-bs-interval="10000" style="height: 25vw;">
                        <img src={{ $image1 }}
                            class="d-block w-100 position-absolute bottom-0 start-50 translate-middle-x"
                            alt="imagen1">
                    </div>
                    <div class="carousel-item" data-bs-interval="2000" style="height: 25vw;">
                        <img src={{ $image2 }}
                            class="d-block w-100 position-absolute bottom-0 start-50 translate-middle-x"
                            alt="imagen2">
                    </div>
                    <div class="carousel-item" style="height: 25vw;">
                        <img src={{ $image3 }}
                            class="d-block w-100 position-absolute bottom-0 start-50 translate-middle-x"
                            alt="imagen3">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
            Musica
        </div>
        </div>

    </body>

</html>
