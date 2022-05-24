<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Media;
use Carbon\Carbon;
use Faker\Generator as Faker;

$factory->define(Media::class, function (Faker $faker) {

    $arrayValues = ['game', 'movie', 'serie'];
    $strForNameAndOfficialTitle = $faker->name;

    return [
        'name' => $strForNameAndOfficialTitle,
        'official_title' => $strForNameAndOfficialTitle,
        'type_of_media' => $arrayValues[rand(0,2)],
        'release_date' => Carbon::now(),
    ];
});
