<?php

use Illuminate\Support\Facades\Route;

Route::match(['get', 'post'], '/isp/access', 'SubscriptionController@access')->name('isp_access')->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class]);
Route::get('/isp/profile', 'SubscriptionController@profile')->name('isp_profile')->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class]);
Route::get('isp/access/invoicecancel/{id?}', 'SubscriptionController@invoicecancel')->name('isp_access_invoicecancel')->where('id', '[0-9]+')->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class]);
Route::get('isp/access/invoicebuy/{id?}', 'SubscriptionController@invoicebuy')->name('isp_access_invoicebuy')->where('id', '[0-9]+')->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class]);
Route::get('isp/access/buypackage/{id?}', 'SubscriptionController@buypackage')->name('isp_access_buypackage')->where('id', '[0-9]+')->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class]);
Route::get('isp/access/error', 'SubscriptionController@error')->name('isp_access_error')->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class]);
Route::get('isp/access/canceled', 'SubscriptionController@canceled')->name('isp_access_canceled')->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class]);
Route::get('isp/access/thankyou', 'SubscriptionController@thankyou')->name('isp_access_thankyou')->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class]);
Route::get('isp/access/buyform', 'SubscriptionController@buyform')->name('isp_access_buyform')->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class]);
Route::match(['get', 'post'],'isp/access/savebuyform', 'SubscriptionController@savebuyform')->name('isp_access_savebuyform')->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class]);

Route::get('isp/access/mikrotiklogin', 'SubscriptionController@mikrotikLogin')->name('isp_access_mikrotik_login')->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class]);

Route::get('/isp/access/autosubscribe', 'SubscriptionController@autosubscribe')->name('isp_access_autosubscribe')->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class]);
