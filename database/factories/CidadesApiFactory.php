<?php

use App\CidadesApi;
use Illuminate\Support\Str;

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

$factory->define(CidadesApi::class, function () {
    return [
        'city_id' => '',
        'name' => '',
        'country' => '',
        'coord_lon' => '',
        'coord_lat' => '',
    ];
});
