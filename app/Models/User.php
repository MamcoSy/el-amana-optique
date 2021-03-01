<?php

namespace App\Models;

use LiteFramework\Globals\Session;
use LiteFramework\BaseClasses\Model;
use LiteFramework\Database\Database;

class User extends Model
{
    /**
     * @var string
     */
    protected static string $tableName = 'users';

    public static function all(): ?array
    {
        return Database::table( static::$tableName )
            ->select()
            ->orderBy( 'u_created_at', 'desc' )
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
            ->where( 'i_user_id', '=', Session::get( 'auth_id' ) )
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
