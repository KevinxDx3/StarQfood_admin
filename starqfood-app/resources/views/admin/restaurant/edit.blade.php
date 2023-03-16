@php
    $imagePortada = $restaurant->image->url ?? URL::asset('image/6060052.jpg') ;
@endphp

<x-layouts.admin title='Añadir Restaurantes'>
    <h1 class="ps-5">Crear Resturante</h1>
    <div class="container">

        <div class="container-fluid m-0 mb-5 p-0 text-center position-relative" id="preview" style="height: 25vw">
            <img src="{{ $profile->image->url ?? $imagePortada}}"
                    alt="Fotode perfil"   id="image0" class="img-fluid" style="object-fit:cover;height: 25vw;position:center bottom">
        </div>
        <form action={{ route('restaurants.update',$restaurant->ruc) }} method="post" enctype="multipart/form-data">
            <div class="row align-items-center m-3">
                <div class="col-12">
                    @csrf
                    @method('PATCH')
                    <select class="form-select p-2 m-2" aria-label="Default select example" name="user_id_fk" value="{{$restaurant->user_id_fk}}">
                        <option value=>Seleccione Afiliado</option>
                        @foreach ($users as $user)
                            @if ($restaurant->user_id_fk==$user->user_id )
                              <option value={{ $user->user_id }} selected>{{ $user->username }}</option> 
                            @else
                               <option value={{ $user->user_id }}>{{ $user->username }}</option> 
                            @endif

                        @endforeach
                    </select>

                    <input type="text" name="ruc" class="form-control p-2 m-2"
                        placeholder="Ruc / RIMPE" value="{{$restaurant->ruc ?? old('ruc')}}">
                    <input type="hidden" name="ruc_old" value={{$restaurant->ruc}}>
                    @error('ruc')
                        <x-partials.menssageError message={{$message}} />
                    @enderror
                    <input type="text" name="local_name" class="form-control p-2 m-2"
                        placeholder="Nombre del Restauante/Local" value="{{$restaurant->local_name ?? old('local_name')}}">
                    @error('local_name')
                        <x-partials.menssageError message={{$message}} />
                    @enderror
                    <input type="text" name="address" class="form-control p-2 m-2"
                        placeholder="Dirección del Restauante/Local" value="{{$restaurant->address ?? old('address')}}">
                    @error('address')
                        <x-partials.menssageError message={{$message}} />
                    @enderror
                    <input type="text" name="owen" class="form-control p-2 m-2"
                        placeholder="Nombre del Gerente o Dueño " value="{{$restaurant->owen ?? old('owen')}}">
                    @error('owen')
                        <x-partials.menssageError message={{$message}} />
                    @enderror
                    <input type="email" name="local_email" class="form-control p-2 m-2"
                        placeholder="Correo Electronico (Opcional)" value="{{$restaurant->local_email ?? old('local_email')}}">
                    @error('email')
                        <x-partials.menssageError message={{$message}} />
                    @enderror
                    <input type="tel" name="local_tel" class="form-control p-2 m-2"
                        placeholder="Teléfono (Opcional)" value="{{$restaurant->local_tel ?? old('local_tel')}}">
                    @error('local_tel')
                        <x-partials.menssageError message={{$message}} />
                    @enderror
                    <input type="tel" name="local_movil" class="form-control p-2 m-2"
                        placeholder="Movil (Opcional)" value="{{$restaurant->local_movil ?? old('local_movil') }}">
                    @error('local_movil')
                        <x-partials.menssageError message={{$message}} />
                    @enderror
                    <div class="input-group p-2 m-2 ">
                        <label for="type_local" class="input-group-text"><b>Categorias :</b></label>
                        <select class="form-select" aria-label="Seleccione Categoria" name="category_id_fk" value="{{$restaurant->category_id_fk ?? old('category_id_fk') }}">
                            <option >Seleccione Categoria </option>
                            @foreach ($categories as $category)
                              @if ($restaurant->category_id_fk==$category->category_id)
                                <option selected value={{ $category->category_id }}>{{ $category->category }}</option>
                              @else
                                <option value={{ $category->category_id }}>{{ $category->category }}</option>
                              @endif
                                
                            @endforeach
                        </select>
                    </div>
                    @error('category_id_fk')
                        <x-partials.menssageError message={{$message}} />
                     @enderror
                    <textarea name="description" class="form-control p-2 m-2 mb-2" cols="30" rows="2"
                        placeholder="Escriba un descripción o mensaje al público (Opcional)" value="{{$restaurant->description}}"></textarea>
                    @error('description')
                        <x-partials.menssageError message={{$message}} />
                    @enderror
                    
                    <label for="image"><b>Portada (Opcional):</b> </label>
                    <input type="file" name="image" accept="image/png, image/gif, image/jpeg"
                        class="form-control p-2 m-2" content="Imagen" id="image" />
                    @error('image')
                        <x-partials.menssageError message={{$message}} />
                    @enderror
                    <div class="container-fluid m-3 text-center">
                        <input type="submit" value="Guardar" class="btn btn-dark mb-">
                    </div>
                </div>
               
                <script src="/js/admin/preview2.js"></script>
        </form>
    </div>
</x-layouts.admin>
