<?php

use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::get('/isp/access', 'SubscriptionController@access')->name('isp_access');
    Route::get('isp/access/invoicecancel/{id?}', 'SubscriptionController@invoicecancel')->name('isp_access_invoicecancel')->where('id', '[0-9]+');
    Route::get('isp/access/invoicebuy/{id?}', 'SubscriptionController@invoicebuy')->name('isp_access_invoicebuy')->where('id', '[0-9]+');
    Route::get('isp/access/packages', 'SubscriptionController@packages')->name('isp_access_packages');
    Route::get('isp/access/buypackage/{id?}', 'SubscriptionController@buypackage')->name('isp_access_buypackage')->where('id', '[0-9]+');
    Route::post('isp/access/paybill', 'SubscriptionController@paybill')->name('isp_access_paybill');
    Route::post('isp/access/tillno', 'SubscriptionController@tillno')->name('isp_access_tillno');
    Route::post('isp/access/stkpush', 'SubscriptionController@stkpush')->name('isp_access_stkpush');
    Route::get('isp/access/payment', 'SubscriptionController@payment')->name('isp_access_payment');
    Route::get('isp/access/thankyou', 'SubscriptionController@thankyou')->name('isp_access_thankyou');
});
