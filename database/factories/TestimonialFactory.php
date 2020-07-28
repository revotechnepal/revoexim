<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Testimonial;
use Faker\Generator as Faker;

$factory->define(Testimonial::class, function (Faker $faker) {
    return [
        //
        'name'=>$faker->name(),
        'company_name'=>$faker->company(),
        'post'=>$faker->jobTitle,
        'message'=>$faker->sentence(),
        'image'=>'post.jpg',
        'status'=>$faker->numberBetween($max=1, $min=0),
    ];
});
