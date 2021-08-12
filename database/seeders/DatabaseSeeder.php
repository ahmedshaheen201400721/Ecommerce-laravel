<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(10)->create();
        $this->call([Category::class,product::class,coupon::class,VoyagerDatabaseSeeder::class]);
    //        $this->call([product::class,coupon::class]);
        User::first()->update(['email'=>"a@a.com",'role_id'=>1]);
        User::find(2)->update(['email'=>"b@b.com"]);

    }
}


