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

    public function edit(int $id)
    {
        if (empty(request('password'))) {
            User::update($id, [
                'first_name' => request('first_name'),
                'last_name'  => request('last_name'),
                'username'   => request('username'),
                'role'       => request('role'),
            ]);
        } else {
            User::update($id, [
                'first_name' => request('first_name'),
                'last_name'  => request('last_name'),
                'username'   => request('username'),
                'password'   => sha1(request('password')),
                'role'       => request('role'),
            ]);
        }
        Session::set('success', true);
        if (session('auth_id') == $id) {
            Session::destroy();

            return redirect(url('/'));
        }

        return redirect(previous());
    }
}
