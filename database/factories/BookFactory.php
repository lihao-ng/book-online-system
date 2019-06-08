<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Book;
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

$factory->define(Book::class, function (Faker $faker) {
  return [
    'isbn' => $faker->unique()->phoneNumber,
    'title' => $faker->title,
    'description' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.",
    'publisher' => $faker->name,
    'publication_date' => '1995-01-23',
    'language' => 'English',
    'price' => $faker->randomNumber(2),
    'rating' => $faker->biasedNumberBetween($min = 1, $max = 5, $function = 'sqrt'),
    'sold' => $faker->biasedNumberBetween($min = 0, $max = 20, $function = 'sqrt'),
    'stock' => $faker->biasedNumberBetween($min = 0, $max = 50, $function = 'sqrt'),
    'image' => null
  ];
});
