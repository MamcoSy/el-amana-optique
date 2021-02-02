<?php

namespace App\Controllers;

use App\Models\User;
use LiteFramework\Http\Request;
use LiteFramework\Globals\Session;
use LiteFramework\Validation\Validate;

class UsersController
{
    public function index()
    {
        $title = 'Gestion des utilisateurs';
        $users = User::all();

        return render('admin.users.list', compact('users', 'title'));
    }

    public function add()
    {
        $title = 'Ajouter dutilisateur';
        if (Request::method() == 'POST') {
            Validate::validate([
                'first_name'       => 'required|min:2|max:195',
                'last_name'        => 'required|min:2|max:195',
                'username'         => 'required|min:4|max:195',
                'password'         => 'required|min:4',
                'confirm_password' => 'required|same:password',
            ]);

            User::insert([
                'first_name'      => request('first_name'),
                'last_name'       => request('last_name'),
                'username'        => request('username'),
                'password'        => sha1(request('password')),
                'role'            => request('role'),
                'created_at'      => date('Y-m-d'),
                'last_time_see'   => '',
            ]);
            Session::set('success', true);

            return redirect(url('/admin-panel/users'));
        }

        return render('admin.users.add');
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
