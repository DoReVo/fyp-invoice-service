<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Invoice;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
 */

$factory->define(Invoice::class, function (Faker $faker) {
    return [
        'customer_id' => $faker->numberBetween(1, 3),
        'date' => $faker->dateTimeThisYear(),
        'isPaid' => false,
        'payment_id' => null,

    ];
});
