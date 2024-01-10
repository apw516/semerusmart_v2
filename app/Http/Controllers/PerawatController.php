<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PerawatController extends Controller
{
    public function index()
    {
        $menu = "RME PERAWAT";
        return view('perawat.index', compact([
            'menu'
        ]));
    }
    public function assesmenperawat()
    {
        $menu = "RME PERAWAT";
        return view('perawat.assesmen',compact([
            'menu'
        ]));
    }
}
