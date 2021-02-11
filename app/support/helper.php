<?php

use Illuminate\Support\Str;

function pricing($price){
    return '$'.$price;
}

function total($price){
    return $price*100;
}

function image($slug){
    if(strpos($slug,'laptop')===false){
        $slug=preg_replace("/[0-9]+/",1,$slug);
    }else{
        $slug=preg_replace("/[0-9]./",array_rand(range(1,10)),$slug);
    }
    return asset('storage/'.$slug.'.jpg');
}


