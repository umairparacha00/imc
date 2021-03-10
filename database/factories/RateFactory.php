<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Rate;
use Faker\Generator as Faker;

$factory->define(Rate::class, function (Faker $faker) {
    return [
		'name' => 'pin_creation',
		'rate' => 0.26
    ];
});
