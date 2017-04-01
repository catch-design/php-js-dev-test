<?php

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

$app->get('/', function () use ($app) {
    return view('home');
});


$app->group(['namespace' => 'App\Http\Controllers'], function () use ($app) {
    $app->get('customers', 'CustomerCtrl@index');
    $app->get('customer/{id}', 'CustomerCtrl@getCustomer');
    $app->post('customer', 'CustomerCtrl@createCustomer');
    $app->put('customer/{id}', 'CustomerCtrl@updateCustomer');
    $app->delete('customer/{id}', 'CustomerCtrl@deleteCustomer');
});