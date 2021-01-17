<?php

namespace App\Middlewares;

use LiteFramework\Globals\Session;

class Auth
{
    public function handle()
    {
        if (!Session::has('auth_id')) {
            return redirect(url('/'));
        }
    }
}
