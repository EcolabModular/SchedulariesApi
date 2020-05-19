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

$router->get('/schedularies','SchedularyController@index');
$router->post('/schedularies','SchedularyController@store');
$router->get('/itemschedulary/{item}','SchedularyController@itemSchedulary');
$router->get('/schedularies/{schedulary}','SchedularyController@show');
$router->put('/schedularies/{schedulary}','SchedularyController@update');
$router->patch('/schedularies/{schedulary}','SchedularyController@update');
$router->delete('/schedularies/{schedulary}','SchedularyController@destroy');
