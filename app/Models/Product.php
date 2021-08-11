<?php

namespace App\Models;

use App\support\filters\ProductFilter;
use App\support\filters\QueryFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
class Product extends Model
{
    use HasFactory;
    // use HasFactory,Searchable;

    protected $guarded=[];

    public function pricing(){
        return "$".$this->price/100;
    }

    public function scopeRelatedProducts($query,$n){
        return $query->inRandomOrder()->take($n);
    }
    public function categories()
    {
        return $this->belongsToMany(Category::class,'category_product')->withTimestamps();
    }
    public function scopefilters($query,QueryFilter $filter){
          return  $filter->apply($query);
    }

    public function toSearchableArray()
    {
        $array = $this->toArray();
        $categories=['categories'=>$this->categories->pluck('name')];
        $array=array_merge($array,$categories);
        return $array;
    }


}
