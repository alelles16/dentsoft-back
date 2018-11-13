<?php
// Implements Laravel Routing tool
use Illuminate\Routing\Router;

$router->group(['namespace' => 'App\Controllers'], function (Router $router) {

    // Routes for users
    $router->get('/users', ['name' => 'users.index', 'uses' => 'UsersController@index']);
    $router->get('/user/{id}', ['name' => 'users.show', 'uses' => 'UsersController@show']);
    $router->post('/user', ['name' => 'users.store', 'uses' => 'UsersController@store']);
    $router->put('/user/{id}', ['name' => 'users.update', 'uses' => 'UsersController@update']);
    $router->delete('/user/{id}', ['name' => 'users.delete', 'uses' => 'UsersController@delete']);

    // Routse for consultories
    $router->get('/consultories', ['name' => 'consultories.index', 'uses' => 'ConsultoriesController@index']);
    $router->get('/consultory/{id}', ['name' => 'consultories.show', 'uses' => 'ConsultoriesController@show']);
    $router->post('/consultory', ['name' => 'consultories.store', 'uses' => 'ConsultoriesController@store']);
    $router->put('/consultory/{id}', ['name' => 'consultories.update', 'uses' => 'ConsultoriesController@update']);
    $router->delete('/consultory/{id}', ['name' => 'consultories.delete', 'uses' => 'ConsultoriesController@delete']);

    // Routes for patients
    $router->get('/patients', ['name' => 'patients.index', 'uses' => 'PatientsController@index']);
    $router->get('/patient/{id}', ['name' => 'patients.show', 'uses' => 'PatientsController@show']);
    $router->post('/patient', ['name' => 'patients.store', 'uses' => 'PatientsController@store']);
    $router->put('/patient/{id}', ['name' => 'patients.update', 'uses' => 'PatientsController@update']);
    $router->delete('/patient/{id}', ['name' => 'patients.delete', 'uses' => 'PatientsController@delete']);

    // Routes for dentists
    $router->get('/dentist', ['name' => 'dentists.index', 'uses' => 'DentientsController@index']);
    $router->get('/dentient/{id}', ['name' => 'dentists.show', 'uses' => 'DentientsController@show']);
    $router->post('/dentient', ['name' => 'dentists.store', 'uses' => 'DentientsController@store']);
    $router->put('/dentient/{id}', ['name' => 'dentists.update', 'uses' => 'DentientsController@update']);
    $router->delete('/dentient/{id}', ['name' => 'dentists.delete', 'uses' => 'DentientsController@delete']);

    // Routes for authentication
    $router->post('/login', ['name' => 'login', 'uses' => 'AuthController@login']);
});