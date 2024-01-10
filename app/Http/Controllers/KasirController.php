<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KasirController extends Controller
{
    public function Kasir()
    {
        $menu = "Kasir";
        return view('kasir.index',compact([
            'menu'
        ]));
    }
}
