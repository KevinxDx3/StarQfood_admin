<x-layouts.admin title='Restaurantes'>
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Create Restaurant Category</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('restaurant.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('admin.restaurant-category.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layouts.app.app>
