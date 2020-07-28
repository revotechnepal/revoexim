<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    $title = $faker->sentence;
    return [
        //
        'title'         => $title,
        'slug'          => Str::slug($title),
        'details'       => $faker->paragraph,
        'image'         => 'post.jpg',
        'status'        => $faker->boolean,
    ];
});
