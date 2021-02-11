<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class Category extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Category::forceCreate(['name'=>'laptops','slug'=>'laptops']);
        \App\Models\Category::forceCreate(['name'=>'desktop','slug'=>'desktop']);
        \App\Models\Category::forceCreate(['name'=>'mobile','slug'=>'mobile']);
        \App\Models\Category::forceCreate(['name'=>'tablet','slug'=>'tablet']);
        \App\Models\Category::forceCreate(['name'=>'tv','slug'=>'tv']);
        \App\Models\Category::forceCreate(['name'=>'camera','slug'=>'camera']);
        \App\Models\Category::forceCreate(['name'=>'appliance','slug'=>'appliance']);
    }
}
