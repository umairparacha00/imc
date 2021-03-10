<?php

	/** @var Factory $factory */

	use App\ModelHasRole;
	use Faker\Generator as Faker;
	use Illuminate\Database\Eloquent\Factory;

	$factory->define(ModelHasRole::class, function (Faker $faker) {
		return [
			'role_id' => 11,
			'model_type' => 'App\User',
			'model_id' => 2,
		];
	});
