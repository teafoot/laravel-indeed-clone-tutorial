<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Categoria;
use App\Experiencia;
use App\Salario;
use App\Ubicacion;
use App\User;
use App\Vacante;
use Illuminate\Support\Str;
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

$factory->define(Vacante::class, function (Faker $faker) {
    return [
        'titulo' => $faker->sentence(2), // Str::random(10)
        'imagen' => '1620101800.jpg',
        'descripcion' => $faker->realText(rand(80, 600)),
        'skills' => 'HTML5,CSS3',
        'activa' => $faker->boolean(50),
        'categoria_id' => function () {
            return Categoria::inRandomOrder()->first()->id;// Get random category id
        },//$faker->numberBetween(min, max),
        'experiencia_id' => function () {
            return Experiencia::inRandomOrder()->first()->id;
        },
        'ubicacion_id' =>  function () {
            return Ubicacion::inRandomOrder()->first()->id;
        },
        'salario_id' =>  function () {
            return Salario::inRandomOrder()->first()->id;
        },
        'user_id' => function () {
            return User::inRandomOrder()->first()->id;
        },
        'created_at' => $faker->dateTimeBetween('-1 year', 'now'),
        'updated_at' => now(),
    ];
});
