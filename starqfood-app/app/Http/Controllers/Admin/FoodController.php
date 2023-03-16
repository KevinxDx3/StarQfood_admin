<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\FoodRequest;
use App\Models\Food;
use App\Models\FoodCategory;
use Illuminate\Http\Request;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class FoodController extends Controller
{

    public function index()
    {
        $view=FoodCategory::all();
        return response()->json(['data' => $view], 201);
    }


    public function create($ruc)
    {
        return redirect()->route('restaurants.show',$ruc);
    }


    public function store(FoodRequest $request)
    {
        $food=Food::create($request->validated());
        $id=$food->ruc_fk;
        $image=$request->file('image');
        $direction='StarQfood/restaurants/'.$id;
        if(isset($image)){
            $path=$image->getRealPath();
            $cloudinary = Cloudinary::upload($path,[
                'folder' =>$direction,
                'transformation' => [
                    'width' => 500,
                    'height' => 500,
                    'crop' => 'fill']
            ]);
            $url = $cloudinary-> getSecurePath();
            $imagenID = $cloudinary -> getPublicID();
            $food->image()->create(['url'=>$url,'direc_public'=>$imagenID]);
        }
        return redirect()->route('restaurants.show',$id);
    }


    public function show($id)
    {
        //
    }

  
    public function edit($id)
    {
        
    }

   
    public function update(FoodRequest $request,$ruc,$food_id)
    {
        $food = Food::findOrFail($food_id);
        $food->update($request->validated());
        $image=$request->file('image');
        $id=$food->ruc_fk;
        $direction='StarQfood/restaurants/'.$id;
        if(isset($image)){
            $path=$image->getRealPath();
            if(isset($food->image)){
                $oldImage = Cloudinary::getImage($food->image->direc_public);
                Cloudinary::destroy($oldImage->getPublicId());
                $cloudinary = Cloudinary::upload($path,[
                    'folder' =>$direction,
                    'transformation' => [
                        'width' => 500,
                        'height' => 500,
                        'crop' => 'fill']
                ]);
                $url = $cloudinary-> getSecurePath();
                $imagenID = $cloudinary -> getPublicID();
                $food->image()->update(['url'=>$url,'direc_public'=>$imagenID]);
            }else{
                $cloudinary = Cloudinary::upload($path,[
                    'folder' =>$direction,
                    'transformation' => [
                        'width' => 500,
                        'height' => 500,
                        'crop' => 'fill']
                ]);
                $url = $cloudinary-> getSecurePath();
                $imagenID = $cloudinary -> getPublicID();
                $food->image()->create(['url'=>$url,'direc_public'=>$imagenID]);
            }
        }
        return redirect()->route('restaurants.show',$ruc);
    }


    public function destroy($id)
    {
        //
    }
}
