<?php

namespace App\Http\Controllers;

use App\Models\ts_kunjungan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class KasirController extends Controller
{
    public function index()
    {
        $menu = "Kasir";
        return view('kasir.index',compact([
            'menu'
        ]));
    }

    public function get_data_patient_cashier(Request $request)
    {

        $data_pasien_bayar = db:: table('ts_kunjungan')
                                    ->leftjoin('mt_pasien','ts_kunjungan.no_rm','=','mt_pasien.no_rm')
                                    ->leftjoin('mt_paramedis','ts_kunjungan.kode_paramedis','=','mt_paramedis.kode_paramedis')
                                    ->leftjoin('mt_unit','ts_kunjungan.kode_unit','=','mt_unit.kode_unit')
                                    ->select('ts_kunjungan.tgl_masuk', 'ts_kunjungan.kode_kunjungan', 'ts_kunjungan.no_rm',
                                            'mt_pasien.nama_px','mt_pasien.no_hp', 'mt_paramedis.nama_paramedis', 'mt_unit.nama_unit')
                                    ->get();
        return view('kasir.tabel_pasien_bayar', compact([
            'data_pasien_bayar'
        ]));
    }

    public function search_data_patient_cashier(Request $request)
    {
        if(!empty($request->rm) && !empty($request->nama)){
        $data_pasien_bayar = db:: table('ts_kunjungan')
                                    ->leftjoin('mt_pasien','ts_kunjungan.no_rm','=','mt_pasien.no_rm')
                                    ->leftjoin('mt_paramedis','ts_kunjungan.kode_paramedis','=','mt_paramedis.kode_paramedis')
                                    ->leftjoin('mt_unit','ts_kunjungan.kode_unit','=','mt_unit.kode_unit')
                                    ->select('ts_kunjungan.tgl_masuk', 'ts_kunjungan.kode_kunjungan', 'ts_kunjungan.no_rm',
                                            'mt_pasien.nama_px','mt_pasien.no_hp', 'mt_paramedis.nama_paramedis', 'mt_unit.nama_unit')
                                    ->where('ts_kunjungan.no_rm','like',"%{$request->rm}%")
                                    ->orWhere('mt_pasien.nama_px','like',"%{$request->nama}%")
                                    ->get();
            return view('kasir.tabel_pasien_bayar_cari', compact([
                'data_pasien_bayar'
            ]));
        }else if(empty($request->nama)){
            $data_pasien_bayar = db:: table('ts_kunjungan')
                                    ->leftjoin('mt_pasien','ts_kunjungan.no_rm','=','mt_pasien.no_rm')
                                    ->leftjoin('mt_paramedis','ts_kunjungan.kode_paramedis','=','mt_paramedis.kode_paramedis')
                                    ->leftjoin('mt_unit','ts_kunjungan.kode_unit','=','mt_unit.kode_unit')
                                    ->select('ts_kunjungan.tgl_masuk', 'ts_kunjungan.kode_kunjungan', 'ts_kunjungan.no_rm',
                                            'mt_pasien.nama_px','mt_pasien.no_hp', 'mt_paramedis.nama_paramedis', 'mt_unit.nama_unit')
                                    ->where('ts_kunjungan.no_rm','like',"%{$request->rm}%")
                                    ->get();
                return view('kasir.tabel_pasien_bayar_cari', compact([
            'data_pasien_bayar'
            ]));
        }else if(empty($request->rm)){
            $data_pasien_bayar = db:: table('ts_kunjungan')
            ->leftjoin('mt_pasien','ts_kunjungan.no_rm','=','mt_pasien.no_rm')
            ->leftjoin('mt_paramedis','ts_kunjungan.kode_paramedis','=','mt_paramedis.kode_paramedis')
            ->leftjoin('mt_unit','ts_kunjungan.kode_unit','=','mt_unit.kode_unit')
            ->select('ts_kunjungan.tgl_masuk', 'ts_kunjungan.kode_kunjungan', 'ts_kunjungan.no_rm',
                    'mt_pasien.nama_px','mt_pasien.no_hp', 'mt_paramedis.nama_paramedis', 'mt_unit.nama_unit')
            ->where('mt_pasien.nama_px','like',"%{$request->nama}%")
            ->get();
return view('kasir.tabel_pasien_bayar_cari', compact([
'data_pasien_bayar'
]));
        }
    }
}
