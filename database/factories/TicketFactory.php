<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\ticket;
use Faker\Generator as Faker;

use App\town;
use App\company;

$factory->define(ticket::class, function (Faker $faker) {
    return [
        'from_id' => town::all()->random()->id,
        'to_id' => town::all()->random()->id,
        'company_id' => company::all()->random()->id,
        'depart_time' => $faker->dateTimeBetween('-1 week', '+1 week'),
        'price' => $faker->numberBetween(100, 500),
        'available' => random_int(0, 1)
    ];
});
