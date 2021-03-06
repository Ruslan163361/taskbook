<?php
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

$factory->define(App\Task::class, function (Faker $faker) {
    return [
        'task' => $faker->name,
        'autor' => $faker->name,
        'status' => random_init(1,2,3,4),
    ];
});

?>