<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\mt_barang;
use App\Models\mt_supplier;

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
        $satuan = DB::select('select * from mt_satuan');
        $sediaan = DB::select('select * from mt_sediaan');
        return view('farmasi.index_master_barang', compact([
            'menu',
            'satuan',
            'sediaan'
        ]));
    }
    public function Index_master_supplier()
    {
        $menu = "Master Supplier";
        $satuan = DB::select('select * from mt_satuan');
        $sediaan = DB::select('select * from mt_sediaan');
        return view('farmasi.index_master_supplier', compact([
            'menu',
            'satuan',
            'sediaan'
        ]));
    }
    public function Stok_barang()
    {
        $menu = "Stok Barang";
        $supplier = db::select('SELECT * from mt_supplier order by id desc');
        return view('farmasi.index_stok_barang',compact([
            'menu',
            'supplier'
        ]));
    }
    public function Ambil_master_barang()
    {
        $mt_barang = db::select('SELECT * from mt_barang order by id desc LIMIT 12');
        return view('farmasi.tabel_master_barang', compact([
            'mt_barang'
        ]));
    }
    public function Cari_master_barang(Request $request)
    {
        $mt_barang = db::select("CALL cari_obat_dudy('$request->namabarang')");
        return view('farmasi.pencarian_tabel_master_barang', compact([
            'mt_barang'
        ]));
    }
    public function Ambil_master_supplier()
    {
        $mt_supplier = db::select('SELECT * from mt_supplier order by id desc');
        return view('farmasi.tabel_master_supplier', compact([
            'mt_supplier'
        ]));
    }
    public function Simpan_master_barang(Request $request)
    {
        $data = json_decode($_POST['form_master_barang'], true);
        foreach ($data as $nama) {
            $index =  $nama['name'];
            $value =  $nama['value'];
            $dataSet[$index] = $value;
        }
        $kode_barang = $this->get_kode_barang();
        $data_mt_barang = [
            'kode_barang' => $kode_barang,
            'nama_barang' => $dataSet['namabarang'],
            'nama_generik' => $dataSet['namagenerik'],
            'dosis' => $dataSet['dosis'],
            'satuan_besar' => $dataSet['satuanbesar'],
            'satuan_kecil' => $dataSet['satuankecil'],
            'rasio' => $dataSet['rasio'],
            'sediaan' => $dataSet['sediaan'],
            'aturan_pakai' => $dataSet['aturanpakai'],
            'klp_barang' => 'OBAT',
        ];
        mt_barang::create($data_mt_barang);
        $back = [
            'kode' => 200,
            'message' => 'Data barang berhasil disimpan ...'
        ];
        echo json_encode($back);
        die;
    }
    public function Simpan_master_supplier(Request $request)
    {
        $data = json_decode($_POST['form_master_supplier'], true);
        foreach ($data as $nama) {
            $index =  $nama['name'];
            $value =  $nama['value'];
            $dataSet[$index] = $value;
        }
        $kode_supplier = $this->get_kode_sup();
        $data_mt_supp = [
            'kode_supplier' => $kode_supplier,
            'nama_supplier' => $dataSet['namasupplier'],
            'alamat_supplier' => $dataSet['alamatsupplier'],
            'cp' => $dataSet['kontak']
        ];
        mt_supplier::create($data_mt_supp);
        $back = [
            'kode' => 200,
            'message' => 'Data supplier berhasil disimpan ...'
        ];
        echo json_encode($back);
        die;
    }
    public function get_kode_barang()
    {
        $y = DB::select('SELECT MAX(RIGHT(kode_barang,6)) AS kd_max FROM mt_barang');
        if (count($y) > 0) {
            foreach ($y as $k) {
                $tmp = ((int) $k->kd_max) + 1;
                $kd = sprintf("%06s", $tmp);
            }
        } else {
            $kd = "0001";
        }
        date_default_timezone_set('Asia/Jakarta');
        return 'B' . $kd;
    }
    public function get_kode_sup()
    {
        $y = DB::select('SELECT MAX(RIGHT(kode_supplier,3)) AS kd_max FROM mt_supplier');
        if (count($y) > 0) {
            foreach ($y as $k) {
                $tmp = ((int) $k->kd_max) + 1;
                $kd = sprintf("%03s", $tmp);
            }
        } else {
            $kd = "001";
        }
        date_default_timezone_set('Asia/Jakarta');
        return 'SU' . $kd;
    }
}
