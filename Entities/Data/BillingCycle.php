<?php

namespace Modules\Isp\Entities\Data;

use Modules\Base\Classes\Datasetter;
use Illuminate\Support\Facades\DB;

class BillingCycle
{

    public $ordering = 1;

    public function data(Datasetter $datasetter)
    {
        $datasetter->add_data('isp', 'billing_cycle', 'slug', [
            "title" => "10 Minute",
            "description" => "10 Minute",
            "slug" => "10-minute",
            "duration_type" => "minute",
            "duration" => 10,
            "published" => true
        ]);

        $datasetter->add_data('isp', 'billing_cycle', 'slug', [
            "title" => "20 Minute",
            "description" => "20 Minute",
            "slug" => "20-minute",
            "duration_type" => "minute",
            "duration" => 20,
            "published" => true
        ]);

        $datasetter->add_data('isp', 'billing_cycle', 'slug', [
            "title" => "30 Minute",
            "description" => "30 Minute",
            "slug" => "30-minute",
            "duration_type" => "minute",
            "duration" => 30,
            "published" => true
        ]);

        $datasetter->add_data('isp', 'billing_cycle', 'slug', [
            "title" => "1 Hour",
            "description" => "1 Hour",
            "slug" => "1-hour",
            "duration_type" => "hour",
            "duration" => 1,
            "published" => true
        ]);

        $datasetter->add_data('isp', 'billing_cycle', 'slug', [
            "title" => "6 Hour",
            "description" => "6 Hour",
            "slug" => "6-hour",
            "duration_type" => "hour",
            "duration" => 6,
            "published" => true
        ]);

        $datasetter->add_data('isp', 'billing_cycle', 'slug', [
            "title" => "12 Hour",
            "description" => "12 Hour",
            "slug" => "12-hour",
            "duration_type" => "hour",
            "duration" => 12,
            "published" => true
        ]);

        $datasetter->add_data('isp', 'billing_cycle', 'slug', [
            "title" => "1 Day",
            "description" => "1 Day",
            "slug" => "1-day",
            "duration_type" => "day",
            "duration" => 1,
            "published" => true
        ]);

        $datasetter->add_data('isp', 'billing_cycle', 'slug', [
            "title" => "2 Day",
            "description" => "2 Day",
            "slug" => "2-day",
            "duration_type" => "day",
            "duration" => 2,
            "published" => true
        ]);

        $datasetter->add_data('isp', 'billing_cycle', 'slug', [
            "title" => "5 Day",
            "description" => "5 Day",
            "slug" => "5-day",
            "duration_type" => "day",
            "duration" => 5,
            "published" => true
        ]);

        $datasetter->add_data('isp', 'billing_cycle', 'slug', [
            "title" => "1 Week",
            "description" => "1 Week",
            "slug" => "1-week",
            "duration_type" => "week",
            "duration" => 1,
            "published" => true
        ]);

        $datasetter->add_data('isp', 'billing_cycle', 'slug', [
            "title" => "2 Week",
            "description" => "2 Week",
            "slug" => "2-week",
            "duration_type" => "week",
            "duration" => 2,
            "published" => true
        ]);

        $datasetter->add_data('isp', 'billing_cycle', 'slug', [
            "title" => "3 Week",
            "description" => "3 Week",
            "slug" => "3-week",
            "duration_type" => "week",
            "duration" => 3,
            "published" => true
        ]);

        $datasetter->add_data('isp', 'billing_cycle', 'slug', [
            "title" => "1 Month",
            "description" => "1 Month",
            "slug" => "1-month",
            "duration_type" => "month",
            "duration" => 1,
            "published" => true
        ]);

        $datasetter->add_data('isp', 'billing_cycle', 'slug', [
            "title" => "2 Month",
            "description" => "2 Month",
            "slug" => "2-month",
            "duration_type" => "month",
            "duration" => 2,
            "published" => true
        ]);

        $datasetter->add_data('isp', 'billing_cycle', 'slug', [
            "title" => "Quarterly",
            "description" => "Quarterly",
            "slug" => "quarterly",
            "duration_type" => "month",
            "duration" => 3,
            "published" => true
        ]);

        $datasetter->add_data('isp', 'billing_cycle', 'slug', [
            "title" => "Bi-Annually",
            "description" => "Bi-Annually",
            "slug" => "biannually",
            "duration_type" => "month",
            "duration" => 6,
            "published" => true
        ]);

        $datasetter->add_data('isp', 'billing_cycle', 'slug', [
            "title" => "Annually",
            "description" => "Annually",
            "slug" => "annually",
            "duration_type" => "year",
            "duration" => 1,
            "published" => true
        ]);


    }
}
