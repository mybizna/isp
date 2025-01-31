<?php

use Illuminate\Support\Facades\Route;
use Modules\Isp\Http\Controllers\IspController;


Route::get('isp/summary',[IspController::class,'summary'] );
Route::middleware('auth:sanctum')->group(function () {
    Route::get('isp/billingcycleselect',[IspController::class,'billingCycleSelect']  );
});
