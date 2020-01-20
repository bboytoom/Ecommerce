<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\PhotoGallery;
use Faker\Generator as Faker;

$factory->define(PhotoGallery::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->sentence($nbWords = 2, $variableNbWords = true),
        'image' => '20200116235910_slide_default.jpg',
        'description' => $this->faker->text($maxNbChars = 250),
        'status' => 1
    ];
});