<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FoodCategory extends Model
{
    use HasFactory;

    protected $table='food_categories';
    public function food_items(){
        // establishing a one to many relationship with food item table and specifying the column
        return $this->hasMany('App\Models\FoodItem','category_id');
    }
}
