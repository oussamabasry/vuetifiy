<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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



Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
    Route::post('/accept','AdminController@acceptCondidacie');
    Route::post('/refuse','AdminController@refuseCondidacie');
    Route::get('condidacies','AdminController@condidacies');    
});


Route::post('/register','UserController@register');
Route::post('/sign-in-user','UserController@login');
Route::post('/forgot','ForgotController@forgot');
Route::post('/reset','ForgotController@reset');
Route::post('/send-email-confirm','ConfirmemailController@SendEmailConfirm');
Route::post('/confirm-email','ConfirmemailController@ConfirmEmail');
Route::get('/sendmail','EmailController@sendAcceptedMail');


