<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resturent extends Model
{
    use HasFactory;

    public function users(){
        return $this->belongsToMany('App\Models\User');
    }
    public function itemresturents(){
        return $this->hasMany('App\Models\ItemResturent');
    }
    public function activities(){
        return $this->hasManyThrough('App\Models\ItemResturent','App\Models\Item');
    }  
}
