<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Service;
use Faker\Generator as Faker;

$factory->define(Service::class, function (Faker $faker) {
    return [
        //
        'title'=>$faker->name(),
        'slug'=>$faker->word(),
        'details'=>$faker->sentence(),
        'status'=>$faker->numberBetween($min=0, $max=1),
        'featured'=>$faker->numberBetween($max=0, $max=1),
        'icon'=>'fas fa-video',
    ];
});
