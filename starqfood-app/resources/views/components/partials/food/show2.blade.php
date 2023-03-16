@php
    $imagef = $food->image->url ??URL::asset('image\food.jpg');
@endphp

<div class="container p-1">
    <div class="row g-0">
        <div class="col-md-2">
            <img src={{$imagef}} alt="Imagen" class="img-fluid">
        </div>
        <div class="col-md-10">
            <div class="card-body">
                <h5 class="card-title">{{ucfirst(strtolower($food->food_name))}}</h5>
                <div class="row">
                    <div class="col-12">
                        <p class="card-text"><b>Precio: </b>{{$food->cost}} $</p>
                        <p class="card-text"><b>Tiempo de espera: </b>{{$food->wait_time}} min</p>
                    </div>
                       
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>
