<?php

use App\Http\Controllers\Admin\Accounts\ClearingAgentsController;
use App\Http\Controllers\Admin\Accounts\ClientsController;
use App\Http\Controllers\Admin\Accounts\DriversController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LatestActivities\LatestActivitiesController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\Settings\BusinessesController;
use App\Http\Controllers\Admin\Settings\LocationsController;
use App\Http\Controllers\Admin\Settings\NavigationOrderController;
use App\Http\Controllers\Admin\Settings\NavigationsController;
use App\Http\Controllers\Admin\Settings\RolesController;
use Illuminate\Support\Facades\Route;

/*
|------------------------------------------
| Admin (when authorized and admin)
|------------------------------------------
*/
Route::group(['middleware' => ['auth', 'auth.admin'], 'prefix' => 'admin'], function () {
    Route::get('/', [DashboardController::class, 'index']);

    // profile
    Route::get('/profile', [ProfileController::class, 'index']);
    Route::put('/profile/{user}', [ProfileController::class, 'update']);

    // accounts
    Route::group(['prefix' => 'accounts'], function () {
        // clients
        Route::resource('clients', ClientsController::class);

        Route::resource('drivers', DriversController::class)->parameters([
            'drivers' => 'user'
        ]);
        Route::resource('clearing-agents', ClearingAgentsController::class)->parameters([
            'clearing-agents' => 'user'
        ]);

        // users
        Route::get('administrators', 'AdministratorsController@index');
        Route::delete('administrators', 'AdministratorsController@destroy');
    });

    // history
    Route::group(['prefix' => 'activities'], function () {
        Route::get('/', [LatestActivitiesController::class, 'website']);
        Route::get('/admin', [LatestActivitiesController::class, 'admin']);
        Route::get('/website', [LatestActivitiesController::class, 'website']);
    });

    // settings
    Route::group(['prefix' => 'settings'], function () {
        Route::resource('roles', RolesController::class);

        Route::resource('businesses', BusinessesController::class);

        Route::resource('locations', LocationsController::class);

        // navigation
        Route::get('navigations/order', [NavigationOrderController::class, 'index']);
        Route::post('navigations/order', [NavigationOrderController::class, 'updateOrder']);
        Route::resource('navigations', NavigationsController::class);
    });
});
