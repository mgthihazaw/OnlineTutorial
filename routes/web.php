<?php

use App\Series;

Route::get('/', function () {

    $featureSeries = Series::take(3)->latest()->get();
    return view('front')->withSeries($featureSeries);
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/series','SeriesController');
