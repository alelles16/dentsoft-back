<?php
// Implements Laravel Routing tool
use Illuminate\Routing\Router;

$router->group(['namespace' => 'App\Controllers'], function (Router $router) {

    // Routes for users
    $router->get('/users', ['name' => 'users.index', 'uses' => 'UsersController@index']);
    $router->get('/user/{id}', ['name' => 'users.show', 'uses' => 'UsersController@show']);
    $router->post('/user', ['name' => 'users.store', 'uses' => 'UsersController@store']);
    $router->post('/user_consultory', ['name' => 'users.store_user_consultory', 'uses' => 'UsersController@store_user_consultory']);
    $router->put('/user/{id}', ['name' => 'users.update', 'uses' => 'UsersController@update']);
    $router->delete('/user/{id}', ['name' => 'users.delete', 'uses' => 'UsersController@delete']);

    // Routes for consultories
    $router->get('/consultories', ['name' => 'consultories.index', 'uses' => 'ConsultoriesController@index']);
    $router->get('/consultory/{id}', ['name' => 'consultories.show', 'uses' => 'ConsultoriesController@show']);
    $router->get('/consultory_user/{id}', ['name' => 'consultories.show_consultory_user', 'uses' => 'ConsultoriesController@show_consultory_user']);
    $router->post('/consultory', ['name' => 'consultories.store', 'uses' => 'ConsultoriesController@store']);
    $router->put('/consultory/{id}', ['name' => 'consultories.update', 'uses' => 'ConsultoriesController@update']);
    $router->delete('/consultory/{id}', ['name' => 'consultories.delete', 'uses' => 'ConsultoriesController@delete']);

    // Routes for patients
    $router->get('/patients', ['name' => 'patients.index', 'uses' => 'PatientsController@index']);
    $router->get('/patient/{id}', ['name' => 'patients.show', 'uses' => 'PatientsController@show']);
    $router->get('/patients_consultory/{id}', ['name' => 'patients.show_list_patients', 'uses' => 'PatientsController@show_list_patients']);
    $router->post('/patient', ['name' => 'patients.store', 'uses' => 'PatientsController@store']);
    $router->put('/patient/{id}', ['name' => 'patients.update', 'uses' => 'PatientsController@update']);
    $router->delete('/patient/{id}', ['name' => 'patients.delete', 'uses' => 'PatientsController@delete']);

    // Routes for dentists
    $router->get('/dentist', ['name' => 'dentists.index', 'uses' => 'DentistsController@index']);
    $router->get('/dentist/{id}', ['name' => 'dentists.show', 'uses' => 'DentistsController@show']);
    $router->get('/dentists_consultory/{id}', ['name' => 'dentists.show_list_dentists', 'uses' => 'DentistsController@show_list_dentists']);
    $router->post('/dentist', ['name' => 'dentists.store', 'uses' => 'DentistsController@store']);
    $router->put('/dentist/{id}', ['name' => 'dentists.update', 'uses' => 'DentistsController@update']);
    $router->delete('/dentist/{id}', ['name' => 'dentists.delete', 'uses' => 'DentistsController@delete']);

    // Routes for authentication
    $router->post('/login', ['name' => 'login', 'uses' => 'AuthController@login']);
    $router->post('/logout', ['name' => 'logout', 'uses' => 'AuthController@logout']);
    $router->get('/me', ['name' => 'me', 'uses' => 'AuthController@me']);
});