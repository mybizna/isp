<?php

use Illuminate\Support\Facades\Route;

Route::match(['get', 'post'], '/isp/access', 'SubscriptionController@access')->name('isp_access');
Route::get('/isp/profile', 'SubscriptionController@profile')->name('isp_profile');

Route::middleware('auth')->group(function () {
    Route::get('isp/access/invoicecancel/{id?}', 'SubscriptionController@invoicecancel')->name('isp_access_invoicecancel')->where('id', '[0-9]+');
    Route::get('isp/access/invoicebuy/{id?}', 'SubscriptionController@invoicebuy')->name('isp_access_invoicebuy')->where('id', '[0-9]+');
    Route::get('isp/access/buypackage/{id?}', 'SubscriptionController@buypackage')->name('isp_access_buypackage')->where('id', '[0-9]+');
    Route::get('isp/access/canceled', 'SubscriptionController@canceled')->name('isp_access_canceled');
    Route::get('isp/access/thankyou', 'SubscriptionController@thankyou')->name('isp_access_thankyou');
    Route::get('isp/access/mikrotiklogin', 'SubscriptionController@mikrotikLogin')->name('isp_access_mikrotik_login');

    Route::get('/isp/access/autosubscribe', 'SubscriptionController@autosubscribe')->name('isp_access_autosubscribe');

});
