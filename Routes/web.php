<?php

use Illuminate\Support\Facades\Route;

Route::match(['get', 'post'], 'isp/access', 'SubscriptionController@access');
