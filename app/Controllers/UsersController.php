<?php

namespace App\Controllers;

use App\Models\User;
use LiteFramework\Globals\Session;

class UsersController
{
    public function index()
    {
        $title = 'Gestion des utilisateurs';
        $users = User::all();

        return render('admin.users', compact('users', 'title'));

    }

    public function delete(int $id)
    {
        User::delete($id);
        Session::set('success', true);

        return redirect(previous());
    }
}
