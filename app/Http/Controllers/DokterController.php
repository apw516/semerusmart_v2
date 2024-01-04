<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $layananlab = DB::select("CALL SP_PANGGIL_TARIF_LAB('1','')");
        return view('dokter.assesmen',compact([
            'menu',
            'layananlab',
        ]));
    }
}
