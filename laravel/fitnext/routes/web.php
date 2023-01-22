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
$router->get('/{tableName}/create/{keyName}', [
    'as' => 'profile', 'uses' => 'TableController@create'
]);
$router->post('/{tableName}/store/{keyName}', [
    'as' => 'profile', 'uses' => 'TableController@store'
]);

// Read
$router->get('/{tableName}', [
    'as' => 'profile', 'uses' => 'TableController@index'
]);

// Update
$router->get('/{tableName}/edit/{keyName}/{keyValue}', [
    'as' => 'profile', 'uses' => 'TableController@edit'
]);
$router->post('/{tableName}/update/{keyName}/{keyValue}', [
    'as' => 'profile', 'uses' => 'TableController@update'
]);

// Delete
$router->delete('/{tableName}/delete', [
    'as' => 'profile', 'uses' => 'TableController@delete'
]);

/* ------------- SQL views routing ------------- */

$router->get('/view/{viewName}', [
    'as' => 'profile', 'uses' => 'ViewController@index'
]);

/* ------------- Features routing ------------- */

$router->get('/features/addNewClient', [
    'as' => 'profile', 'uses' => 'AddNewClientController@index'
]);

$router->post('/features/addNewClient', [
    'as' => 'profile', 'uses' => 'AddNewClientController@store'
]);

$router->get('/features/organizeCourse/', [
    'as' => 'profile', 'uses' => 'OrganizeCourseController@index'
]);

$router->get('/features/organizeCourse/create', [
    'as' => 'profile', 'uses' => 'OrganizeCourseController@create'
]);

$router->get('/features/organizeCourse/edit/{numcours}', [
    'as' => 'profile', 'uses' => 'OrganizeCourseController@edit'
]);

$router->post('/features/organizeCourse/update/{numcours}', [
    'as' => 'profile', 'uses' => 'OrganizeCourseController@update'
]);

$router->post('/features/organizeCourse', [
    'as' => 'profile', 'uses' => 'OrganizeCourseController@store'
]);

$router->get('/features/subscribeClient', [
    'as' => 'profile', 'uses' => 'SubscribeClientController@index'
]);
