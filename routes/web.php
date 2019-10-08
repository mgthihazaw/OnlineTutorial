<?php

use App\Series;

Route::get('/', function () {

    $featureSeries = Series::take(3)->latest()->get();
    return view('front')->withSeries($featureSeries);
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/series','SeriesController');

Route::get('/series/{series}/episodes/{episodeNumber}','SeriesController@episode')->name('series.episodes')->middleware(['auth','check-subscription']);


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});


Route::get('payment','PaymentController@payment');
Route::post('subscribe','PaymentController@subscribe');