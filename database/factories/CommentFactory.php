<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use App\Comment;

$factory->define(Comment::class, function (Faker $faker) {
    return [
        'content' => $faker->asciify('********************'),
        //'evaluation' => $faker->numberBetween($min=1, $max=5),
        
    ];
});
