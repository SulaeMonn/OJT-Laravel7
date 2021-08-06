<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;
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

$factory->define(User::class, function (Faker $faker) {

 return[
  'name' => $faker->name,
  'email' => $faker->unique()->safeEmail,
  'email_verified_at' => now(),
  'password' => Hash::make('12345678'), // password
  'type' => 'admin',
  'phone' => $faker->phoneNumber,
  'dob' => $faker->dateTimeThisCentury->format('Y-m-d'),
  'address' => $faker->address,
  'profile' => 'ilya-mirnyy-wk_PY_gsEB8-unsplash.jpg',
  'created_user_id' => rand(1,5),
  'remember_token' => Str::random(10),
 ];
   
});
