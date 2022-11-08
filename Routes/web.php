<?php

use Illuminate\Support\Facades\Route;

Route::get( '/isp/access', 'SubscriptionController@access')->name('isp_access');
Route::post( 'isp/access/login', 'SubscriptionController@login')->name('isp_access_login');
Route::post( 'isp/access/submitlogin', 'SubscriptionController@submitlogin')->name('isp_access_submitlogin');
Route::post( 'isp/access/register', 'SubscriptionController@register')->name('isp_access_register');
Route::post( 'isp/access/submitregister', 'SubscriptionController@submitregister')->name('isp_access_submitregister');
Route::post( 'isp/access/invoicecancel', 'SubscriptionController@invoicecancel')->name('isp_access_invoicecancel');
Route::post( 'isp/access/invoicebuy', 'SubscriptionController@invoicebuy')->name('isp_access_invoicebuy');
Route::post( 'isp/access/packages', 'SubscriptionController@packages')->name('isp_access_packages');
Route::post( 'isp/access/singlepackage', 'SubscriptionController@singlepackage')->name('isp_access_singlepackage');
Route::post( 'isp/access/paybill', 'SubscriptionController@paybill')->name('isp_access_paybill');
Route::post( 'isp/access/tillno', 'SubscriptionController@tillno')->name('isp_access_tillno');
Route::post( 'isp/access/stkpush', 'SubscriptionController@stkpush')->name('isp_access_stkpush');
Route::post( 'isp/access/payment', 'SubscriptionController@payment')->name('isp_access_payment');
Route::post( 'isp/access/thankyou', 'SubscriptionController@thankyou')->name('isp_access_thankyou');
