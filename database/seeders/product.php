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
        $rand=range(1,10);
        foreach(range(2,10) as $i)
        \App\Models\Product::forceCreate([
            'name'=>'laptop'.$i,
            'slug'=>'laptop-'.$i,
            'image'=>'products/laptop/laptop-'.$i.'.jpg',
            'price'=>[2099,44,3222,1244,6789,12345,2002,2000,123467][array_rand([2099,44,3222,1244,6789,12345,2002,2000,12346*1007])]*100,
            'details'=>[13,14,16][array_rand([13,14,16])]."inch, ".[1,2,3][array_rand([1,2,3])]."TB, core i3",
            'description'=>"A laptop or laptop computer, is a small, portable personal computer (PC) with a  form factor, typically having a thin LCD or LED computer screen mounted on the inside of the upper lid of the clamshell and an alphanumeric keyboard on the inside of the lower lid.",
             'images'=>'["products/random/'.array_rand($rand).'.jpg", "products/random/'.array_rand($rand).'.jpg", "products/random/'.array_rand($rand).'.jpg"]'
        ])->categories()->attach(1);

        foreach(range(1,30) as $i)
        \App\Models\Product::forceCreate([
            'name'=>'desktop'.$i,
            'slug'=>'desktop-'.$i,
            'price'=>[2099,44,3222,1244,6789,12345,2002,2000,123467][array_rand([2099,44,3222,1244,6789,12345,2002,2000,12346*1007])]*100,
            'details'=>[22,23,25][array_rand([22,23,25])]."inch, ".[1,2,3][array_rand([1,2,3])]."TB, core i5",
            'description'=>"A desktop or desktop computer, is a small, portable personal computer (PC) with a  form factor, typically having a thin LCD or LED computer screen mounted on the inside of the upper lid of the clamshell and an alphanumeric keyboard on the inside of the lower lid.",
            'image'=>'products/desktop/desktop-1.jpg',
             'images'=>'["products/random/'.array_rand($rand).'.jpg", "products/random/'.array_rand($rand).'.jpg", "products/random/'.array_rand($rand).'.jpg"]'
            ])->categories()->attach(2);

        foreach(range(1,30) as $i)
            \App\Models\Product::forceCreate([
                'name'=>'mobile'.$i,
                'slug'=>'mobile-'.$i,
                'image'=>'products/mobile/mobile-1.jpg',
                'price'=>[2099,44,3222,1244,6789,12345,2002,2000,123467][array_rand([2099,44,3222,1244,6789,12345,2002,2000,123467])]*100,
                'details'=>[3,5,7][array_rand([3,5,7])]."inch, ".[100,200,300][array_rand([100,200,300])]."Giga, core i5",
                'description'=>"A mobile or mobile computer, is a small, portable personal computer (PC) with a  form factor, typically having a thin LCD or LED computer screen mounted on the inside of the upper lid of the clamshell and an alphanumeric keyboard on the inside of the lower lid.",
                'images'=>'["products/random/'.array_rand($rand).'.jpg", "products/random/'.array_rand($rand).'.jpg", "products/random/'.array_rand($rand).'.jpg"]'
        ])->categories()->attach(3);
        foreach(range(1,30) as $i)
            \App\Models\Product::forceCreate([
                'name'=>'tablet'.$i,
                'slug'=>'tablet-'.$i,
                'image'=>'products/tablet/tablet-1.jpg',
                'price'=>[2099,44,3222,1244,6789,12345,2002,2000,123467][array_rand([2099,44,3222,1244,6789,12345,2002,2000,123467])]*100,
                'details'=>[9,12,14][array_rand([9,12,14])]."inch, ".[100,200,300][array_rand([100,200,300])]."Giga, core i5",
                'description'=>"A tablet or tablet computer, is a small, portable personal computer (PC) with a  form factor, typically having a thin LCD or LED computer screen mounted on the inside of the upper lid of the clamshell and an alphanumeric keyboard on the inside of the lower lid.",
                 'images'=>'["products/random/'.array_rand($rand).'.jpg", "products/random/'.array_rand($rand).'.jpg", "products/random/'.array_rand($rand).'.jpg"]'
                ])->categories()->attach(4);
        foreach(range(1,30) as $i)
            \App\Models\Product::forceCreate([
                'name'=>'tv'.$i,
                'slug'=>'tv-'.$i,
                'image'=>'products/tv/tv-1.jpg',
                'price'=>[2099,4444,3222,1244,6789,12345,2002,2000,123467][array_rand([2099,44,3222,1244,6789,12345,2002,2000,123467])]*100,
                'details'=>[20,50,70][array_rand([20,50,70])]."inch, ".[100,200,300][array_rand([100,200,300])]."Giga, core i5",
                'description'=>"A tv or tv computer, is a small, portable personal computer (PC) with a  form factor, typically having a thin LCD or LED computer screen mounted on the inside of the upper lid of the clamshell and an alphanumeric keyboard on the inside of the lower lid.",
                 'images'=>'["products/random/'.array_rand($rand).'.jpg", "products/random/'.array_rand($rand).'.jpg", "products/random/'.array_rand($rand).'.jpg"]'
            ])->categories()->attach(5);
        foreach(range(1,30) as $i)
            \App\Models\Product::forceCreate([
                'name'=>'camera'.$i,
                'slug'=>'camera-'.$i,
                'image'=>'products/camera/camera-1.jpg',
                'price'=>[2099,4444,3222,1244,6789,12345,2002,2000,123467][array_rand([2099,44,3222,1244,6789,12345,2002,2000,123467])]*100,
                'details'=>[1,2,4][array_rand([1,2,4])]."inch, ".[100,200,300][array_rand([100,200,300])]."Giga, core i5 and lense ",
                'description'=>"A camera or camera computer, is a small, portable personal computer (PC) with a  form factor, typically having a thin LCD or LED computer screen mounted on the inside of the upper lid of the clamshell and an alphanumeric keyboard on the inside of the lower lid.",
                 'images'=>'["products/random/'.array_rand($rand).'.jpg", "products/random/'.array_rand($rand).'.jpg", "products/random/'.array_rand($rand).'.jpg"]'
                ])->categories()->attach(6);
        foreach(range(1,30) as $i)
            \App\Models\Product::forceCreate([
                'name'=>'appliance'.$i,
                'slug'=>'appliance-'.$i,
                'image'=>'products/appliance/appliance-1.jpg',
                'price'=>[2099,4444,3222,1244,6789,12345,2002,2000,123467][array_rand([2099,44,3222,1244,6789,12345,2002,2000,123467])]*100,
                'details'=>[1,2,4][array_rand([1,2,4])]."inch, ".[100,200,300][array_rand([100,200,300])]."Giga, core i5 and lense ",
                'description'=>"A appliance or appliance computer, is a small, portable personal computer (PC) with a  form factor, typically having a thin LCD or LED computer screen mounted on the inside of the upper lid of the clamshell and an alphanumeric keyboard on the inside of the lower lid.",
                 'images'=>'["products/random/'.array_rand($rand).'.jpg", "products/random/'.array_rand($rand).'.jpg", "products/random/'.array_rand($rand).'.jpg"]'
        ])->categories()->attach(7);
    }
}
