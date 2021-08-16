<?php


namespace App\support\filters;


use Illuminate\Database\Eloquent\Builder;

class ProductFilter extends QueryFilter
{
    public function category($category=null){
        $this->builder->whereHas('categories',function (Builder $builder) use($category){
           $builder->where('name',$category);
        });
    }
    public function order($by='asc'){
        $this->builder->orderBy('price',$by);
    }

    public function price1(){
      
        $this->builder->where('price',"<","70000");
    }
     
    public function price2(){
      
        $this->builder->where('price',">","70000")->where('price',"<","250000");
    }
     
    public function price3(){
      
        $this->builder->where('price',">","250000");
    }
}
