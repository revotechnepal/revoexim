<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Team;
use Faker\Generator as Faker;

$factory->define(Team::class, function (Faker $faker) {
    return [
        //
        'name'=>$faker->name(),
        'post'=>$faker->jobTitle,
        'details'=>$faker->sentence(),
        'facebook'=>'https://facebook.com/random',
        'twitter'=>'https://twitter.com/random',
        'instagram'=>'https://instagram.com/random',
        'linkedin'=>'https://linkedin.com/random',
        'image'=>'post.jpg',
        'status'=>$faker->numberBetween($max=1, $min=0),
    ];
});
