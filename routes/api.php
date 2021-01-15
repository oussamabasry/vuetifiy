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

Route::get('/condidat','UserController@index');
Route::post('/update','UserController@bdate');
Route::post('/glsid','UserController@glsid');
Route::post('/gil','UserController@gil');
Route::post('/seer','UserController@seer');
Route::post('/gecsii','UserController@gecsi');
Route::post('/gmsi','UserController@gmsi');
Route::post('/condidacies','UserController@bdcc');
Route::post('/user_profils','UserController@store');
Route::post('/storage/app/CV','UserController@savefile');
Route::post('/storage/app/public','UserController@savefilee');
Route::post('/storage/app/cnir','UserController@savecnir');
Route::post('/storage/app/cniv','UserController@savecniv');
Route::post('/storage/app/r1','UserController@saver1');
Route::post('/storage/app/r2','UserController@saver2');
Route::post('/storage/app/r3','UserController@saver3');
Route::post('/storage/app/r4','UserController@saver4');
Route::post('/storage/app/dp','UserController@savedp');
Route::post('/register','UserController@register');
Route::post('/sign-in-user','UserController@login');
Route::post('/forgot','ForgotController@forgot');
Route::post('/reset','ForgotController@reset');
Route::post('/send-email-confirm','ConfirmemailController@SendEmailConfirm');
Route::post('/confirm-email','ConfirmemailController@ConfirmEmail');
Route::get('/sendmail','EmailController@sendAcceptedMail');


