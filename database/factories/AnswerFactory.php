<?php

use Faker\Generator as Faker;

$factory->define(\App\Answer::class, function (Faker $faker) {
    return [
        'description'=>$faker->text(),
        'question_id' => rand(1,5)
    ];
});
