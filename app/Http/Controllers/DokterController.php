<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DokterController extends Controller
{
    public function index()
    {
        $menu = "RME DOKTER";
        return view('dokter.index',compact([
            'menu'
        ]));
    }

    public function assesmendokter()
    {
        $menu = "RME DOKTER";
        return view('dokter.assesmen',compact([
            'menu'
        ]));
    }
}
