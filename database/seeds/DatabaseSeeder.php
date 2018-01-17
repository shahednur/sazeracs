<?php

use Illuminate\Database\Seeder;
use App\Ebent;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       Ebent::truncate();
       $ebentQnt=20;
       factory(Ebent::class,$ebentQnt)->create();
    }
}
