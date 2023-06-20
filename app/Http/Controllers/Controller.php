<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{
    //
    protected function user() {
    return JWTAuth::parseToken()->authenticate();
}
}

