@php
    $image1 = URL::asset('image/flat-mountains-admin.svg');
    $image3 = URL::asset('image/flat-mountains-user.svg');
    $image2 = URL::asset('image/flat-mountains.svg');
    $foto = $user->profile->image->url ?? URL::asset('image/logo.svg');
    $image = [1 => $image1, 2 => $image2, 3 => $image3, 9 => $image1];
    $id = $user->rol_id_fk;
    $permiso = false;
    $idpermiso = Auth::user()->user_id;
    
    if ($id == 9) {
        $permiso = true;
    }
    $nameC=explode(' ', $user->profile->name)[0] . ' ' . explode(' ', $user->profile->last_name)[0];
    
@endphp

<x-layouts.admin title={{$nameC}}>
    @if(session('success'))
    <div class="container-fluid alert alert-success text-center text-light p-1 m-0 rounded-0 border-0 " style="background-color: #f1300e">
            {{ session('success') }}
        </div>
    @endif

    <div class="row m-0 mb-5 p-0 align-items-end  position-relative "
        style="background-image:url({{ $image[$id] }}); background-repeat:no-repeat;  
        background-position:center bottom; background-size:cover; height: 25vw;">
        <div class="text-light position-absolute top-0 start-0 p-2">
            <h2>{{ $user->rol->rol }}</h2>
        </div>
        <div class="col-12 position-absolute top-100 start-50 translate-middle text-center">
            <figure class=" figure rounded-circle bg-light border border-dark " style="width: 15vw; height:15vw">
                <img class="figure-img img-fluid rounded-circle " src={{ $foto }} alt="Foto de Perfil"
                    style="width: 15vw; heigth:15vw" id="image0">
            </figure>
        </div>

    </div>
    <div class="d-none d-md-block">
        <br>
        <br>
    </div>


    <div class="container-fluid text-center m-0 mt-5">
        <div class="row p-sm-1 ps-sm-3 pe-sm-3">
            <div class="col-12 text-center col-sm-6 text-sm-end">
                <label for="name"><b>Nombres Completos:</b> </label>
            </div>
            <div class="col-12 text-center col-sm-6 text-sm-start">
                <p>{{ $user->profile->name . ' ' . $user->profile->last_name }}</p>
            </div>
            
        </div>
        <div class="row p-sm-1 ps-sm-3 pe-sm-3">
            <div class="col-12 text-center col-sm-6 text-sm-end">
                <label for="username"><b>Nombre de Usuario:</b> </label>
            </div>
            <div class="col-12 text-center col-sm-6 text-sm-start">
                <p>{{ $user->username }}</p>
            </div>
        </div>
        <div class="row p-sm-1 ps-sm-3 pe-sm-3">
            <div class="col-12 text-center col-sm-6 text-sm-end">
                <label for="email"> <b>Correo Electronico:</b> </label>
            </div>
            <div class="col-12 text-center col-sm-6 text-sm-start">
                <p>{{ $user->email }}</p>
            </div>
        </div>
        @isset($user->profile->telf)
            <div class="row p-sm-1 ps-sm-3 pe-sm-3">
                <div class="col-12 text-center col-sm-6 text-sm-end">
                    <label for="telf"><b>Número Telefónico:</b> </label>
                </div>
                <div class="col-12 text-center col-sm-6 text-sm-start">
                    @php
                        $tel = str_split($user->profile->telf, 4);
                        $tele = $tel[0] . ' ' . $tel[1];
                    @endphp
                    <p>(02) {{ $tele }}</p>
                </div>
            </div>
        @endisset
        @isset($user->profile->movil)
            <div class="row p-sm-1 ps-sm-3 pe-sm-3">
                <div class="col-12 text-center col-sm-6 text-sm-end">
                    <label for="movil"> <b>Número Celular:</b></label>
                </div>
                <div class="col-12 text-center col-sm-6 text-sm-start ">
                    @php
                        $tel = str_split($user->profile->movil, 4);
                        $tele = $tel[0] . ' ' . $tel[1] . ' ' . $tel[2];
                    @endphp
                    <p>(+593) {{ $tele }}</p>
                </div>
            </div>
        @endisset
        @isset($user->profile->birthday)
            <div class="row p-sm-1 ps-sm-3 pe-sm-3">
                <div class="col-12 text-center col-sm-6 text-sm-end">
                    <label for="brirthday"> <b>Fecha de Nacimiento:</b></label>
                </div>
                <div class="col-12 text-center col-sm-6 text-sm-start">
                    <p>{{ date('d/m/Y', strtotime($user->profile->birthday)) }}</p>
                </div>
            </div>
        @endisset

        @isset($user->restaurant[0])
            <div class="row p-sm-1 ps-sm-3 pe-sm-3">
                <div class="col-12 text-center col-sm-6 text-sm-end text-end">
                    <label for="Restaurantes"> <b>Restaurantes/s Registrados: </b></label>
                </div>
                <div class="col-12 text-center col-sm-6 text-sm-start">
                    <ul class="list-unstyled">
                        @foreach ($user->restaurant as $restaurant)
                            <li>- <a href={{'../restaurants/' . $restaurant->ruc }}> {{ $restaurant->local_name }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endisset
    </div>

</x-layouts.admin>
