<?php

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
Route::group(['middleware' => 'api', 'guard' => 'api'], function ($router) {

    Route::group(['prefix' => 'auth'], function ($router) {
        Route::post('login', 'Api\AuthController@login');
        Route::post('logout', 'Api\AuthController@logout');
        Route::post('refresh', 'Api\AuthController@refresh');
        Route::post('me', 'Api\AuthController@me');
        Route::post('register','Api\AuthController@register');
    });

    Route::group(['prefix' => 'question'], function ($router) {
        Route::post('/','Api\QuestionController@index');
        Route::post('/{random}','Api\QuestionController@index');
        Route::post('/{id}','Api\QuestionController@show');
    });

    Route::group(['prefix' => 'category'], function ($router) {
        Route::post('/questions','Api\QuestionController@questionsFromCategories');
        Route::post('/','Api\QuestionController@categoryAll');
        Route::post('/{id}','Api\QuestionController@questionsFromCategory');
        Route::post('/{id}/{all}','Api\QuestionController@questionsFromCategory');
        Route::post('/{id}/questions','Api\QuestionController@questionsFromCategory');

    });


});
