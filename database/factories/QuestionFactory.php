<?php

use Faker\Generator as Faker;

$factory->define(\App\Question::class, function (Faker $faker) {
    return [
        'category_id' => rand(1,5),
        'text' => $faker->text(),
        'image_url' => 'https://www.trafiktesten.dk/files/teoriproeve_billeder/teoriproeve_billeder_1404_image_3.jpg',
        'audio_url' => 'https://www.trafiktesten.dk/files/teoriproeve_billeder/teoriproeve_billeder_1404_voice_1_question.mp3',
        'user_id' => 2
    ];
});
