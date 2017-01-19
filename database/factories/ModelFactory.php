<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

// $factory->define(App\User::class, function (Faker\Generator $faker) {
//     static $password;

//     return [
//         'name' => $faker->name,
//         'email' => $faker->unique()->safeEmail,
//         'password' => $password ?: $password = bcrypt('secret'),
//         'remember_token' => str_random(10),
//     ];
// });

$factory->define(App\DoctorCupon::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'cupon_code' => $faker->unique()->numberBetween($min = 10000000, $max = 99999999),
    ];
});


// $factory->define(App\ConsumerProducts::class, function (Faker\Generator $faker) {
//     static $password;

//     return [
//          'cp_code' => "cp0000".mt_rand(1000, 9999),
//          'cp_category' => mt_rand ( 1 , 18 ),
//          'cp_company_id' => mt_rand ( 1 , 4 ),
//          'cp_title' => $faker->name,
//          'cp_description' => $faker->name,
//          'cp_container_type' => $faker->name,
//          'cp_volume' => $faker->name,
//          'cp_price' => mt_rand ( 100 , 500 ),
//          'cp_status' => 1
//     ];
// });
