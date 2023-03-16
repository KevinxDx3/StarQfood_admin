<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RestaurantCategory;
use Illuminate\Http\Request;

class RestaurantCategoryController extends Controller
{
    
 /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $restaurantCategories = RestaurantCategory::paginate();

        return view('admin.restaurant-category.index', compact('restaurantCategories'))
            ->with('i', (request()->input('page', 1) - 1) * $restaurantCategories->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $restaurantCategory = new RestaurantCategory();
        return view('admin.restaurant-category.create', compact('restaurantCategory'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        

        $restaurantCategory = RestaurantCategory::create($request->all());

        return redirect()->route('restaurant.index')
            ->with('success', 'RestaurantCategory created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $restaurantCategory = RestaurantCategory::find($id);

        return view('admin.restaurant-category.show', compact('restaurantCategory'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $restaurantCategory = RestaurantCategory::find($id);

        return view('admin.restaurant-category.edit', compact('restaurantCategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  RestaurantCategory $restaurantCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $category_id)
    {
        $restaurantCategory = RestaurantCategory::find($category_id);
        

        $restaurantCategory->update($request->all());

        return redirect()->route('restaurant.index')
            ->with('success', 'RestaurantCategory updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $restaurantCategory = RestaurantCategory::find($id)->delete();

        return redirect()->route('restaurant.index')
            ->with('success', 'RestaurantCategory deleted successfully');
    }
}
