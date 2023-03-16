@php
    $image = URL::asset('image\logo.svg');
    $id = 0;
    $permiso = false;
    $idpermiso = Auth::user()->user_id;
    
    if (Auth::user()->rol_id_fk == 9) {
        $permiso = true;
    }
    
@endphp

<x-layouts.admin title='Usuarios'>
    @if(session('success'))
        <div class="container-fluid alert alert-success border-0 text-center text-light p-1 m-0 rounded-0 " style="background-color: #f1300e"> 
            {{ session('success') }}
        </div>
    @endif

    <h1 class="p-2">Index Usuarios</h1>
    <div class="container card p-0">
        <div class="card-header text-light" style="background-color: #f1300e ">
            <div class="row align-items-center">
                <div class="col-sm-9 text-center">
                    <h6>Usuario</h6>
                </div>
                <div class="d-none d-sm-block col-sm-3 text-center">
                    <h6>Codigo</h6>
                </div>
            </div>
        </div>
        <div class="accordion accordion-flush" id="acordionIndexUser">
            @foreach ($users as $user)
                @php
                    $id++;
                    if ($id % 2 == 0) {
                        $claseOver = 'dack text-light';
                    } else {
                        $claseOver = '';
                    }
                @endphp
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-heading{{ $id }}">
                        <button class="accordion-button collapsed {{$claseOver}} " type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapse{{ $id }}" aria-expanded="false"
                            aria-controls="flush-collapse{{ $id }}">
                            <div class="container-fluid">
                                <div class="row align-items-center">
                                    <div class="col-2 col-sm-1">
                                        <img src={{ $image }} alt="" srcset=""width="35"
                                            heigth="35">
                                    </div>
                                    <div class="col-10 col-sm-8 m">
                                        <b>{{ explode(' ', $user->profile->name)[0] . ' ' . explode(' ', $user->profile->last_name)[0] }}</b>
                                    </div>
                                    <div class="d-none d-sm-block col-sm-3 text-end">
                                        <p class="d-none d-md-inline-block">ID:</p>
                                        {{ sprintf('%02d', $user->rol_id_fk) . '-' . sprintf('%05d', $user->user_id) }}
                                    </div>
                                </div>
                            </div>
                        </button>
                    </h2>
                    <div id="flush-collapse{{ $id }}" class="accordion-collapse collapse m-0 p-0 w-100"
                        aria-labelledby="flush-heading{{ $id }}" data-bs-parent="#acordionIndexUser">
                        <div class="accordion-body ">
                            <div class="container-fluid row text-center align-items-center pe-3 ps-3">
                                <div class="col-sm-4">
                                    <img src={{ $image }} alt="foto_{{ $user->user_id }}">
                                </div>
                                <div class="container-fluid col-sm-8">
                                    <div class="row align-items-center">
                                        <div class="col-lg-8">
                                            <ul class="list-group list-group-flush">
                                                <li class="list-group-item">
                                                    <div class="row">
                                                        <div class="col-md-6 col-lg-4">
                                                            <b>Name:</b>
                                                        </div>
                                                        <div class="col-md-6 col-lg-8">
                                                            {{ $user->profile->name . ' ' . $user->profile->last_name }}
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    <div class="row">
                                                        <div class="col-md-6 col-lg-4">
                                                            <b>Username:</b>
                                                        </div>
                                                        <div class="col-md-6 col-lg-8">
                                                            {{ $user->username }}
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    <div class="row">
                                                        <div class="col-md-6 col-lg-4">
                                                            <b>Email:</b>
                                                        </div>
                                                        <div class="col-md-6 col-lg-8">
                                                            {{ $user->email }}
                                                        </div>
                                                    </div>
                                                </li>
                                                @isset($user->profile->telf)
                                                    <li class="list-group-item">
                                                        <div class="row">
                                                            <div class="col-md-6 col-lg-4">
                                                                <b>Telf:</b>
                                                            </div>
                                                            <div class="col-md-6 col-lg-8">
                                                                {{ $user->profile->telf }}
                                                            </div>
                                                        </div>
                                                    </li>
                                                @endisset
                                                @isset($user->profile->movil)
                                                    <li class="list-group-item">
                                                        <div class="row">
                                                            <div class="col-md-6 col-lg-4">
                                                                <b>Movil</b>
                                                            </div>
                                                            <div class="col-md-6 col-lg-8">
                                                                {{ $user->profile->movil }}
                                                            </div>
                                                        </div>
                                                    </li>
                                                @endisset
                                                @if ($user->restaurant->count() > 0)
                                                    <li class="list-group-item">
                                                        <div class="row ">
                                                            <div class="col-md-5 col-lg-4">
                                                                <b>Restaurant/s:</b>
                                                            </div>
                                                            <div class="col-md-5 col-lg-8">
                                                                <ul class="list-unstyled">
                                                                    @for ($i = 0; $i < $user->restaurant->count(); $i++)
                                                                        <li><a
                                                                                href={{ 'restaurants/' . $user->restaurant[$i]->ruc }}>{{ $user->restaurant[$i]->local_name }}</a>
                                                                        </li>
                                                                    @endfor
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </li>
                                                @endif
                                            </ul>


                                        </div>
                                        <div class="col-lg-4 p-1">

                                            <div class="row align-items-center text-center ">
                                       
                                                @if ($permiso || $idpermiso == $user->user_id)
                                                
                                                    <div class="col-6 col-md-12 mt-2 mb-2 " style="width: 100%">
                                                        <a href={{ url('admin/users/' . $user->user_id . '/edit') }}
                                                            class="btn editar" style="width: 60%">Editar</a>
                                                    </div>
                                                @else
                                                    @if ($user->rol_id_fk == 3 || $user->rol_id_fk == 2)
                                                        <div class="col-6 col-md-12 mt-2 mb-2" style="width: 100%">
                                                            <a href={{ url('admin/users/' . $user->user_id . '/edit') }}
                                                                class="btn editar" style="width: 60%">Editar</a>
                                                        </div>
                                                    @else
                                                        <div class="col-6 col-md-12 text-center mb-2 mt-2"
                                                            style="width: 100%">
                                                            No tiene permiso para editar
                                                        </div>
                                                    @endif
                                                @endif

                                                @if ($permiso && $user->user_id != Auth::user()->user_id)
                                                    <div class="col-6 col-md-12 " style="width: 100%">
                                                        <form action="{{ route('users.destroy', $user->user_id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn eliminar"
                                                                style="width: 60%">Eliminar</button>
                                                        </form>
                                                    </div>
                                                @else
                                                    @if ($user->rol_id_fk == 3 || $user->rol_id_fk == 2)
                                                        <div class="col-6 col-md-12 " style="width: 100%">
                                                            <form action="{{ route('users.destroy', $user->user_id) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn eliminar"
                                                                    style="width: 60%">Eliminar</button>
                                                            </form>
                                                        </div>
                                                    @else
                                                        <div class="col-6 col-md-12 text-center mb-2"
                                                            style="width: 100%">
                                                            No tiene permiso para eliminar
                                                        </div>
                                                    @endif
                                                @endif
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="etiqueta card-footer text-muted">
                                    <div class="text-center">
                                        <a href={{ url('admin/users/' . $user->user_id) }} class="link-light">Ver más</a>
                                        ...
                                    </div>
                                    <small>{{ $user->updated_at->diffForHumans() }}</small>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-layouts.admin>
