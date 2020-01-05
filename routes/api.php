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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'employe'] , function (){
    Route::post('/create' , 'EmployesController@create');
    Route::post('/{id}/edit' , 'EmployesController@edit');
    Route::post('/{id}/delete' , 'EmployesController@destroy');
    Route::get('/' , 'EmployesController@index');
    Route::get('/{id}' , 'EmployesController@getById');
    Route::get('/{id}/pourcentages' , 'EmployesController@pourcentages');
});

Route::group(['prefix' => 'service'] , function (){
    Route::post('/create' , 'ServicesController@create');
    Route::post('/{id}/edit/' , 'ServicesController@edit');
    Route::post('/{id}/delete' , 'ServicesController@destroy');
    Route::get('/' , 'ServicesController@index');
    Route::get('/{id}' , 'ServicesController@getById');
    Route::get('/{id}/pourcentages' , 'ServicesController@pourcentages');
});

Route::group(['prefix' => 'pourcentage'] , function (){
    Route::post('/create' , 'PourcentagesController@create');
    Route::post('/{id}/edit' , 'PourcentagesController@edit');
    Route::post('/{id}/delete' , 'PourcentagesController@destroy');
    Route::get('/' , 'PourcentagesController@index');
    Route::get('/{id}' , 'PourcentagesController@getById');
    Route::get('/{id}/service' , 'PourcentagesController@service');
    Route::get('/{id}/employe' , 'PourcentagesController@employe');
});

Route::group(['prefix' => 'month'] , function (){
    Route::post('/create' , 'MonthsController@create');
    Route::post('/{id}/edit' , 'MonthsController@edit');
    Route::post('/{id}/delete' , 'MonthsController@destroy');
    Route::get('/' , 'MonthsController@index');
    Route::get('/{id}' , 'MonthsController@getById');
    Route::get('/{id}/days' , 'MonthsController@service');
});

Route::group(['prefix' => 'day'] , function (){
    Route::post('/create' , 'DaysController@create');
    Route::post('/{id}/edit' , 'DaysController@edit');
    Route::post('/{id}/delete' , 'DaysController@destroy');
    Route::get('/' , 'DaysController@index');
    Route::get('/{id}' , 'DaysController@getById');
    Route::get('/{id}/month' , 'DaysController@service');
});
