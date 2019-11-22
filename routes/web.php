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
use Illuminate\Support\Facades\Mail;

Route::get('/', function () {
    return view('welcome');
});
Route::view('/bulksms', 'bulksms');
Route::post('/bulksms', 'BulkSmsController@sendSms');

Route::get('/email', function () {
    try {
        Mail::raw('welcome', function ($message) {
            $message->to('zluifer21@gmail.com', 'John Doe')->subject('Welcome!');
        });
        return "Exito";
    }catch (\Exception $e) {

        return $e->getMessage();
    }
});