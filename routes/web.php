<?php

use Illuminate\Support\Facades\Route;
use Modules\Isp\Http\Controllers\IspController;

Route::match(['get', 'post'], '/isp/access', [IspController::class, 'access'])->name('isp_access')->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class]);
Route::get('/isp/profile', [IspController::class, 'profile'])->name('isp_profile')->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class]);
Route::get('isp/access/invoicecancel/{id?}', [IspController::class, 'invoicecancel'])->name('isp_access_invoicecancel')->where('id', '[0-9]+')->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class]);
Route::get('isp/access/invoicebuy/{id?}', [IspController::class, 'invoicebuy'])->name('isp_access_invoicebuy')->where('id', '[0-9]+')->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class]);
Route::get('isp/access/buypackage/{id?}', [IspController::class, 'buypackage'])->name('isp_access_buypackage')->where('id', '[0-9]+')->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class]);
Route::get('isp/access/error', [IspController::class, 'error'])->name('isp_access_error')->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class]);
Route::get('isp/access/canceled', [IspController::class, 'canceled'])->name('isp_access_canceled')->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class]);
Route::get('isp/access/thankyou', [IspController::class, 'thankyou'])->name('isp_access_thankyou')->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class]);
Route::get('isp/access/login', [IspController::class, 'login'])->name('isp_access_login')->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class]);
Route::get('isp/access/buyform', [IspController::class, 'buyform'])->name('isp_access_buyform')->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class]);
Route::match(['get', 'post'], 'isp/access/savebuyform', [IspController::class, 'savebuyform'])->name('isp_access_savebuyform')->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class]);
Route::match(['get', 'post'], 'isp/access/savelogin', [IspController::class, 'savelogin'])->name('isp_access_savelogin')->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class]);

Route::get('isp/access/mikrotiklogin', [IspController::class, 'mikrotikLogin'])->name('isp_access_mikrotik_login')->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class]);

Route::get('/isp/access/autosubscribe', [IspController::class, 'autosubscribe'])->name('isp_access_autosubscribe')->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class]);
