<?php

namespace App\Middlewares;

use LiteFramework\Globals\Session;

class Guest
{
    public function handle()
    {
        if (Session::has('auth_id')) {
            return redirect(url('/admin-panel'));
        }
    }
}
