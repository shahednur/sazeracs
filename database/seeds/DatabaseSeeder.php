<?php

use Illuminate\Database\Seeder;
use App\Ebent;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        factory(User::class,5)->create();
       Ebent::truncate();
       $ebentQnt=20;
       factory(Ebent::class,$ebentQnt)->create();
    }
}
