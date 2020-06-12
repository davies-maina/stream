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

use Stream\Http\Controllers\VideoController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('channels', 'ChannelController');

Route::get('videos/{video}', [VideoController::class, 'show']);

Route::put('/video/{video}', 'VideoController@updateviews');

Route::group(['middleware' => ['auth']], function () {
    Route::post('channels/{channel}/videos', 'UploadVideoController@store');


    Route::get('channels/{channel}/videos', 'UploadVideoController@index')->name('channels.upload');
    Route::resource('channels/{channel}/subscriptions', 'SubscriptionController')->only(['store', 'destroy']);
});
