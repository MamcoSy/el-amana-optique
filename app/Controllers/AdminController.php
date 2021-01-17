<?php

namespace App\Controllers;

use App\Models\User;
use LiteFramework\Database\Database;

class AdminController
{
    public function index()
    {
        $title     = "Panneau d'administration";
        $userCount = Database::table('users')->select()->count();

        return render('admin.dashboard', compact('userCount', 'title'));
    }

    public function users()
    {
        $users = User::all();

        return render('admin.users', compact('users'));
    }
}
