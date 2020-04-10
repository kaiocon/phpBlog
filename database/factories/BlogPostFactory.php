<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\blogPost;
use Faker\Generator as Faker;

$factory->define(blogPost::class, function (Faker $faker) {
    return [
        'postTitle' => $faker->sentence,
		'postSummary' => $faker->sentence,
		'postBody' => $faker->paragraph,
		'postTime' => $faker->dateTimeThisYear->format('Y-m-d H:i:s'),
    ];
});
