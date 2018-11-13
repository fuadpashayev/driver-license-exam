<?php

use Faker\Generator as Faker;

$factory->define(\App\Settings::class, function (Faker $faker) {
    return [
        'title' => $faker->text(),
        'url' => 'https://drivertest.azweb'
    ];
});
