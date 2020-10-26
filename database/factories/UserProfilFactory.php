<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\UserProfil;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(UserProfil::class, function (Faker $faker) {

    $grade_s1 = $faker->randomFloat(NULL,10, 20);
    $grade_s2 = $faker->randomFloat(NULL,10, 20);
    $grade_s3 = $faker->randomFloat(NULL,10, 20);
    $grade_s4 = $faker->randomFloat(NULL,10, 20);
     
    return [
        
        'firstname' => $faker->firstName('male'|'female'),
        'lastname' => $faker->lastName,
        'phonenumber' => $faker->e164PhoneNumber,
        'CNE' => Str::random(10),
        'datebirth' => '1999-05-23',
        'sexe' => $faker->randomElement(['Homme','Femme']),
        'age' => $faker->numberBetween(19, 25),
        'diploma' => $faker->randomElement(['DEUG','DEUST','DEUP','DUT','BTS','DTS']),
        'CNI' => Str::random(10),
        'grade_s1' => $grade_s1,
        'grade_s2' => $grade_s2,
        'grade_s3' => $grade_s3,
        'grade_s4' => $grade_s4,
        'note' => ($grade_s1+$grade_s2+$grade_s3+$grade_s4)/4,
        'specialty_bac2' => $faker->randomElement(['SMP','SMI','SMA','MIP','MATHS','GI','GM','GE']),
        'user_id' => 0,
    ];
});
