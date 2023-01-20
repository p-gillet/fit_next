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

$router->get('/', [
    'as' => 'profile', 'uses' => 'HomeController@index'
]);

$router->get('abonne/{id}', [
    'as' => 'profile', 'uses' => 'AbonneController@show'
]);

$router->get('adresse/create', [
    'as' => 'profile', 'uses' => 'AdresseController@create'
]);

$router->post('adresse', [
    'as' => 'profile', 'uses' => 'AdresseController@store'
]);

$router->get('adresses', [
    'as' => 'profile', 'uses' => 'AdresseController@index'
]);

$router->get('adresse/{id}', [
    'as' => 'profile', 'uses' => 'AdresseController@show'
]);