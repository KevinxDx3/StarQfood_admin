<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RestaurantEditRequest;
use App\Http\Requests\RestaurantRequest;
use App\Models\FoodCategory;
use Illuminate\Http\Request;
use App\Models\Restaurant;
use App\Models\RestaurantCategory;
use App\Models\User;

use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Support\Facades\Storage;

class RestaurantController extends Controller
{
  
    public function index()
    {
        $restaurants=Restaurant::all();
        return view('admin.restaurant.index',['restaurants'=>$restaurants]);

    }

  
    public function create()
    {
        $users=User::orderBy('user_id','desc')->whereNot('rol_id_fk',3)->get(['user_id','username','email','created_at']);
        $categories=RestaurantCategory::orderBy('category')->get();
        return view('admin.restaurant.create',['users'=>$users,'categories'=>$categories]);

    }

    
    public function store(RestaurantRequest $request)
    {
        $restaurant=Restaurant::create($request->validated());
        $id=$restaurant->ruc;
        $image=$request->file('image');
        if(isset($restaurant->image) && $request->validated()['image']){
            $path=$image->getRealPath();
            $cloudinary = Cloudinary::upload($path,[
                'folder' => 'StarQfood/restaurants/image',
            ]);
            $url = $cloudinary-> getSecurePath();
            $imagenID = $cloudinary -> getPublicID();
            $restaurant->image()->create(['url'=>$url,'direc_public'=>$imagenID]);
        }
    
         return redirect()->route('restaurants.show',$id);

    }

    public function show($ruc)
    {
        return view('admin.restaurant.show',['restaurant'=>Restaurant::findOrFail($ruc),'categories'=>FoodCategory::all()]);
    }

 
    public function edit($ruc)
    {
        $categories=RestaurantCategory::orderBy('category')->get();
        $users=User::orderBy('user_id','desc')->whereNot('rol_id_fk',3)->get(['user_id','username','email','created_at']);
        return view('admin.restaurant.edit',['restaurant'=>Restaurant::findOrFail($ruc),'users'=>$users, 'categories'=>$categories]);
    }


    public function update(RestaurantEditRequest $request, $ruc)
    {

        $restaurant = Restaurant::findOrFail($ruc);
        $restaurant->update($request->validated());
        $image=$request->file('image');
        if(isset($image)){
            $path=$image->getRealPath();
            if(isset($restaurant->image)){
                $oldImage = Cloudinary::getImage($restaurant->image->direc_public);
                Cloudinary::destroy($oldImage->getPublicId());
                $cloudinary = Cloudinary::upload($path,[
                    'folder' => 'StarQfood/restaurants'
                ]);
                $url = $cloudinary-> getSecurePath();
                $imagenID = $cloudinary -> getPublicID();
                $restaurant->image()->update(['url'=>$url,'direc_public'=>$imagenID]);
            }else{
                $cloudinary = Cloudinary::upload($path,[
                    'folder' => 'StarQfood/restaurants',
                ]);
                $url = $cloudinary-> getSecurePath();
                $imagenID = $cloudinary -> getPublicID();
                $restaurant->image()->create(['url'=>$url,'direc_public'=>$imagenID]);
            }
        
        }
            
        return redirect()->route('restaurants.index')->with('success','Se ha actualizado correctamente su información');
    }

    
    public function destroy(Restaurant $restaurant)
    {
        if(isset($restaurant->image->direc_public)){
            $fotoID = $restaurant->image->direc_public;
            Cloudinary::destroy($fotoID);
        }
        
        $restaurant->delete();
        return to_route('restaurants.index')->with('success','Se ha eliminado correctamente su información');
    }
}
