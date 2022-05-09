<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemResturent extends Model
{
    use HasFactory;
    protected $fillable =['quantity'];
    
    public function resturent(){
        return $this->belongsTo('App\Models\Resturent');
    }

    public function item(){
        return $this->belongsTo('App\Models\Item');
    }
}
