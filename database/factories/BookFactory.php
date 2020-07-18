<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Model\Book;
use Illuminate\Support\Str;
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

$factory->define( Book::class, function (Faker $faker) {
    return [
        'title' => $faker->words(2, TRUE),
		'genre' => $faker->words(1, TRUE),
        'email' => $faker->safeEmail(),
        'isbn' => Str::random(10),
		'abstract' => $faker->sentences(4, TRUE),
		'author_name' => $faker->name(),
		'created_at' => now(),
		'updated_at' => now(),
		'pages' => rand(100, 700),
	];
});
