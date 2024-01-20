<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\mt_barang;
use App\Models\mt_supplier;
use App\Models\po_detail;
use App\Models\po_header;
use App\Models\ti_kartu_stok;
use App\Models\ti_stok_pesediaan;

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
        $now = $this->get_date();
        return view('farmasi.index_stok_barang', compact([
            'menu',
            'supplier',
            'now'
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
    public function Simpan_po_masuk(Request $request)
    {
        $data = json_decode($_POST['form_po_header'], true);
        $v_list = json_decode($_POST['v_list'], true);
        foreach ($v_list as $l) {
            $index = $l['name'];
            $value = $l['value'];
            $dataobat[$index] = $value;
            if ($index == 'ed') {
                $array_obat[] = $dataobat;
            }
        }
        foreach ($data as $nama) {
            $index =  $nama['name'];
            $value =  $nama['value'];
            $dataSet[$index] = $value;
        }
        $Kode_po = $this->get_kode_po();
        $grant_total_po = $dataSet['totalpo'];
        if($dataSet['ppn'] > 0){
            $ppn = $dataSet['ppn'];
            $grant_total_po = $grant_total_po + $ppn;
        }

        if($dataSet['pph'] > 0){
            $pph = $dataSet['pph'];
            $grant_total_po = $grant_total_po + $pph;
        }
        if($dataSet['materai'] > 0){
            $materai = $dataSet['materai'];
            $grant_total_po = $grant_total_po + $materai;
        }
        $diskon = 0;
        if($dataSet['diskon'] > 0){
            $diskon = $dataSet['diskon'] / 100 * $dataSet['totalpo'];
            $grant_total_po = $grant_total_po - $diskon;
        }
        $DATA_PO_HEADER = [
            'kode_po' => $Kode_po,
            'no_faktur' => $dataSet['nomorfaktur'],
            'kode_supplier' => $dataSet['kodesupplier'],
            'total_po' => $dataSet['totalpo'],
            'ppn' => $dataSet['ppn'],
            'sub_gtotal_po' => $dataSet['totalpo'],
            'disk_persen' => $dataSet['diskon'],
            'disk_rupiah' => $diskon,
            'gtotal_po' =>$grant_total_po,
            'tgl_beli' =>$dataSet['tglbeli'],
            'tgl_terima' =>$dataSet['tglterima'],
            'tipe_po' =>1,
            'tipe_trx' => 1,
            'status_po' =>1 ,
            'tgl_input' => $this->get_now(),
            'input_by' => auth()->user()->id,
            'pph' => $dataSet['pph'],
            'kode_unit' => '4008',
            'status_retur' => 'OPN',
            'status_tagihan' => 'OPN',
            'status_pembayaran' =>'OPN',
            'materai' =>$dataSet['materai'],
        ];
        po_header::create($DATA_PO_HEADER);
        foreach ($array_obat as $ab) {
            $subtot = $ab['subtot'];
            if($ab['disc'] > 0){
                $diskon = $ab['disc'] /100 * $ab['subtot'];
                $subtot = $ab['subtot'] - $diskon;
            }
            $qty_kecil = $ab['isi'] * $ab['jumlah'];
            $harga_1 = $subtot / $ab['isi'];
            $harga_2 = $harga_1 / $qty_kecil;
            $harga_satuan_kecil = $harga_2;
            $data_obat_po_masuk = [
                'kode_po' => $Kode_po,
                'kode_barang' => $ab['kodeobat'],
                'qty' => $ab['jumlah'],
                'satuan' => $ab['satuan'],
                'isi' => $ab['isi'],
                'qty_kecil' => $qty_kecil,
                'diskon' => $ab['disc'],
                'sub_total' => $subtot,
                'batch' => $ab['batch'],
                'ed' => $ab['ed'],
                'hrg_satuan' => $ab['subtot'],
                'hrg_satuan_kecil' => $harga_satuan_kecil,
            ];
            po_detail::create($data_obat_po_masuk);
            $cek_stok2 = db::select('SELECT * FROM ti_kartu_stok WHERE NO = ( SELECT MAX(a.no ) AS nomor FROM ti_kartu_stok a WHERE kode_barang = ?)',[$ab['kodeobat']]);
            if (count($cek_stok2) > 0) {
                $stok_last = $cek_stok2[0]->stok_current;
                $harga_beli = $cek_stok2[0]->harga_beli_history;
            } else {
                $stok_last = 0;
                $harga_beli = 0;
            }
            $stok_current = $stok_last + $ab['jumlah'];
            $data_ti_kartu_stok = [
                'no_dokumen' => $Kode_po,
                'no_dokumen_detail' => $Kode_po,
                'no_faktur' => $dataSet['nomorfaktur'],
                'tgl_stok' => $this->get_now(),
                'kode_unit' => '4008',
                'kode_barang' => $ab['kodeobat'],
                'stok_last' => $stok_last,
                'stok_in' => $ab['jumlah'],
                'harga_beli' => $harga_satuan_kecil,
                'stok_current' => $stok_current,
                'input_by' => auth()->user()->id,
                'harga_beli_history' => $harga_beli
            ];
            ti_kartu_stok::create($data_ti_kartu_stok);
            $cek_sediaan = DB::select('select * from ti_stok_pesediaan where kode_barang = ? and ed = ? and kode_supplier = ?', [$ab['kodeobat'], $ab['ed'], $dataSet['kodesupplier']]);
            if(count($cek_sediaan) > 0){
                $stok = $cek_sediaan[0]->stok + $ab['jumlah'];
                $stok_last = $cek_sediaan[0]->stok_last;
            }else{
                $stok = $ab['jumlah'];
                $stok_last = 0;
            }
            $mt_sediaan = [
                'kode_barang' => $ab['kodeobat'],
                'stok' =>$stok,
                'hpp' =>$dataSet['pph'],
                'kode_unit' => '4008',
                'kode_supplier' =>$dataSet['kodesupplier'],
                'ed' => $ab['ed'],
                'stok_in' =>  $ab['jumlah'],
                'stok_last' =>  $stok_last,
                'tgl_entry' => $this->get_now(),
                'last_update' =>$this->get_now(),
            ];
            if(count($cek_sediaan)> 0){
                ti_stok_pesediaan::where('id', $cek_sediaan[0]->id)->update($mt_sediaan);
            }else{
                ti_stok_pesediaan::create($mt_sediaan);
            }
        }
        $back = [
            'kode' => 200,
            'message' => 'Data PO berhasil disimpan ...'
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
    public function get_kode_po()
    {
        $y = DB::select('SELECT MAX(RIGHT(kode_po,6)) AS kd_max FROM tg_po_header WHERE DATE(tgl_input) = CURDATE()
        ORDER BY id DESC
        LIMIT 1');
        if (count($y) > 0) {
            foreach ($y as $k) {
                $tmp = ((int) $k->kd_max) + 1;
                $kd = sprintf("%06s", $tmp);
            }
        } else {
            $kd = "001";
        }
        date_default_timezone_set('Asia/Jakarta');
        return 'PO' . date('ymd') . $kd;
    }
    public function Ambil_riwayat_po_header(Request $request)
    {
        $riwayat = DB::select('SELECT nama_supplier,b.`alamat_supplier`,a.* FROM tg_po_header a
        INNER JOIN mt_supplier b ON a.`kode_supplier` = b.`kode_supplier`
        AND a.`tgl_terima` BETWEEN ? AND ?',[$request->tgl_awal,$request->tgl_akhir]);
        return view('farmasi.tabel_po_header',compact([
            'riwayat'
        ]));
    }
    public function Ambil_riwayat_stok_sediaan(Request $request)
    {
        $tgl_awal = $request->tgl_awal;
        $tgl_akhir = $request->tgl_akhir;
        $stok_sediaan = DB::select('SELECT b.`nama_barang`,c.`nama_supplier`,a.* FROM ti_stok_pesediaan a
        INNER JOIN mt_barang b ON a.`kode_barang` = b.`kode_barang`
        INNER JOIN mt_supplier c ON a.`kode_supplier` = c.`kode_supplier`
        WHERE DATE(a.`tgl_entry`) BETWEEN ? AND ?',[$tgl_awal,$tgl_akhir]);
        return view('farmasi.tabel_stok_sediaan',compact([
            'stok_sediaan'
        ]));
    }
    public function Ambil_kartu_stok(Request $request)
    {
        $tgl_awal = $request->tgl_awal;
        $tgl_akhir = $request->tgl_akhir;
        $stok = DB::select('SELECT b.`nama_barang`,a.* FROM ti_kartu_stok a
        INNER JOIN mt_barang b ON a.`kode_barang` = b.`kode_barang`
        WHERE DATE(tgl_stok) BETWEEN ? AND ?',[$tgl_awal,$tgl_akhir]);
        return view('farmasi.tabel_kartu_stok',compact([
            'stok'
        ]));
    }
    public function Detail_po(Request $request)
    {
        $kode_po = $request->kode;
        $nama = $request->nama;
        $tgl_beli = $request->tgl_beli;
        $tgl_terima = $request->tgl_terima;
        $riwayat = DB::select('SELECT b.nama_barang,a.* FROM tg_po_detail a
        INNER JOIN mt_barang b ON a.`kode_barang` = b.`kode_barang` where a.kode_po = ?',[$request->kode]);
        return view('farmasi.tabel_po_detail',compact([
            'riwayat',
            'kode_po',
            'nama',
            'tgl_beli',
            'tgl_terima'
        ]));
    }
    public function get_now()
    {
        $dt = Carbon::now()->timezone('Asia/Jakarta');
        $date = $dt->toDateString();
        $time = $dt->toTimeString();
        $now = $date . ' ' . $time;
        return $now;
    }
    public function get_date()
    {
        $dt = Carbon::now()->timezone('Asia/Jakarta');
        $date = $dt->toDateString();
        $time = $dt->toTimeString();
        $now = $date;
        return $now;
    }
    public function Add_obat_po(Request $request)
    {
        $kode_barang = $request->kode_barang;
        $mt_barang = db::select('select * from mt_barang where kode_barang = ?', [$kode_barang]);
        $namaobat = $request->namaobat;
        return '<div class="form-row">
        <div class="form-group col-md-4">
        <label for="inputEmail4">Nama Obat</label>
        <input readonly type="text" class="form-control" id="namaobat" name="namaobat" value="' . $namaobat . '">
        <input hidden readonly type="text" class="form-control" id="kodeobat" name="kodeobat" value="' . $kode_barang . '">
        </div>
        <div class="form-group col-md-1">
        <label for="inputPassword4">Satuan</label>
        <input readonly type="text" class="form-control" id="satuan" name="satuan" value="' . $mt_barang[0]->satuan_besar . '">
        </div>
        <div class="form-group col-md-1">
        <label for="inputPassword4">Jumlah</label>
        <input type="text" class="form-control" id="jumlah" name="jumlah" value="0">
        </div>
        <div class="form-group col-md-1">
        <label for="inputPassword4">Isi</label>
        <input type="text" class="form-control" id="isi" name="isi" value="0">
        </div>
        <div class="form-group col-md-1">
        <label for="inputPassword4">Disc</label>
        <input type="text" class="form-control" id="disc" name="disc" value="0">
        </div>
        <div class="form-group col-md-1">
        <label for="inputPassword4">Harga</label>
        <input type="text" class="form-control" id="subtot" name="subtot" value="0">
        </div>
        <div class="form-group col-md-1">
        <label for="inputPassword4">Batch</label>
        <input type="text" class="form-control" id="batch" name="batch" value="0">
        </div>
        <div class="form-group col-md-2">
        <label for="inputPassword4">ED</label>
        <input type="DATE" class="form-control" id="ed" name="ed" value="">
        </div>
        <i class="bi bi-x-square remove_field form-group col-md-1 text-danger" status="" jenisracik="non-racikan""></i>
        </div>';
    }
}
