<?php


namespace App\support\filters;



use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

abstract class QueryFilter
{
    protected $request;
    protected $builder;

    /**
     * QueryFilter constructor.
     * @param $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function filters(){
        return $this->request->all();
    }

    public function apply(Builder $builder){
        $this->builder=$builder;
        foreach ($this->filters() as $filter =>$args){
            if(method_exists($this,$filter)){
                call_user_func_array([$this,$filter],array_filter([$args]));
            }
        }
        return $this->builder;
    }

}
