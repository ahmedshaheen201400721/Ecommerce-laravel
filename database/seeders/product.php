<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class product extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Product::forceCreate([
            'name'=>'laptop1',
            'slug'=>'product-1',
            'price'=>2099,
            'details'=>'Lorem ipsum dolor sit amet, consectetur adipisicing elit Dicta, repudiandae?',
            'description'=>"Lorem ipsum dolor sit amet, consectetur adipisicing elit Dicta, repudiandae?",
        ]);

        \App\Models\Product::forceCreate([
            'name'=>'laptop2',
            'slug'=>'product-2',
            'price'=>2299,
            'details'=>'Lorem ipsum dolor sit amet, consectetur adipisicing elit Dicta, repudiandae?',
            'description'=>"Lorem ipsum dolor sit amet, consectetur adipisicing elit Dicta, repudiandae?",
        ]);

        \App\Models\Product::forceCreate([
            'name'=>'laptop3',
            'slug'=>'product-3',
            'price'=>20399,
            'details'=>'Lorem ipsum dolor sit amet, consectetur adipisicing elit Dicta, repudiandae?',
            'description'=>"Lorem ipsum dolor sit amet, consectetur adipisicing elit Dicta, repudiandae?",
        ]);
        \App\Models\Product::forceCreate([
            'name'=>'laptop4',
            'slug'=>'product-4',
            'price'=>20499,
            'details'=>'Lorem ipsum dolor sit amet, consectetur adipisicing elit Dicta, repudiandae?',
            'description'=>"Lorem ipsum dolor sit amet, consectetur adipisicing elit Dicta, repudiandae?",
        ]);
        \App\Models\Product::forceCreate([
            'name'=>'laptop5',
            'slug'=>'product-5',
            'price'=>20599,
            'details'=>'Lorem ipsum dolor sit amet, consectetur adipisicing elit Dicta, repudiandae?',
            'description'=>"Lorem ipsum dolor sit amet, consectetur adipisicing elit Dicta, repudiandae?",
        ]);
        \App\Models\Product::forceCreate([
            'name'=>'laptop6',
            'slug'=>'product-6',
            'price'=>20699,
            'details'=>'Lorem ipsum dolor sit amet, consectetur adipisicing elit Dicta, repudiandae?',
            'description'=>"Lorem ipsum dolor sit amet, consectetur adipisicing elit Dicta, repudiandae?",
        ]);
        \App\Models\Product::forceCreate([
            'name'=>'laptop7',
            'slug'=>'product-7',
            'price'=>27099,
            'details'=>'Lorem ipsum dolor sit amet, consectetur adipisicing elit Dicta, repudiandae?',
            'description'=>"Lorem ipsum dolor sit amet, consectetur adipisicing elit Dicta, repudiandae?",
        ]);
        \App\Models\Product::forceCreate([
            'name'=>'laptop8',
            'slug'=>'product-8',
            'price'=>82099,
            'details'=>'Lorem ipsum dolor sit amet, consectetur adipisicing elit Dicta, repudiandae?',
            'description'=>"Lorem ipsum dolor sit amet, consectetur adipisicing elit Dicta, repudiandae?",
        ]);
        \App\Models\Product::forceCreate([
            'name'=>'laptop9',
            'slug'=>'product-9',
            'price'=>29099,
            'details'=>'Lorem ipsum dolor sit amet, consectetur adipisicing elit Dicta, repudiandae?',
            'description'=>"Lorem ipsum dolor sit amet, consectetur adipisicing elit Dicta, repudiandae?",
        ]);
        \App\Models\Product::forceCreate([
            'name'=>'laptop10',
            'slug'=>'product-10',
            'price'=>92099,
            'details'=>'Lorem ipsum dolor sit amet, consectetur adipisicing elit Dicta, repudiandae?',
            'description'=>"Lorem ipsum dolor sit amet, consectetur adipisicing elit Dicta, repudiandae?",
        ]);
    }
}
