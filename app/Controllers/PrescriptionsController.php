<?php

namespace App\Controllers;

use App\Models\History;
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

        return render(
            'admin.prescriptions.list',
            compact( 'prescriptions', 'title' )
        );
    }

    public function add()
    {
        $title = 'Ajouter une ordonnance';

        if ( Request::method() == 'POST' ) {
            Validate::validate( [
                'client_name'          => 'required|min:4|max:195',
                'left_eye'             => 'required',
                'right_eye'            => 'required',
                'prescription_content' => 'required',
            ] );

            Prescriptions::insert( [
                'p_user_id'     => Session::get( 'auth_id' ),
                'p_client_name' => request( 'client_name' ),
                'p_left_eye'    => request( 'left_eye' ),
                'p_right_eye'   => request( 'right_eye' ),
                'p_content'     => request( 'prescription_content' ),
                'p_created_at'  => date( 'Y-m-d' ),
            ] );

            History::insert( [
                'h_user_id' => Session::get( 'auth_id' ),
                'h_action'  => 'à ajouter une ordonnace pour' . request(
                    'client_name'
                ),
                'h_date'    => date( 'Y-m-d' ),
            ] );

            return redirect( url( '/admin-panel/prescriptions' ) );
        }

        return render( 'admin.prescriptions.add', compact( 'title' ) );
    }

    /**
     * @param int $id
     */
    public function delete( int $id )
    {
        $prescription = Prescriptions::find( $id );
        Prescriptions::delete( $id );
        Session::set( 'success', true );

        History::insert( [
            'h_user_id' => Session::get( 'auth_id' ),
            'h_action'  => 'à Supprimer l\'ordonnace ' . $prescription->id,
            'h_date'    => date( 'Y-m-d' ),
        ] );

        return redirect( previous() );
    }

    /**
     * @param int $id
     */
    public function edit( int $id )
    {
        Prescriptions::update( $id, [
            'p_client_name' => request( 'client_name' ),
            'p_left_eye'    => request( 'left_eye' ),
            'p_right_eye'   => request( 'right_eye' ),
            'p_content'     => request( 'prescription_content' ),
        ] );

        Session::set( 'success', true );

        History::insert( [
            'h_user_id' => Session::get( 'auth_id' ),
            'h_action'  => 'à Modiifer l\'ordonnace de' .
            request( 'client_name' ),
            'h_date'    => date( 'Y-m-d' ),
        ] );

        return redirect( previous() );
    }

    /**
     * @param int $id
     */
    public function view( int $id )
    {
        // the prescription variable is used in pdf/prescription.php to render data in the pdf
        $prescription = Prescriptions::find( $id );
        $html2pdf     = new Html2Pdf();
        $html2pdf->setDefaultFont( 'aealarabiya' );
        ob_start();
        require_once ROOT_DIR . DS . 'pdf' . DS . 'prescription.php';
        $html2pdf->writeHTML( ob_get_clean() );
        $html2pdf->output();
        exit;
    }

}
