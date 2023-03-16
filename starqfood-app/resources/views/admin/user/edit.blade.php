@php
    $image1 = URL::asset('image/flat-mountains-admin.svg');
    $image3 = URL::asset('image/flat-mountains-user.svg');
    $image2 = URL::asset('image/flat-mountains.svg');
    $foto = $user->profile->image->url ?? URL::asset('image/logo.svg');
    $image = [1 => $image1, 2 => $image2, 3 => $image3, 9 => $image1];
    $id = Auth()->user()->rol_id_fk;
    
    $idpermiso = Auth::user()->user_id;
    
    if ($id == 9) {
        $permiso = true;
    }else if($id==1 && ($user->rol_id_fk==2 ||$user->rol_id_fk==3)){
        $permiso = true;
    }else {
        $permiso = false;
    }

    if ((Auth::user()->user_id==$user->user_id)||$permiso){
        $action='';
    }else{
        $action='disabled';
    }
        
@endphp

<x-layouts.admin title="Editar Perfil">

    <div class="row m-0 mb-5 p-0 align-items-end  position-relative "
        style="background-image:url({{ $image[$id] }}); background-repeat:no-repeat;  
        background-position:center bottom; background-size:cover; height: 25vw;">
        <div class="text-light position-absolute top-0 start-0 p-2">
            <h2>{{ $user->rol->rol }}</h2>
        </div>
        <div class="col-12 col-sm-10 col-lg-8 col-xl-7 position-absolute top-100 start-50 translate-middle text-center">
            <figure class=" figure rounded-circle bg-light border border-dark " style="width: 15vw; height:15vw;"
                id="preview">
                <img class="figure-img img-fluid rounded-circle " src={{ $foto }} alt="Foto de Perfil"
                    style="width: 15vw; heigth:15vw;" id="image0">
            </figure>
        </div>

    </div>
    <div class="d-none d-md-block">
        <br>
        <br>
    </div>


    <div class="container-fluid text-center m-0 mt-5">
        <form action={{ url('admin/users/' . $user->user_id) }} method="post" enctype="multipart/form-data">
            @csrf @method('PATCH')
            <div class="row justify-content-center p-2 p-sm-1 p-md-0">
                <input type="hidden" name="id" value={{ $user->user_id }}>
                <div class="col-12 col-sm-10 col-lg-8 col-xl-7 m-1 p-1">
                    @error('name')
                        <x-partials.menssageError message={{$message}}/>
                    @enderror
                    <input class="form-control" type="name" name="name" id="nameId" placeholder="Nombre/s"
                        value={{ $user->profile->name }}>
                </div>
                <div class="col-12 col-sm-10 col-lg-8 col-xl-7 m-1 p-1">
                    @error('last_name')
                        <x-partials.menssageError message={{$message}}/>
                    @enderror
                    <input class="form-control" type="lastName" name="last_name" id="lasName" placeholder="Apellido/s"
                        value={{ $user->profile->last_name }}>
                </div>
                <div class="col-12 col-sm-10 col-lg-8 col-xl-7 m-1 p-1">
                    @error('email')
                        <x-partials.menssageError message={{$message}}/>
                    @enderror
                   
                    <input class="form-control "{{$action}} type="email" name="email" id="emailId" value={{ $user->email }}
                        placeholder="Correo Electrónico">
                </div>
                <div class="col-12 col-sm-10 col-lg-8 col-xl-7 m-1 p-1">
                    @error('telf')
                        <x-partials.menssageError message={{$message}}/>
                    @enderror
                    <input class="form-control" type="tel" name="telf" id="telId" placeholder="Número Telefónico"
                        value={{ $user->profile->telf }}>
                </div>
                <div class="col-12 col-sm-10 col-lg-8 col-xl-7 m-1 p-1">
                    @error('movil')
                        <x-partials.menssageError message={{$message}}/>
                    @enderror
                    <input class="form-control" type="tel" name="movil" id="movilId" placeholder="Número  Móvil"
                        value={{ $user->profile->movil }}>
                </div>
                <div class="col-12 col-sm-10 col-lg-8 col-xl-7 p-1 m-1">
                    <div class="row m-0">
                        @error('image')
                            <x-partials.menssageError message={{$message}}/>
                        @enderror
                        <div class="col-12 col-sm-4 p-0">
                            <label for="image"><b>Foto de Perfil: </b> </label>
                        </div>
                        <div class="col-12 col-sm-8 m-0 p-0">
                            <input accept="image/png,image/jpeg,/image/svg" type="file" class="form-control"
                                name="image" id="image">
                        </div>

                    </div>
                </div>
                <div class="col-12 col-sm-10 col-lg-8 col-xl-7 p-1 m-1">
                    <div class="row m-0">
                        @error('birthday')
                            <x-partials.menssageError message={{$message}}/>
                        @enderror
                        <div class="col-12 col-sm-4 p-0">
                            <label for="brirthday"><b>Fecha de Nacimiento: </b> </label>
                        </div>
                        <div class="col-12 col-sm-8 m-0 p-0">
                            <input class="form-control" type="date" name="birthday" id="birthday" min="1940-01-01"
                                max={{ date('Y-m-d', strtotime('-4 year', strtotime(date('Y-m-d')))) }}
                                value={{ $user->profile->birthday }}>
                        </div>

                    </div>
                </div>
                <div class="col-12 col-sm-10 col-lg-8 col-xl-7 p-1 mt-5">
                    <div class="row">
                        <div class="col-12 col-sm-6 p-0">
                            <a class="btn eliminar " href={{ url('admin/users') }} role="button"
                                style="width: 60%">Regresar</a>
                        </div>
                        <div class="col-12 col-sm-6">
                            <input class="btn editar" type="submit" value="Guardar Cambios" style="width: 60%">
                        </div>
                    </div>
                </div>
            </div>
            <script src="/js/admin/preview.js"></script>
        </form>

    </div>

</x-layouts.admin>