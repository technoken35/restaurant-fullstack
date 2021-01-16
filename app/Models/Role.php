<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{

    use HasFactory;


    // one role can belong to many users
    public function users(){
        return $this->belongsToMany('App\Models\User');
    }

}
