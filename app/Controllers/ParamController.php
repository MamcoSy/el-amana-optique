<?php

namespace App\Controllers;

class ParamController
{
    public function index()
    {
        $title = 'Parametres';

        return render('param.parameters', compact('title'));
    }
}
