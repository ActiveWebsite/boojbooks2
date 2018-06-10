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

$factory->define(App\Book::class, function (Faker $faker) {
    return [
        'title' => $faker->text(),
        'publication_date' => $faker->date(),
        'description' => $faker->paragraph,
        'pages' => $faker->randomNumber(3),
        'author_id' => $faker->randomDigit
    ];
});
