<?php

use Illuminate\Support\Facades\Route;

Route::get('isp/summary', 'SubscriptionController@summary');
Route::middleware('auth:sanctum')->group(function () {
Route::get('isp/billingcycleselect', 'SubscriptionController@billingCycleSelect');

});