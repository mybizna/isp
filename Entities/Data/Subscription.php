<?php

namespace Modules\Account\Entities\Data;

use Modules\Base\Classes\Datasetter;
use Illuminate\Support\Facades\DB;

class Subscription
{

    public $ordering = 3;

    public function data(Datasetter $datasetter)
    {

  
        $datasetter->add_data('core', 'notification', 'slug', [
            "slug" => "isp_subscription_add",
            "short" => "Your subscription account [{{ username }}] has been added.",
            "medium" => "Your subscription account [{{ username }}] has been added.",
            "enable_short" => true,
            "enable_medium" => true,
            "enable_lengthy" => true,
            "published" => true,
            "lengthy" => "
            Hi {{ partner_name }},
            <br><br>
            <h3> Subscriber Account: {{ username }} .</h3>
            <br><br>
            Your subscription account [{{ username }}] has been added.
            <br><br> 
            If you need any help, please let us know so that we can assist you.
            <br><br>
            Thanks,",
        ]);
  
        $datasetter->add_data('core', 'notification', 'slug', [
            "slug" => "isp_subscription_save",
            "short" => "Your subscription account [{{ username }}] has been saved.",
            "medium" => "Your subscription account [{{ username }}] has been saved.",
            "enable_short" => true,
            "enable_medium" => true,
            "enable_lengthy" => true,
            "published" => true,
            "lengthy" => "
            Hi {{ partner_name }},
            <br><br>
            <h3> Subscriber Account: {{ username }} .</h3>
            <br><br>
            Your subscription account [{{ username }}] has been saved.
            <br><br> 
            If you need any help, please let us know so that we can assist you.
            <br><br>
            Thanks,",
        ]);
    }
}
