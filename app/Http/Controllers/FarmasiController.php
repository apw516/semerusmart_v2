<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class FarmasiController extends Controller
{
    public function Layananresep()
    {
        $menu = "Layanan Resep";
        return view('farmasi.index', compact([
            'menu'
        ]));
    }
    public function Master_barang()
    {
        $menu = "Master Barang";
        return view('farmasi.index_master_barang', compact([
            'menu'
        ]));
    }
    public function Ambil_master_barang()
    {
        $mt_barang = db::select('SELECT * from mt_barang');
        return view('farmasi.tabel_master_barang', compact([
            'mt_barang'
        ]));
    }
}
