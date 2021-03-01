<?php

namespace App\Middlewares;

use LiteFramework\Globals\Session;

class Auth
{
    public static function handle()
    {
        if (!Session::has('auth_id')) {
            return redirect(url('/'));
        }
    }
}
