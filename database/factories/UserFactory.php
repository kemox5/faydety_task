<?php

/** @var Factory $factory */

use App\User;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;
use Illuminate\Support\Str;

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

$factory->define(User::class, function (Faker $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'country_code' => $faker->countryCode,
        'phone_number' => function () {
            $codes = ['010', '011', '012', '015'];
            $number = $codes[rand(0, 3)];
            for ($i = 0; $i < 8; $i++) {
                $number .= rand(0, 9);
            }
            return $number;
        },
        'gender' => $faker->randomElement(['male', 'female']),
        'birthdate' => $faker->date('Y-m-d', today()),
        'avatar' => $faker->image(),
        'email' => $faker->unique()->safeEmail,
    ];
});
