<?php

namespace App\Models;

use App\support\filters\ProductFilter;
use App\support\filters\QueryFilter;
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
    public function categories()
    {
        return $this->belongsToMany(Category::class)->withTimestamps();
    }
    public function scopefilters($query,QueryFilter $filter){
          return  $filter->apply($query);
    }

}
