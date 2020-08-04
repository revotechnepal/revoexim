<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Setting;
use Faker\Generator as Faker;

$factory->define(Setting::class, function (Faker $faker) {
    return [
        //
        'site_name'=>'Revo Exim',
        'site_logo'=>'logo.png',
        'site_favicon'=>'favicon.png',
        'email'=>'exim@gmail.com',
        'phone'=>'+977-9847212520',
        'facebook'=>'https://www.facebook.com/Revo-Exim-pvtltd-444332969642359',
        'twitter'=>'',
        'linkedin'=>'',
        'instagram'=>'',
        'youtube'=>'',
        'about'=>$faker->sentence(),
        'service'=>$faker->sentence(),
        'address'=>'Ravibhawan-14, Kathmandu',
    ];
});
