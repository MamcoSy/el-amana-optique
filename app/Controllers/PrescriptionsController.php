<?php

namespace App\Controllers;

use Spipu\Html2Pdf\Html2Pdf;
use App\Models\Prescriptions;
use LiteFramework\Http\Request;
use LiteFramework\Globals\Session;
use LiteFramework\Validation\Validate;

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
        if (Request::method() == 'POST') {
            Validate::validate([
                'client_name'          => 'required|min:4|max:195',
                'left_eye'             => 'required',
                'right_eye'            => 'required',
                'prescription_content' => 'required',
            ]);

            Prescriptions::insert([
                'user_id'     => Session::get('auth_id'),
                'client_name' => request('client_name'),
                'left_eye'    => request('left_eye'),
                'right_eye'   => request('right_eye'),
                'content'     => request('prescription_content'),
            ]);

            return redirect(url('/admin-panel/prescriptions'));
        }

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
            Validate::validate([
                'client_name'          => 'required|min:4|max:195',
                'left_eye'             => 'required',
                'right_eye'            => 'required',
                'prescription_content' => 'required',
            ]);
        }

        Prescriptions::update($id, [
            'client_name' => request('client_name'),
            'left_eye'    => request('left_eye'),
            'right_eye'   => request('right_eye'),
            'content'     => request('prescription_content'),
        ]);

        Session::set('success', true);

        return redirect(previous());
    }

    public function view(int $id)
    {
        $prescription = Prescriptions::find($id);
        $html2pdf     = new Html2Pdf();
        $html2pdf->setDefaultFont('aealarabiya');
        ob_start();
        require_once ROOT_DIR . DS . 'pdf' . DS . 'prescription.php';
        $html2pdf->writeHTML(ob_get_clean());
        $html2pdf->output();
        exit;
    }
}
