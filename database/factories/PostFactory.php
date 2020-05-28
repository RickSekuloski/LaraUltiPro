<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        //
        //'user_id' => $faker->randomDigitNot(5),
        'title' => $faker->sentence(),
        'body' => $faker->paragraphs(rand(1,5),true),
    ];
});
