<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/
    
$factory->define(App\User::class, function (Faker\Generator $faker) {
    $response = json_decode(file_get_contents('https://randomuser.me/api/?login&exc=gender,name,location,email,registered,dob,phone,cell,id,picture,nat'));
    
    while (\App\Providers\CheckDuplicateServiceProvider::checkUserDuplicate( $response->results[0]->login->username, 'username')){
        $response = json_decode(file_get_contents('https://randomuser.me/api/?login&exc=gender,name,location,email,registered,dob,phone,cell,id,picture,nat'));
    }
    
    return [
        'username' => $response->results[0]->login->username,
        'email' => $faker->safeEmail,
        'password' => bcrypt('12345678'),
        'remember_token' => str_random(10),
        'company_name' => str_random(10)
    ];
    
});


