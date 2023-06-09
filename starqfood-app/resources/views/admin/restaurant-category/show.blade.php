<x-layouts.admin title='Restaurantes'>
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Restaurant Category</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('restaurant.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Category Id:</strong>
                            {{ $restaurantCategory->category_id }}
                        </div>
                        <div class="form-group">
                            <strong>Category:</strong>
                            {{ $restaurantCategory->category }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layouts.app.app>
