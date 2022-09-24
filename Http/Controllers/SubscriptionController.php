<?php

namespace Modules\Isp\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Modules\Base\Http\Controllers\BaseController;

class SubscriptionController extends BaseController
{

    public function recordselect(Request $request)
    {
  

        return response()->json($result);
    }
}
