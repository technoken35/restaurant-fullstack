<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FoodItem extends Model
{
    //use HasFactory;

    protected $table='food_items';
    public function food_category(){
        return $this->belongsTo('App\Models\FoodCategory');
    }


}
