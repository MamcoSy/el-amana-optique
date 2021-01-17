<?php

namespace App\Controllers;

use App\Models\User;
use LiteFramework\View\View;
use LiteFramework\Http\Request;
use LiteFramework\Globals\Session;
use LiteFramework\Database\Database;
use LiteFramework\Validation\Validate;

class HomeController
{
    public function index()
    {
        return View::render('home.index');
    }

    public function login()
    {

        Validate::validate([
            'username' => 'required|min:4|max:195',
            'password' => 'required|min:4|max:195',
            'remember' => 'in:on',
        ]);

        $user = Database::table('users')
            ->select()
            ->where('username', '=', Request::post('username'))
            ->where('password', '=', sha1(Request::post('password')))
            ->first();

        if (!$user) {
            Session::set('message', 'nom d\'utilisateur ou mot de passe incorrect.');
            Session::set('old', Request::all());

            return redirect(previous());
        } else {
            Session::set('auth_id', $user->id);
            Session::set('auth_role', $user->role);
            Session::set('auth_full_name', $user->first_name . ' ' . $user->last_name);
            Session::set('auth_last_time_see', $user->last_time_see);

            return redirect(url('/admin-panel'));
        }

    }

    public function logout()
    {
        User::update(session('auth_id'), ['last_time_see' => date('d / m  / Y à H:i:s')]);
        Session::destroy();

        return redirect(url('/'));
    }
}
