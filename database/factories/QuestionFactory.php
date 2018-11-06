<?php

use Faker\Generator as Faker;

$factory->define(\App\Question::class, function (Faker $faker) {
    return [
        'category_id' => rand(1,5),
        'description' => $faker->text(),
        'right_answer_id' => rand(),
        'user_id' => 2
    ];
});
