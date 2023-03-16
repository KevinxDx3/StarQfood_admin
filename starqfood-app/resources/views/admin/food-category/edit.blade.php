<x-layouts.admin title='Restaurantes'>
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Update Food Category</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('food.update', $foodCategory->category_id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('admin.food-category.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

</x-layouts.app.app>
