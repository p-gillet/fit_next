<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

/* ------------- Index ------------- */
$router->get('/', [
    'as' => 'profile', 'uses' => 'HomeController@index'
]);

/* ------------- SQL tables routing ------------- */
// Create
$router->get('/{tableName}/create', [
    'as' => 'profile', 'uses' => 'TableController@create'
]);
$router->post('/{tableName}/store', [
    'as' => 'profile', 'uses' => 'TableController@store'
]);

// Read
$router->get('/{tableName}', [
    'as' => 'profile', 'uses' => 'TableController@index'
]);

// Update
$router->get('/{tableName}/edit', [
    'as' => 'profile', 'uses' => 'TableController@edit'
]);
$router->patch('/{tableName}/update', [
    'as' => 'profile', 'uses' => 'TableController@update'
]);

// Delete
$router->delete('/{tableName}/delete', [
    'as' => 'profile', 'uses' => 'TableController@delete'
]);

$router->get('adresse/{id}', [
    'as' => 'profile', 'uses' => 'AdresseController@show'
]);