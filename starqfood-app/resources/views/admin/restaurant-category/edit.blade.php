<x-layouts.admin title='Restaurantes'>
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Update Restaurant Category</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('restaurant.update', $restaurantCategory->category_id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('admin.restaurant-category.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layouts.app.app>