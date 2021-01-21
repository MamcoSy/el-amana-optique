<?php

namespace App\Controllers;

use App\Models\User;
use App\Models\Prescriptions;
use LiteFramework\Globals\Session;

class PrescriptionsController
{
    public function index()
    {
        $title         = 'Gestion des ordonnances';
        $prescriptions = Prescriptions::all();

        return render('admin.prescriptions', compact('prescriptions', 'title'));

    }

    public function add()
    {
        $title = 'Ajouter une ordonnance';

        return render('admin.add_prescription', compact('title'));
    }

    public function delete(int $id)
    {
        Prescriptions::delete($id);
        Session::set('success', true);

        return redirect(previous());
    }

    public function edit(int $id)
    {
        if (empty(request('password'))) {
            Prescriptions::update($id, [
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
