<x-layouts.admin title='Restaurantes'>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Food Category') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('food.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Category Id</th>
										<th>Category</th>
										<th>Brief</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($foodCategories as $foodCategory)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $foodCategory->category_id }}</td>
											<td>{{ $foodCategory->category }}</td>
											<td>{{ $foodCategory->brief }}</td>

                                            <td>
                                                <form action="{{ route('food.destroy',$foodCategory->category_id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('food.show',$foodCategory->category_id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('food.edit',$foodCategory->category_id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $foodCategories->links() !!}
            </div>
        </div>
    </div>

</x-layouts.app.app>