<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Services;
use Faker\Generator as Faker;

$factory->define(Services::class, function (Faker $faker) {
    return [
		'name' => '1k_youtube_subscribers',
		'price' => 0,
    ];
});
