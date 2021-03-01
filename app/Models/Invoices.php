<?php

namespace App\Models;

use LiteFramework\Globals\Session;
use LiteFramework\BaseClasses\Model;
use LiteFramework\Database\Database;

class Invoices extends Model
{
    protected static string $tableName = 'invoices';

    public static function all(): ?array
    {

        if ( Session::get( 'auth_role' ) == 0 ) {
            return Database::table( static::$tableName )
                ->select()
                ->where( 'i_user_id', '=', Session::get( 'auth_id' ) )
                ->orderBy( 'i_created_at', 'desc' )
                ->get()
            ;
        }

        return Database::table( static::$tableName )
            ->select()
            ->orderBy( 'i_created_at', 'desc' )
            ->get()
        ;
    }

    /**
     * @return mixed
     */
    public static function gain_per_day()
    {
        $invoices = Database::table( 'invoices' )
            ->select()
            ->get()
        ;

        $curent_date = date( 'Y-m-d' );
        $gain        = 0;

        foreach ( $invoices as $invoice ) {

            if ( $invoice->i_created_at == $curent_date ) {
                $gain += $invoice->i_paid_amount;
            }

        }

        return $gain;
    }

}
