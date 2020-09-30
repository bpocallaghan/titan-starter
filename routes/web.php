<?php

use App\Http\Controllers\App\AppController;
use App\Http\Controllers\Website\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::redirect('/home', '/');

/*
|------------------------------------------
| Authenticate User
|------------------------------------------
*/
Route::group(['prefix' => 'auth'], function () {
    Auth::routes(['verify' => true]);

    // Route::any('logout', 'Auth\LoginController@logout')->name('logout');
});

/*
|------------------------------------------
| WEBSITE / PUBLIC
|------------------------------------------
*/
// Route::group('website', function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
// });
