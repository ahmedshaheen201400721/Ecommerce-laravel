<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function pricing(){
        return "$".$this->price/100;
    }

    public function scopeRelatedProducts($query,$n){
        return $query->inRandomOrder()->take($n);
    }
}
