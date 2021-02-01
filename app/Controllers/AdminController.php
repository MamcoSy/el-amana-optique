<?php

namespace App\Controllers;

use App\Models\User;
use App\Models\Invoices;
use LiteFramework\Globals\Session;
use LiteFramework\Database\Database;

class AdminController
{
    public function index()
    {
        $title               = "Panneau d'administration";

        if (Session::get('auth_role') == 2) {
            $userCount           = Database::table('users')->select()->count();
            $prescpriptionsCount = Database::table('prescriptions')->select()->count();
            $invoicesCount       = Database::table('invoices')->select()->count();
            $users_gain_per_day  = Invoices::gain_per_day();

            $data = compact(
                'userCount',
                'title',
                'prescpriptionsCount',
                'invoicesCount',
                'users_gain_per_day',
            );
        } elseif (Session::get('auth_role') == 1) {
            //
        } else {
            $user_gain_per_day = User::gain_per_day();
            $invoicesCount     = Database::table('invoices')->select()->where('user_id', '=', Session::get('auth_id'))->count();

            $data = compact(
                'title',
                'invoicesCount',
                'user_gain_per_day'
            );
        }

        return render('admin.dashboard', $data);
    }

    public function users()
    {
        $users = User::all();

        return render('admin.users', compact('users'));
    }
}
