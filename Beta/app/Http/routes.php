<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::auth();

Route::get('/', function () {
    
    return view('welcome');
});

Route::get('/login', function () {
    
    return view('welcome')->with('error', 'Je hebt een account nodig om toegang te krijgen tot deze pagina!');
});

Route::post('/profile', 'SessionController@create');

Route::post('/register', 'RegistrationController@store');

Route::get('/social/{provider}', 'Auth\AuthController@redirectToProvider');

Route::get('/social/{provider}/callback', 'Auth\AuthController@handleProviderCallback');

Route::group(['middleware' => 'auth'], function () {
    
    Route::get('/profile', function() {
        
        return view('/profile');
    });
    Route::put('/profile', 'UserController@update');
    Route::get('/profile/{id}', 'UserController@show');
    
    Route::get('/users/{id}/add', 'FriendsController@store');
    Route::get('/users/{received_user_id}/delete', 'FriendsController@delete');
    Route::get('/users/{requested_user_id}/update', 'FriendsController@update');
    Route::get('/users/{next}/{limit}', 'UsersController@getUsers');
    
    Route::get('/{workingStatus}/start-assignment/{id}', 'UserAssignmentsController@create');
    
    Route::get('/{workingStatus}', 'AssignmentsController@show');
    
    Route::get('/logout', 'SessionController@destroy');
    
    Route::get('/learning/updateAssignment', 'UserAssignmentsController@updateUserAssignment');
    
    Route::get('/getfriends/{userid}/{next}', 'FriendsController@getFriends');
});


