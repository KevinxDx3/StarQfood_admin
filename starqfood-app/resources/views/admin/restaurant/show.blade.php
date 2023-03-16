@php
    $nameRest = $restaurant->local_name;
    
    $imagen = URL::asset('image/anonimo.svg');
    $imagef = $food->image->url ??URL::asset('image\food.jpg');

    $foods=$restaurant->foods;
    $foodsCategories=$foods->groupBy('category');


@endphp

<x-layouts.admin title={{$nameRest}}>

    <div class="d-flex align-items-center justify-content-between ps-4 pe-3">
        <h1>{{$restaurant->local_name}}</h1>
        <small>{{ $restaurant->updated_at->diffForHumans() }}</small>
    </div>
    <div class="position-relative p-0 m-0" style="height: 25vw; ">
        <img src="{{$restaurant->image->url ?? 'https://res.cloudinary.com/dpptziu2k/image/upload/v1674111594/StarRestaurants/web_image/photo-1600891964599-f61ba0e24092_ry8ses.jpg' }}"
            alt="..." class="img-fluid w-100 position-absolute bottom-0 start-50 translate-middle-x">
    </div>
    <hr>


    <div class="container">
        <nav class="p-0 m-0">
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <button class="nav-link" id="nav-info-tab" data-bs-toggle="tab" data-bs-target="#nav-info"
                    type="button" role="tab" aria-controls="nav-info" aria-selected="false">Información</button>
                <button class="nav-link" id="nav-menu-tab" data-bs-toggle="tab" data-bs-target="#nav-menu"
                    type="button" role="tab" aria-controls="nav-menu" aria-selected="true">Menú</button>
                <button class="nav-link" id="nav-comments-tab" data-bs-toggle="tab" data-bs-target="#nav-comments"
                    type="button" role="tab" aria-controls="nav-comments"
                    aria-selected="false">Comentarios</button>
                <button class="nav-link" id="nav-gestor-tab" data-bs-toggle="tab" data-bs-target="#nav-gestor"
                    type="button" role="tab" aria-controls="nav-gestor" aria-selected="false">Gestión</button>
            </div>
        </nav>
        <div class="tab-content p-0 m-0" id="nav-tabContent" style="width: 100%">
            {{-- --------------------------------- --- -Segmento  Información---------------------------------------------------------------- --}}
            <div class="tab-pane fade show active p-0 m-0" style="width: 100%"id="nav-info" role="tabpanel"
                aria-labelledby="nav-info-tab">
                <div class="card">

                    <div class="card-body p-sm-3 p-md-4 p-lg-5">
                        <b>Descrición:</b><br>

                        @if (isset($restaurant->description))
                            <p class="card-text ms-3">{{ $restaurant->description }}</p>
                        @else
                            <p class="card-text ms-3">Este es un restaurante más, registrado en esta plataforma :D .....
                                <br>

                                Uno de los mejores restaurantes para visitar se llama
                                <b>{{ $restaurant->local_name }}</b> . Está
                                ubicado en el centro de la ciudad,
                                ofreciendo una experiencia gastronómica única. El ambiente es relajante y acogedor, con
                                una
                                decoración contemporánea y moderna. La comida es exquisita, con una variada selección de
                                platos
                                tanto para los amantes de la comida tipica como para los amantes de la comida
                                internacional.
                            </p>
                        @endif

                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><b>Categoria:</b><br>
                                <p class="card-text ms-3">{{ $restaurant->category->category }}</p>
                            </li>
                            <li class="list-group-item"><b>RUC/RIMPE:</b><br>
                                <p class="card-text ms-3">{{ $restaurant->ruc }}</p>
                            </li>
                            <li class="list-group-item"><b>Dirección:</b><br>
                                <p class="card-text ms-3">{{ $restaurant->address }}</p>
                            </li>
                            <li class="list-group-item"><b>Dueño/Gerente:</b><br>
                                <p class="card-text ms-3">{{ $restaurant->owen }}</p>
                            </li>

                            @if (isset($restaurant->local_email))
                                <li class="list-group-item"><b>Correo: </b><br>
                                    <p class="card-text ms-3">{{ $restaurant->local_email }}</p>
                                </li>
                            @endif
                            @if (isset($restaurant->local_tel))
                                <li class="list-group-item"><b>Telefono:</b><br>
                                    <p class="card-text ms-3">{{ $restaurant->local_tel }}</p>
                                </li>
                            @endif
                            @if (isset($restaurant->local_movil))
                                <li class="list-group-item"><b>Movil:</b><br>
                                    <p class="card-text ms-3">{{ $restaurant->local_movil }}</p>
                                </li>
                            @endif

                        </ul>
                    </div>
                </div>
            </div>
            {{-- ----------------------------------Segmento  Menú---------------------------------------------------------------- --}}
            <div class="tab-pane fade show p-0 m-0" style="width: 100%"id="nav-menu" role="tabpanel"
                aria-labelledby="nav-menu-tab">
                <div class="container-fluid bg-light" style="min-height: 100vw">
                    <br>
                    <h2>Menú</h2>
                    <hr>
                    @foreach ($foodsCategories as $foods)
                        <h3>{{$foods[0]->category->category}}</h3>
                        <hr>
                        @foreach ($foods as $food2)
                            @if ($food2->visibility==1)
                                <div class="p-1 mt-2">
                                    <x-partials.food.show :food="$food2"/> 
                                </div>
                                
                            @endif
                            

                        @endforeach
                        <br>
                        <hr>
                    @endforeach



                </div>
           

            </div>

            {{-- ----------------------------------Segmento Comments--------------------------------------------------- --}}
            <div class="tab-pane fade p-0 m-0" style="width: 100%"id="nav-comments" role="tabpanel"
                aria-labelledby="nav-comments-tab">
                <div class="container p-5">
                    <form method="POST" action={{ route('comment.store') }}>
                        @csrf
                        <label for="commentario" class="form-label"><b>Comentarios:</b></label>

                        <input type="hidden" name="user_id_fk" value={{ Auth::user()->user_id }}>
                        <input type="hidden" name="ruc_fk" value={{ $restaurant->ruc }}>

                        <textarea class="form-control" name="commentary" rows='3' id='commentary'
                            placeholder="Introduzca aquí sus comentarios" name="commentary">
            
                        </textarea>
                        <button class="btn btn-dark mt-2" type="submit" style="width: 160px;">Enviar</button>
                    </form>
                </div>
                <hr>
                <div>
                    @foreach ($restaurant->comments as $comment)
                        {{ $comment }}
                    @endforeach
                </div>

                @if((!isset($restaurant->evaluation)) && (!isset(Auth::user()->user_id->evaluation)))
                
                    <div class="container p-5">
                        <form method="POST" action={{ route('evaluations.store') }}>
                            @csrf
                            <input type="hidden" name="ruc_fk" value={{$restaurant->ruc}}>
                            
                            <input type="hidden" name="user_id_fk" value={{Auth::user()->user_id}}>
    
                            <label for="evaluation">Calidad de atencion:</label>
                            
                            <select class="form-select" id="evaluation" name="score1" >
    
                                <option value=> </option>
    
                                <option value="1">Malo</option>
                                <option value="2">Regular</option>
                                <option value="3">Bueno</option>
                                <option value="4">Buenisimo</option>
                                <option value="5">Excellente</option>
    
                            </select>  
    
                            <label for="evaluation">Calidad de Comida:</label>
                            
                            <select class="form-select" id="evaluation" name="score2" >
    
                                <option value=> </option>
    
                                <option value="1">Malo</option>
                                <option value="2">Regular</option>
                                <option value="3">Bueno</option>
                                <option value="4">Buenisimo</option>
                                <option value="5">Excellente</option>
    
                            </select> 
    
                            <label for="evaluation">Tiempo de Preparación:</label>
                            
                            <select class="form-select" id="evaluation" name="score3" >
    
                                <option value=> </option>
    
                                <option value="1">Malo</option>
                                <option value="2">Regular</option>
                                <option value="3">Bueno</option>
                                <option value="4">Buenisimo</option>
                                <option value="5">Excellente</option>
    
                            </select> 
    
                            <label for="evaluation">Variación de Platos:</label>
                            
                            <select class="form-select" id="evaluation" name="score4" >
    
                                <option value=> </option>
    
                                <option value="1">Malo</option>
                                <option value="2">Regular</option>
                                <option value="3">Bueno</option>
                                <option value="4">Buenisimo</option>
                                <option value="5">Excellente</option>
    
                            </select> 
    
                            <label for="evaluation">Ambiente:</label>
                            
                            <select class="form-select" id="evaluation" name="score5" >
    
                                <option value=> </option>
    
                                <option value="1">Malo</option>
                                <option value="2">Regular</option>
                                <option value="3">Bueno</option>
                                <option value="4">Buenisimo</option>
                                <option value="5">Excellente</option>
    
                            </select> 
                            
                            </textarea>
                            <button class="btn btn-dark mt-2" type="submit" style="width: 160px;">Enviar</button>
                        </form>
                    </div>
                   

                @endif


                



            </div>

            
                
           

            {{---------------------------------------------------------SISTEMA DE CALIFICACIONES---------------------------------------------------------}}

             

            




            {{-- -------------------------------------------------Segmneto Configurciones ------------------------------------------------------------ --}}
            <div class="card tab-pane fade p-0 m-0" style="width: 100%" id="nav-gestor" role="tabpanel"
                aria-labelledby="nav-gestor-tab">
               <x-partials.gestionRestaurant :restaurant="$restaurant" :categories="$categories"/>

            </div>
        </div>
    </div>



</x-layouts.admin>
