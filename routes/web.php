<?php




Auth::routes();

Route::group(["middleware" => "web"], function () {
    Route::get('docs','DocsController@auth');
    Route::get('docs/auth','DocsController@auth')->name('docs.auth');
    Route::get('docs/category','DocsController@category')->name('docs.category');
    Route::get('docs/question','DocsController@question')->name('docs.question');

    Route::get('pricing','PricingController@index')->name('pricing.index');

    Route::get('order/{id}','PaymentController@order')->name('payment.order');
    Route::get('payment/{id}','PaymentController@index')->name('payment.index');
    Route::post('payment/charge','PaymentController@charge')->name('payment.charge');
    Route::post('sign','PaymentController@sign')->name('payment.sign');
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


