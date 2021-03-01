<?php

namespace App\Controllers;

use App\Models\History;
use App\Models\Invoices;
use Spipu\Html2Pdf\Html2Pdf;
use LiteFramework\Http\Request;
use LiteFramework\Globals\Session;
use LiteFramework\Validation\Validate;

class InvoicesController
{
    public function index()
    {
        $title    = 'Tout les Factures';
        $invoices = Invoices::all();

        return render( 'admin.invoices.list', compact( 'invoices', 'title' ) );
    }

    public function add()
    {
        $title = 'Ajouter une facture';

        if ( 'POST' == Request::method() ) {
            Validate::validate( [
                'client_name'     => 'required|min:4|max:195',
                'doctor_name'     => '|min:0|max:195',
                'left_eye'        => 'required',
                'right_eye'       => 'required',
                'left_eye_price'  => 'required',
                'right_eye_price' => 'required',
                'mount_price'     => 'required',
                'amount_to_pay'   => 'required',
                'paid_amount'     => 'required',
            ] );

            Invoices::insert( [
                'i_user_id'          => Session::get( 'auth_id' ),
                'i_client_name'      => request( 'client_name' ),
                'i_doctor_name'      => request( 'doctor_name' ),
                'i_left_eye'         => request( 'left_eye' ),
                'i_right_eye'        => request( 'right_eye' ),
                'i_left_eye_price'   => request( 'left_eye_price' ),
                'i_right_eye_price'  => request( 'right_eye_price' ),
                'mount_price'        => request( 'mount_price' ),
                'i_amount_to_pay'    => request( 'amount_to_pay' ),
                'i_paid_amount'      => request( 'paid_amount' ),

                'i_remaining_amount' => request( 'amount_to_pay' ) -
                request( 'paid_amount' ),

                'i_created_at'       => date( 'Y-m-d' ),
            ] );

            Session::set( 'success', true );

            History::insert( [
                'h_user_id' => Session::get( 'auth_id' ),

                'h_action'  => 'à Ajouter une facture pour ' .
                request( 'client_name' ),

                'h_date'    => date( 'Y-m-d' ),
            ] );

            return redirect( url( '/admin-panel/invoices' ) );
        }

        return render( 'admin.invoices.add', compact( 'title' ) );
    }

    /**
     * @param int $id
     */
    public function edit( int $id )
    {
        Invoices::update( $id, [
            'i_user_id'          => Session::get( 'auth_id' ),
            'i_client_name'      => request( 'client_name' ),
            'i_doctor_name'      => request( 'doctor_name' ),
            'i_left_eye'         => request( 'left_eye' ),
            'i_right_eye'        => request( 'right_eye' ),
            'i_left_eye_price'   => request( 'left_eye_price' ),
            'i_right_eye_price'  => request( 'right_eye_price' ),
            'i_mount_price'      => request( 'mount_price' ),
            'i_amount_to_pay'    => request( 'amount_to_pay' ),
            'i_paid_amount'      => request( 'paid_amount' ),

            'i_remaining_amount' => request( 'amount_to_pay' ) -
            request( 'paid_amount' ),

        ] );

        Session::set( 'success', true );

        $invoice = Invoices::find( $id );

        History::insert( [
            'h_user_id' => Session::get( 'auth_id' ),
            'h_action'  => 'à Modifier la facture ' . $invoice->id,
            'h_date'    => date( 'Y-m-d' ),
        ] );

        return redirect( previous() );
    }

    /**
     * @param int $id
     */
    public function delete( int $id )
    {
        Invoices::delete( $id );
        Session::set( 'success', true );

        return redirect( previous() );
    }

    /**
     * @param int $id
     */
    public function view( int $id )
    {
        // the invoice variable is used in pdf/invoice.php to render data in the pdf
        $invoice  = Invoices::find( $id );
        $html2pdf = new Html2Pdf();
        $html2pdf->setDefaultFont( 'aealarabiya' );
        ob_start();
        require_once ROOT_DIR . DS . 'pdf' . DS . 'invoice.php';
        $html2pdf->writeHTML( ob_get_clean() );
        $html2pdf->output();
        exit;
    }

}
