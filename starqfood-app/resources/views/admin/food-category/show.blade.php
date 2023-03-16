<x-layouts.admin title='Restaurantes'>
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Food Category</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('food.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Category Id:</strong>
                            {{ $foodCategory->category_id }}
                        </div>
                        <div class="form-group">
                            <strong>Category:</strong>
                            {{ $foodCategory->category }}
                        </div>
                        <div class="form-group">
                            <strong>Brief:</strong>
                            {{ $foodCategory->brief }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

</x-layouts.app.app>
