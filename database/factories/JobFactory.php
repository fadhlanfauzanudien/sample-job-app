<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Job;
use Faker\Generator as Faker;

$factory->define(Job::class, function (Faker $faker) {
    return [
        'title' => $faker->jobTitle,
        'company' => $faker->company,
        'description' => $faker->paragraphs(3, true),
        'city' => $faker->city,
        'status' => 'show',
    ];
});
