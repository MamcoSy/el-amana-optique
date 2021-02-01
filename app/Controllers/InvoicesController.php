<?php

namespace App\Controllers;

use App\Models\Invoices;
use LiteFramework\Globals\Session;
use LiteFramework\Http\Request;
use LiteFramework\Validation\Validate;
use Spipu\Html2Pdf\Html2Pdf;

class InvoicesController
{
    public function index()
    {
        $title    = 'Tout les Factures';
        $invoices = Invoices::all();

        return render('admin.invoices.list', compact('invoices', 'title'));
    }

    public function add()
    {
        $title = 'Ajouter une facture';

        if ('POST' == Request::method()) {
            Validate::validate([
                'client_name'     => 'required|min:4|max:195',
                'doctor_name'     => '|min:0|max:195',
                'left_eye'        => 'required',
                'right_eye'       => 'required',
                'left_eye_price'  => 'required',
                'right_eye_price' => 'required',
                'mount_price'     => 'required',
                'amount_to_pay'   => 'required',
                'paid_amount'     => 'required',
            ]);

            Invoices::insert([
                'user_id'          => Session::get('auth_id'),
                'client_name'      => request('client_name'),
                'doctor_name'      => request('doctor_name'),
                'left_eye'         => request('left_eye'),
                'right_eye'        => request('right_eye'),
                'left_eye_price'   => request('left_eye_price'),
                'right_eye_price'  => request('right_eye_price'),
                'mount_price'      => request('mount_price'),
                'amount_to_pay'    => request('amount_to_pay'),
                'paid_amount'      => request('paid_amount'),
                'remaining_amount' => request('amount_to_pay') - request('paid_amount'),
            ]);

            Session::set('success', true);

            return redirect(url('/admin-panel/invoices'));
        }

        return render('admin.invoices.add', compact('title'));
    }

    public function edit(int $id)
    {
        Invoices::update($id, [
            'user_id'          => Session::get('auth_id'),
            'client_name'      => request('client_name'),
            'doctor_name'      => request('doctor_name'),
            'left_eye'         => request('left_eye'),
            'right_eye'        => request('right_eye'),
            'left_eye_price'   => request('left_eye_price'),
            'right_eye_price'  => request('right_eye_price'),
            'mount_price'      => request('mount_price'),
            'amount_to_pay'    => request('amount_to_pay'),
            'paid_amount'      => request('paid_amount'),
            'remaining_amount' => request('amount_to_pay') - request('paid_amount'),
        ]);

        Session::set('success', true);

        return redirect(previous());
    }

    public function delete(int $id)
    {
        Invoices::delete($id);
        Session::set('success', true);

        return redirect(previous());
    }

    public function view(int $id)
    {
        // the invoice variable is used in pdf/invoice.php to render data in the pdf
        $invoice      = Invoices::find($id);
        $html2pdf     = new Html2Pdf();
        $html2pdf->setDefaultFont('aealarabiya');
        ob_start();
        require_once ROOT_DIR . DS . 'pdf' . DS . 'invoice.php';
        $html2pdf->writeHTML(ob_get_clean());
        $html2pdf->output();
        exit;
    }
}
