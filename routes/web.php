<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/




Auth::routes();

Route::group(["middleware" => "web"], function () {
    Route::get('docs','DocsController@auth');
    Route::get('docs/auth','DocsController@auth')->name('docs.auth');
    Route::get('docs/category','DocsController@category')->name('docs.category');
    Route::get('docs/question','DocsController@question')->name('docs.question');

    Route::get('pricing','PricingController@index')->name('pricing.index');
});



Route::group(["middleware" => "login"], function () {

    Route::get('/', 'HomeController@index')->name('home');
    Route::resource('question','QuestionController');
    Route::resource('category','CategoryController');
    Route::resource('user','UserController');
    Route::resource('setting','SettingsController');
    Route::resource('plan','PlanController');
    Route::resource('plan_information','PlanInformationController');
    Route::get('question/create/{id}','QuestionController@create')->name('question.createInCategory');


});
