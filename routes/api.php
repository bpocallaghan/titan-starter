<?php

use App\Http\Controllers\Api\AnalyticsController;
use App\Http\Controllers\Api\NotificationsController;
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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

// notifications
Route::group(['prefix' => 'notifications',], function () {
    Route::post('/{user}', [NotificationsController::class, 'index']);
    Route::post('/{user}/unread', [NotificationsController::class, 'unread']);
    Route::post('/{user}/read/{notification}', [NotificationsController::class, 'read']);

    Route::post('/actions/latest', [NotificationsController::class, 'getLatestActions']);
});

// analytics
Route::group(['prefix' => 'analytics'], function () {
    Route::post('/keywords', [AnalyticsController::class, 'getKeywords']);
    Route::post('/visitors', [AnalyticsController::class, 'getVisitors']);
    Route::post('/browsers', [AnalyticsController::class, 'getBrowsers']);
    Route::post('/referrers', [AnalyticsController::class, 'getReferrers']);
    Route::post('/page-load', [AnalyticsController::class, 'getAvgPageLoad']);
    Route::post('/bounce-rate', [AnalyticsController::class, 'getBounceRate']);
    Route::post('/visited-pages', [AnalyticsController::class, 'getVisitedPages']);
    Route::post('/active-visitors', [AnalyticsController::class, 'getActiveVisitors']);
    Route::post('/unique-visitors', [AnalyticsController::class, 'getUniqueVisitors']);
    Route::post('/visitors-views', [AnalyticsController::class, 'getVisitorsAndPageViews']);
    Route::post('/visitors/locations', [AnalyticsController::class, 'getVisitorsLocations']);

    Route::post('/age', [AnalyticsController::class, 'getUsersAge']);
    Route::post('/devices', [AnalyticsController::class, 'getDevices']);
    Route::post('/gender', [AnalyticsController::class, 'getUsersGender']);
    Route::post('/device-category', [AnalyticsController::class, 'getDeviceCategory']);

    Route::post('/interests-other', [AnalyticsController::class, 'getInterestsOther']);
    Route::post('/interests-market', [AnalyticsController::class, 'getInterestsMarket']);
    Route::post('/interests-affinity', [AnalyticsController::class, 'getInterestsAffinity']);
});
