<?php

use Carbon\Factory;
use Illuminate\Database\Seeder;

class TestimonialTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Factory(App\Testimonial::class,8)->create();
    }
}
