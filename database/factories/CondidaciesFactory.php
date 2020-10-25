<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Condidacies;
use Faker\Generator as Faker;

$factory->define(Condidacies::class, function (Faker $faker) {
    return [

       'user_profil_id' =>  0,
       'branch' => $faker->randomElement(['GLSID','BDCC','GIL','GMSI','SEER','GECSI'],1),
       'accepted' => $faker->randomElement([true,false,null]),
    ];
});
