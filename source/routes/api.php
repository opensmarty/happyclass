<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//php artisan make:controller App\\Api\\Controllers\\Auth\\RegisterController

$api = app('Dingo\Api\Routing\Router');
$api->version('v1', function ($api) {

    $api->group(['namespace' => 'App\Api\Controllers'], function ($api) {
        $api->get('token', 'UsersController@token');
        $api->post('login', 'Auth\LoginController@login');
        $api->post('register', 'Auth\RegisterController@register');

        $api->group(['middleware' => ['jwt.auth']], function ($api) {

            $api->get('logout','Auth\LoginController@logout');
            // Rate: 100 requests per 5 minutes
            $api->group(['middleware' => ['api.throttle'], 'limit' => 100, 'expires' => 5], function ($api) {
//                $api->resource('users','UsersController');
                 //users
                $api->group(['prefix' => 'user'], function ($api) {
                    $api->get('/', 'UsersController@index');
                    $api->post('/', 'UsersController@store');
                    $api->get('/me', 'UsersController@me');
                    $api->get('/{id}', 'UsersController@show');
                    $api->put('/{id}', 'UsersController@update');
                    $api->delete('/{id}', 'UsersController@destroy');
                });
            });
        });

        $api->get('refresh', 'UsersController@refresh');

    });
});

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});