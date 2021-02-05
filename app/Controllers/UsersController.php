<?php

namespace App\Controllers;

use App\Models\History;
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
                'u_first_name'      => request('first_name'),
                'u_last_name'       => request('last_name'),
                'u_username'        => request('username'),
                'u_password'        => sha1(request('password')),
                'u_role'            => request('role'),
                'u_created_at'      => date('Y-m-d'),
                'u_last_time_see'   => '',
            ]);

            Session::set('success', true);

            History::insert([
                'h_user_id'    => Session::get('auth_id'),
                'h_action'     => 'à ajouter un nouvelle utilisateur sous le nom de ' . request('first_name') . ' ' . request('last_name'),
                'h_date'       => date('Y-m-d')
            ]);

            return redirect(url('/admin-panel/users'));
        }

        return render('admin.users.add', compact('title'));
    }

    public function delete(int $id)
    {
        $user = User::find($id);
        User::delete($id);
        Session::set('success', true);

        History::insert([
            'h_user_id'    => Session::get('auth_id'),
            'h_action'     => 'à supprimer l\'utilisateur ' . $user->u_first_name . ' ' . $user->u_last_name,
            'h_date'       => date('Y-m-d')
        ]);

        return redirect(previous());
    }

    public function edit(int $id)
    {
        if (empty(request('password'))) {
            User::update($id, [
                'u_first_name' => request('first_name'),
                'u_last_name'  => request('last_name'),
                'u_username'   => request('username'),
                'u_role'       => request('role'),
            ]);
        } else {
            User::update($id, [
                'u_first_name' => request('first_name'),
                'u_last_name'  => request('last_name'),
                'u_username'   => request('username'),
                'u_password'   => sha1(request('password')),
                'u_role'       => request('role'),
            ]);
        }

        Session::set('success', true);

        History::insert([
            'h_user_id'    => Session::get('auth_id'),
            'h_action'     => 'à Modifier l\'utilisateur ' . request('first_name') . ' ' . request('last_name'),
            'h_date'       => date('Y-m-d')
        ]);

        if (session('auth_id') == $id) {
            Session::destroy();

            return redirect(url('/'));
        }

        return redirect(previous());
    }
}
