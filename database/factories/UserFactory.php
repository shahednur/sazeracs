<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Ebent::class, function (Faker $faker) {
    $start_date = \Carbon\Carbon::now()->addDays($faker->randomElement([1,2,3,4,5,6,7,8,9]));
    $end_date = $start_date->copy()->addDays($faker->randomElement([1,2,3,4,5,6,7,8,9]));
    return [
        'title'=>$faker->sentence(5),
        'description'=>$faker->paragraph(5),
        'address'=>$faker->address,
        'lat'=>$faker->latitude,
        'long'=>$faker->longitude,
        'start_date'=>$start_date->format('Y-m-d'),
        'end_date'=>$end_date->format('Y-m-d'),
        'user_id'=>factory(App\User::class)->create(),
    ];
});
