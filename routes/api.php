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
        Route::post('login', 'Api\AuthController@login')->name('api.login');
        Route::post('logout', 'Api\AuthController@logout')->name('api.logout');
        Route::post('refresh', 'Api\AuthController@refresh')->name('api.refresh');
        Route::post('me', 'Api\AuthController@me')->name('api.profile');
        Route::post('register','Api\AuthController@register')->name('api.register');
    });

    Route::group(['prefix' => 'question'], function ($router) {
        Route::any('/','Api\QuestionController@index')->name('api.questions.all');
        Route::any('/{with_sub_questions}','Api\QuestionController@index')->name('api.questions.with_sub_questions');
        Route::any('/{random}','Api\QuestionController@index')->name('api.questions.random');
        Route::any('/random/with_sub_questions','Api\QuestionController@random_with_sub_questions')->name('api.questions.random.with_sub_questions');
        Route::any('/{id}/get','Api\QuestionController@show')->name('api.question');
        Route::any('/{id}/{sub_questions}','Api\QuestionController@sub_questions')->name('api.sub_questions');
    });

    Route::group(['prefix' => 'category'], function ($router) {
        Route::any('/questions','Api\QuestionController@questionsFromCategories')->name('api.categories.questions');
        Route::any('/','Api\QuestionController@categoryAll')->name('api.categories.all');
        Route::any('/{id}','Api\QuestionController@questionsFromCategory')->name('api.category.questions');
        Route::any('/{id}/{random}','Api\QuestionController@questionsFromCategory')->name('api.category.questions.random');
    });

    Route::group(['prefix' => 'answer'], function ($router) {
        Route::any('/','Api\AnswerController@answer')->name('api.answer');
    });


});
