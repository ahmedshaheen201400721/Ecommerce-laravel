<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class coupon extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \App\Models\Coupon::create(['code'=>'abc','type'=>'fixed','value'=>30]);
        \App\Models\Coupon::forceCreate(['code'=>'def','type'=>'percent','percent_off'=>50]);
    }
}
