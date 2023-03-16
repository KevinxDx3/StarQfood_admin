<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Food;

class FoodCategory extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table ='food_categories';
    protected $primaryKey='category_id';
    protected $fillable=['category','brief'];

    public function food()
    {
        return $this->hasMany(Food::class, 'category_id_fk');
    }
}
