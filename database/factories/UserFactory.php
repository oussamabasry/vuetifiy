<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;
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

        'email' => $faker->unique()->freeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$Nr1CBGTTv0SdEUYySq6a9.JyHvEVDGrrx3b5hpaQEGi4xTzYt1152', // user
        'role' => 'user',
        'completed' => 0,
        'remember_token' => Str::random(10),
    ];
});
