<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LaboratoriumController extends Controller
{
    public function index()
    {
        $menu = "Laboratorium";
        return view('laboratorium.index',compact([
            'menu'
        ]));
    }

    public function detailorderlab()
    {
        $menu = "Laboratorium";
        return view('laboratorium.detailorderlab',compact([
            'menu'
        ]));
    }
}
