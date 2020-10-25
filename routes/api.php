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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->get('/athentificated', function () {
    return true;
});

Route::middleware('auth:sanctum')->get('/athentificated', function () {
    return true;
});



Route::post('/register','UserController@register');
Route::post('/sign-in-user','UserController@login');
Route::post('/logout','UserController@logout');
Route::post('/forgot','ForgotController@forgot');
Route::post('/reset','ForgotController@reset');
Route::post('/send-email-confirm','ConfirmemailController@SendEmailConfirm');
Route::post('/confirm-email','ConfirmemailController@ConfirmEmail');
Route::get('/glsid-condidacies','AdminController@glsidCondidacies');
