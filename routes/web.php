<?php


use Illuminate\Support\Facades\Auth;

Auth::routes();


    Route::get('docs','DocsController@auth');
    Route::get('docs/auth','DocsController@auth')->name('docs.auth');
    Route::get('docs/category','DocsController@category')->name('docs.category');
    Route::get('docs/question','DocsController@question')->name('docs.question');

    Route::get('pricing','PricingController@index')->name('pricing.index');

    Route::get('order/{id}','PaymentController@order')->name('payment.order');
    Route::post('payment/charge','PaymentController@charge')->name('payment.charge');
    Route::get('payment/{id}','PaymentController@index')->name('payment.index');






    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/home', 'HomeController@index');
    Route::resource('question','QuestionController');
    Route::resource('category','CategoryController');
    Route::resource('user','UserController');
    Route::resource('setting','SettingsController');
    Route::resource('plan','PlanController');
    Route::resource('plan_information','PlanInformationController');
    Route::get('question/create/{id}','QuestionController@create')->name('question.createInCategory');





