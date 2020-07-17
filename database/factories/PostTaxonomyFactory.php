<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\PostTaxonomy;
use Faker\Generator as Faker;

$factory->define(PostTaxonomy::class, function (Faker $faker) {
    return [
        'post_id' => $faker->numberBetween(1, 10),
        'taxonomy_id' => $faker->numberBetween(1, 10),
    ];
});
