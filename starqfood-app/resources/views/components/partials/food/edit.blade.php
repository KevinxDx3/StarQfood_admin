@php
    $imagef = $food->image->url ??URL::asset('image\food.jpg');
@endphp

<div class="row">
    <div class="col-12">
        <div class="row align-items-center">
            <div class="col-md-4 text-center" id="preview">
                <img src={{ $imagef }} class="img-fluid" alt="Imagen plato" id="image0">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title text-center"><b>Añadir al Menú </b></h5>
                    <form method="POST" action={{ route('foods.update',['ruc' => $food->ruc_fk,'food'=>$food->food_id]) }}
                        role="form" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <label class="form-label" for="category_id_fk">Categoria de plato:
                        </label>
                        <select class="form-select" aria-label="Seleccione Categoria"
                            name="category_id_fk" id="category_id_fk" value={{$food->category_id_fk}}>
                            <option>Seleccione una Categoria </option>
                            @foreach ($categories as $category)
                                @if ($category->category_id==$food->category_id_fk )
                                    <option selected value={{ $category->category_id }}>{{ $category->category }}</option>
                                @else
                                    <option value={{ $category->category_id }}>{{ $category->category }}</option>
                                @endif

                            @endforeach
                        </select>
                        @error('category_id_fk')
                            <x-partials.menssageError message="Seleccione una categoria" />
                        @enderror
                        <br>
                        <label class="form-label" for="food_name">Nombre del plato : </label>
                        <input type="text" name="food_name" id="food_name" class="form-control"
                            value="{{ $food->food_name }}" class="form-control">
                        @error('food_name')
                            <x-partials.menssageError message='{{$message}}' />
                        @enderror
                        <br>
                        <label class="form-label" for="cost">Precio: </label>
                        <div class="input-group mb-3">
                            <span class="input-group-text">$</span>
                            <input type="text" name="cost" id="cost"
                                value="{{ $food->cost}}" class="form-control" placeholder="Ejemplo: 10.30">
                        </div>
                        @error('cost')
                            <x-partials.menssageError message='{{$message}}' />
                        @enderror
                        <br>
                        <label class="form-label" for="wait_time">Tiempo de espera en minutos: </label>
                        <input type="text" name="wait_time" id="wait_time" value="{{$food->wait_time }}"
                            class="form-control">
                        @error('wait_time')
                            <x-partials.menssageError message={{$message}} />
                        @enderror
                        <br>
                        <input type="hidden" name="ruc_fk" id="ruc_fk"
                            value={{ $food->ruc_fk }} class="form-control">
                        <label for="image"><b>Imagen del plato (Opcional):</b> </label>
                        <input type="file" name="image" accept="image/png, image/gif, image/jpeg"
                            class="form-control p-2 m-2" content="Imagen" id="image" />
                        @error('image')
                            <x-partials.menssageError message={{$message}} />
                        @enderror
                        

                        <div class="form-check">
                            @if ($food->visibility==1)
                            <input type="hidden" name="visibility" value="0" >
                            <input type="checkbox" name="visibility" id="visibility1" value="0" onchange="this.value = this.checked ? 1 : 0" checked> 
                            @else
                            <input type="hidden" name="visibility" value="0" >
                            <input type="checkbox" name="visibility" id="visibility1" value="0" onchange="this.value = this.checked ? 1 : 0"> 
                            @endif
                                <label class="form-check-label" for="visibility">
                                Visualizar Elemento
                            </label>
                          </div>
                        <div class="container text-center">
                             <input class="btn btn-outline-success mt-3" type="submit" value="Guardar" style="min-width:20vw; width: 100px">
                        </div>
                       
                    </form>
                    <script src="/js/admin/preview2.js"></script>
                    <script src="/js/admin/check.js"></script>
                </div>
            </div>
        </div>
    </div>
</div>