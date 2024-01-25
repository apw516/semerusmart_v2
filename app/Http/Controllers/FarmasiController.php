<?php

namespace App\Http\Controllers;

use App\Models\detail_racikan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\mt_barang;
use App\Models\mt_supplier;
use App\Models\po_detail;
use App\Models\po_header;
use App\Models\ti_kartu_stok;
use App\Models\ti_stok_pesediaan;
use App\Models\header_racikan_order;
use App\Models\detail_racikan_order;
use App\Models\header_racikan;
use App\Models\ts_layanan_detail;
use App\Models\ts_layanan_header;

class FarmasiController extends Controller
{
    public function Layananresep()
    {
        $menu = "Layanan Resep";
        $now = $this->get_date();
        return view('farmasi.index', compact([
            'menu',
            'now'
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
    public function Riwayat_po_masuk()
    {
        $menu = "Riwayat PO";
        $supplier = db::select('SELECT * from mt_supplier order by id desc');
        $now = $this->get_date();
        return view('farmasi.riwayat_po_index', compact([
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
        if ($dataSet['ppn'] > 0) {
            $ppn = $dataSet['ppn'];
            $grant_total_po = $grant_total_po + $ppn;
        }

        if ($dataSet['pph'] > 0) {
            $pph = $dataSet['pph'];
            $grant_total_po = $grant_total_po + $pph;
        }
        if ($dataSet['materai'] > 0) {
            $materai = $dataSet['materai'];
            $grant_total_po = $grant_total_po + $materai;
        }
        $diskon = 0;
        if ($dataSet['diskon'] > 0) {
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
            'gtotal_po' => $grant_total_po,
            'tgl_beli' => $dataSet['tglbeli'],
            'tgl_terima' => $dataSet['tglterima'],
            'tipe_po' => 1,
            'tipe_trx' => 1,
            'status_po' => 1,
            'tgl_input' => $this->get_now(),
            'input_by' => auth()->user()->id,
            'pph' => $dataSet['pph'],
            'kode_unit' => '4001',
            'status_retur' => 'OPN',
            'status_tagihan' => 'OPN',
            'status_pembayaran' => 'OPN',
            'materai' => $dataSet['materai'],
        ];
        po_header::create($DATA_PO_HEADER);
        $total_semua_item = 0;
        $total_item = 0;
        $pph_detail_satuan_kecil = 0;
        $ppn_detail_satuan_kecil = 0;
        $materai_detail_satuan_kecil = 0;
        $diskon_detail_satuan_kecil = 0;
        $pph_satuan_kecil = 0;
        $ppn_satuan_kecil = 0;
        $materai_satuan_kecil = 0;
        $diskon_satuan_kecil = 0;

        foreach ($array_obat as $ab) {
            $subtot = $ab['subtot'];
            if ($ab['disc'] > 0) {
                $diskon = $ab['disc'] / 100 * $ab['subtot'];
                $subtot = $ab['subtot'] - $diskon;
            }
            $total_item = $ab['isi'] + $total_item;
            $total_item_kecil = $ab['qtykecil'] * $ab['isi'];
            $total_semua_item_ = $total_item_kecil * $ab['jumlah'];
            $total_semua_item = $total_semua_item + $total_semua_item_;
        }

        if ($dataSet['pph'] > 0) {
            $pph_detail_satuan_kecil = $dataSet['pph'] / $total_semua_item;
            $pph_satuan_kecil = $dataSet['pph'] / $total_item;
        }
        if ($dataSet['ppn'] > 0) {
            $ppn_detail_satuan_kecil = $dataSet['ppn'] / $total_semua_item;
            $ppn_satuan_kecil = $dataSet['ppn'] / $total_item;
        }
        if ($dataSet['materai'] > 0) {
            $materai_detail_satuan_kecil = $dataSet['materai'] / $total_semua_item;
            $materai_satuan_kecil = $dataSet['materai'] / $total_item;
        }
        if ($dataSet['diskon'] > 0) {
            $diskon_detail_satuan_kecil = $$diskon / $total_semua_item;
            $diskon_satuan_kecil = $$diskon / $total_item;
        }
        foreach ($array_obat as $ab) {
            $subtot = $ab['subtot'];
            if ($ab['disc'] > 0) {
                $diskon = $ab['disc'] / 100 * $ab['subtot'];
                $subtot = $ab['subtot'] - $diskon;
            }
            $total_item_kecil = $ab['qtykecil'] * $ab['isi'];
            $qty_kecil = $total_item_kecil * $ab['jumlah'];
            $harga_satuan = $subtot / $ab['isi'] + $pph_satuan_kecil + $ppn_satuan_kecil + $materai_satuan_kecil - $diskon_satuan_kecil;
            $harga_satuan_kecil_detail = $subtot / $qty_kecil + $pph_detail_satuan_kecil + $ppn_detail_satuan_kecil + $materai_detail_satuan_kecil - $diskon_detail_satuan_kecil;
            $harga_satuan_sedang = $subtot / $ab['isi'];
            $harga_satuan_kecil = $subtot / $qty_kecil;
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
                'hrg_satuan' => $harga_satuan,
                'hrg_satuan_kecil' => $harga_satuan_kecil_detail,
                'harga_satuan_sedang' => $harga_satuan_sedang,
                'harga_satuan_kecil' => $harga_satuan_kecil,
            ];
            po_detail::create($data_obat_po_masuk);
            $cek_stok2 = db::select('SELECT * FROM ti_kartu_stok WHERE NO = ( SELECT MAX(a.no ) AS nomor FROM ti_kartu_stok a WHERE kode_barang = ?)', [$ab['kodeobat']]);
            if (count($cek_stok2) > 0) {
                $stok_last = $cek_stok2[0]->stok_current;
                $harga_beli = $cek_stok2[0]->harga_beli_history;
            } else {
                $stok_last = 0;
                $harga_beli = 0;
            }
            $stok_current = $stok_last + $qty_kecil;
            $data_ti_kartu_stok = [
                'no_dokumen' => $Kode_po,
                'no_dokumen_detail' => $Kode_po,
                'no_faktur' => $dataSet['nomorfaktur'],
                'tgl_stok' => $this->get_now(),
                'kode_unit' => '4001',
                'kode_barang' => $ab['kodeobat'],
                'stok_last' => $stok_last,
                'stok_in' => $qty_kecil,
                'harga_beli' => $harga_satuan_kecil_detail,
                'stok_current' => $stok_current,
                'input_by' => auth()->user()->id,
                'harga_beli_history' => $harga_beli
            ];
            ti_kartu_stok::create($data_ti_kartu_stok);
            $cek_sediaan = DB::select('select * from ti_stok_pesediaan where kode_barang = ? and ed = ? and kode_supplier = ?', [$ab['kodeobat'], $ab['ed'], $dataSet['kodesupplier']]);
            if (count($cek_sediaan) > 0) {
                $stok = $cek_sediaan[0]->stok + $qty_kecil;
                $stok_last = $cek_sediaan[0]->stok_last;
            } else {
                $stok = $qty_kecil;
                $stok_last = 0;
            }
            $mt_sediaan = [
                'kode_barang' => $ab['kodeobat'],
                'stok' => $stok,
                'hpp' => $pph_detail_satuan_kecil,
                'kode_unit' => '4001',
                'kode_supplier' => $dataSet['kodesupplier'],
                'ed' => $ab['ed'],
                'stok_in' =>  $qty_kecil,
                'stok_last' =>  $stok_last,
                'tgl_entry' => $this->get_now(),
                'last_update' => $this->get_now(),
            ];
            if (count($cek_sediaan) > 0) {
                ti_stok_pesediaan::where('id', $cek_sediaan[0]->id)->update($mt_sediaan);
            } else {
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
        AND a.`tgl_terima` BETWEEN ? AND ?', [$request->tgl_awal, $request->tgl_akhir]);
        return view('farmasi.tabel_po_header', compact([
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
        WHERE DATE(a.`tgl_entry`) BETWEEN ? AND ?', [$tgl_awal, $tgl_akhir]);
        return view('farmasi.tabel_stok_sediaan', compact([
            'stok_sediaan'
        ]));
    }
    public function Ambil_kartu_stok(Request $request)
    {
        $tgl_awal = $request->tgl_awal;
        $tgl_akhir = $request->tgl_akhir;
        $stok = DB::select('SELECT b.`nama_barang`,a.* FROM ti_kartu_stok a
        INNER JOIN mt_barang b ON a.`kode_barang` = b.`kode_barang`
        WHERE DATE(tgl_stok) BETWEEN ? AND ?', [$tgl_awal, $tgl_akhir]);
        return view('farmasi.tabel_kartu_stok', compact([
            'stok'
        ]));
    }
    public function Ambil_riwayat_resep(Request $request)
    {
        $tgl_awal = $request->tgl_awal;
        $tgl_akhir = $request->tgl_akhir;
        $riwyat_resep = DB::select('SELECT DISTINCT a.`id`,b.`tgl_masuk`,b.no_rm,fc_nama_px(b.`no_rm`) AS namapasien
        ,fc_nama_paramedis(b.`kode_paramedis`) AS nama_dokter
        ,fc_nama_paramedis(a.`dok_kirim`) AS nama_dokter_2
        ,fc_nama_unit1(b.`kode_unit`) AS nama_unit
        ,fc_nama_unit1(a.`kode_unit`) AS nama_unit_2 FROM ts_layanan_header a
        INNER JOIN ts_kunjungan b ON a.`kode_kunjungan` = b.`kode_kunjungan`
        WHERE a.kode_unit = ? AND DATE(b.`tgl_masuk`) BETWEEN ? AND ?
        ', ['4008', $tgl_awal, $tgl_akhir]);
        return view('farmasi.tabel_riwayat_resep', compact([
            'riwyat_resep'
        ]));
    }
    public function Ambil_data_kunjungan_pasien(Request $request)
    {
        $tgl_awal = $request->tglawal;
        $tgl_akhir = $request->tglakhir;
        $datakunjungan = DB::select('SELECT a.tgl_masuk
        ,a.no_rm
        ,a.`kode_kunjungan`
        ,fc_nama_px(a.no_rm) AS nama_pasien
        ,fc_NAMA_PARAMEDIS1(a.`kode_paramedis`) AS dokter_pemeriksa
        ,fc_nama_unit1(a.`kode_unit`) AS unit_asal
        ,fc_NAMA_PENJAMIN2(a.`kode_penjamin`) AS penjamin
        ,a.kode_penjamin
        FROM ts_kunjungan a WHERE DATE(a.`tgl_masuk`) BETWEEN ? AND ?', [$tgl_awal, $tgl_akhir]);
        return view('farmasi.tabel_kunjungan_farmasi', compact([
            'datakunjungan'
        ]));
    }
    public function Ambil_detail_orderan(Request $request)
    {
        $kodekunjungan = $request->kode;
        $rm = $request->rm;
        $data_pasien = db::select('select *,date(tgl_lahir) as tgl_lahir_2,fc_alamat(no_rm) as alamatnya from mt_pasien where no_rm = ?', [$rm]);
        $datakunjungan = DB::select('SELECT a.tgl_masuk
        ,a.no_rm
        ,a.`kode_kunjungan`
        ,fc_nama_px(a.no_rm) AS nama_pasien
        ,fc_NAMA_PARAMEDIS1(a.`kode_paramedis`) AS dokter_pemeriksa
        ,fc_NAMA_PENJAMIN2(a.`kode_penjamin`) AS penjamin
        ,a.kode_penjamin
        ,fc_nama_unit1(a.`kode_unit`) AS unit_asal
        FROM ts_kunjungan a WHERE a.kode_kunjungan = ?', [$kodekunjungan]);
        return view('farmasi.detail_orderan_farmasi', compact([
            'datakunjungan',
            'data_pasien'
        ]));
    }
    public function Cari_obat_reguler(Request $request)
    {
        $nama = $request->nama;
        $data_obat = db::select("CALL sp_cari_obat_semua(?,?)", [$nama, '4008']);
        return view('farmasi.tabel_obat_reguler', compact([
            'data_obat'
        ]));
    }
    public function Cari_obat_racik(Request $request)
    {
        $nama = $request->nama;
        $data_obat = db::select("CALL sp_cari_obat_semua(?,?)", [$nama, '4008']);
        return view('farmasi.tabel_obat_racik', compact([
            'data_obat'
        ]));
    }
    public function Pilih_obat_reguler(Request $request)
    {
        $kodebarang = $request->kodebarang;
        $no = $request->no;
        $barang = db::select('SELECT DISTINCT a.no,b.`nama_barang`,b.satuan,a.* FROM ti_kartu_stok a
        INNER JOIN mt_barang b ON a.`kode_barang` = b.`kode_barang`
        WHERE b.kode_barang = ?', [$kodebarang]);
        return '<div class="form-row"><div class="form-group col-md-4"><label for="inputEmail4">Nama Obat</label><input readonly type="text" class="form-control" id="namabarang"  name="namabarang" value="' . $barang[0]->nama_barang . '"><input hidden class="form-control" name="kodebarangorder" id="kodebarangorder" value="' . $barang[0]->kode_barang . '"><input hidden class="form-control" value="NONRACIKAN" id="tipeobat" name="tipeobat"></div><div class="form-group col-md-1"><label for="inputPassword4">Satuan</label><input readonly type="text" class="form-control" id="satuan" name="satuan" value="' . $barang[0]->satuan . '"></div><div class="form-group col-md-1"><label for="inputPassword4">Jumlah</label><input type="text" class="form-control" id="jumlah" name="jumlah" value="0"></div><div class="form-group col-md-4"><label for="inputPassword4">Aturan Pakai</label><input type="text" class="form-control" id="aturanpakai" name="aturanpakai" value=""></div><i class="bi bi-x-square remove_field form-group col-md-1 text-danger" status="" jenisracik="non-racikan""></i></div>';
    }
    public function Simpan_draft_racik(Request $request)
    {
        $jumlahracikan = $request->jumlahracikan;
        $kodebarang = $request->kodebarang;
        $dosisracik = $request->dosis_racik;
        $dosis_awal = $request->dosis_awal;
        $jumlah = $dosisracik * $jumlahracikan / $dosis_awal;
        $barang = db::select('SELECT DISTINCT a.no,b.`nama_barang`,b.satuan,a.* FROM ti_kartu_stok a
        INNER JOIN mt_barang b ON a.`kode_barang` = b.`kode_barang`
        WHERE b.kode_barang = ?', [$kodebarang]);
        return '<div class="form-row"><div class="form-group col-md-4"><label for="inputEmail4">Nama Obat</label><input readonly type="text" class="form-control" id="namabarang" value="' . $barang[0]->nama_barang . '"><input hidden class="form-control" name="kodebarangorder" id="kodebarangorder" value="' . $barang[0]->kode_barang . '"><input hidden class="form-control" value="RACIKAN" id="tipeobat" name="tipeobat"></div><div class="form-group col-md-1"><label for="inputPassword4">Satuan</label><input readonly type="text" class="form-control" id="satuan" name="satuan" value="' . $barang[0]->satuan . '"></div><div class="form-group col-md-2"><label for="inputPassword4">Dosis awal</label><input readonly type="text" class="form-control" id="dosis_awal" name="dosis_awal" value="' . $dosis_awal . '"></div><div class="form-group col-md-2"><label for="inputPassword4">Dosis Racik</label><input readonly type="text" class="form-control" id="dosis_racik" name="dosis_racik" value="' . $dosisracik . '"></div><div class="form-group col-md-1"><label for="inputPassword4">Jumlah</label><input type="text" class="form-control" id="jumlah" name="jumlah" value="' . $jumlah . '"></div><i class="bi bi-x-square remove_field form-group col-md-1 text-danger" status="" jenisracik="non-racikan""></i></div>';
    }
    public function Simpan_racikan(Request $request)
    {
        $data = json_decode($_POST['header'], true);
        $data_2 = json_decode($_POST['detail'], true);
        foreach ($data as $nama) {
            $index =  $nama['name'];
            $value =  $nama['value'];
            $dataHeader[$index] = $value;
        }
        foreach ($data_2 as $nama) {
            $index = $nama['name'];
            $value = $nama['value'];
            $dataSet[$index] = $value;
            if ($index == 'jumlah') {
                $dataDetail[] = $dataSet;
            }
        }
        $data_header = [
            'nama_racikan' => $dataHeader['namaracikan'],
            'tipe_racikan' => $dataHeader['tiperacikan'],
            'jumlah_racikan' => $dataHeader['jumlahracikan'],
            'kemasan' => $dataHeader['kemasan'],
            'aturan_pakai' => $dataHeader['aturanpakai'],
            'pic' => auth()->user()->id,
            'tgl_entry' => $this->get_now(),
            'kode_unit' => '4008',
            'kode_kunjungan' => $request->kodekunjungan,
            'unit_tujuan' => '4008',
        ];
        $r_h = header_racikan_order::create($data_header);
        foreach ($dataDetail as $o) {
            $data_obat = [
                'id_header' => $r_h->id,
                'kode_barang' => $o['kodebarangorder'],
                'qty' => $o['jumlah'],
                'dosis_awal' => $o['dosis_awal'],
                'dosis_racik' => $o['dosis_racik'],
                'tgl_entry' => $this->get_now(),
            ];
            $det = detail_racikan_order::create($data_obat);
        }
        return '<div class="form-row"><div class="form-group col-md-4"><label for="inputEmail4">Nama Obat</label><input readonly type="text" class="form-control" id="namabarang" name="namabarang" value="' . $dataHeader['namaracikan'] . '"><input hidden class="form-control" name="kodebarangorder" id="kodebarangorder" value="' . $r_h->id . '"><input hidden class="form-control" value="RACIKAN" id="tipeobat" name="tipeobat"></div><div class="form-group col-md-1"><label for="inputPassword4">Satuan</label><input readonly type="text" class="form-control" id="satuan" name="satuan" value="' . $dataHeader['kemasan'] . '"></div><div class="form-group col-md-1"><label for="inputPassword4">Jumlah</label><input type="text" class="form-control" id="jumlah" name="jumlah" value="' . $dataHeader['jumlahracikan'] . '"></div><div class="form-group col-md-4"><label for="inputPassword4">Aturan Pakai</label><input type="text" class="form-control" id="aturanpakai" name="aturanpakai" value="' . $dataHeader['aturanpakai'] . '"></div><i class="bi bi-x-square remove_field form-group col-md-1 text-danger" status="" jenisracik="non-racikan""></i></div>';
    }
    public function Simpan_transaksi_obat(Request $request)
    {
        $formorder = json_decode($_POST['formorder'], true);
        foreach ($formorder as $nama) {
            $index = $nama['name'];
            $value = $nama['value'];
            $dataSet[$index] = $value;
            if ($index == 'aturanpakai') {
                $dataDetail[] = $dataSet;
            }
        }
        //cek stok
        foreach ($dataDetail as $dt) {
            $tipe_obat = $dt['tipeobat'];
            $kode_barang = $dt['kodebarangorder'];
            $jumlah = $dt['jumlah'];
            if ($tipe_obat == 'NONRACIKAN') {
                //cek stok
                $cek_stok = db::select('SELECT * FROM ti_kartu_stok WHERE NO = ( SELECT MAX(a.no ) AS nomor FROM ti_kartu_stok a WHERE kode_barang = ? AND kode_unit = ? )', ([$kode_barang, '4008']));
                $stok_current = $cek_stok[0]->stok_current - $jumlah;
                if ($stok_current < 0) {
                    $data = [
                        'kode' => 500,
                        'message' => 'Stok Tidak Mencukupi !',
                    ];
                    echo json_encode($data);
                    die;
                }
            } else {
                $get_racikan_detail = DB::select('SELECT b.* FROM ts_header_racikan_order a
                INNER JOIN ts_detail_racikan_order b ON a.`id` = b.`id_header`
                WHERE a.id = ?', [$kode_barang]);
                foreach ($get_racikan_detail as $g) {
                    $kode_barang_detail = $g->kode_barang;
                    $cek_stok = db::select('SELECT * FROM ti_kartu_stok WHERE NO = ( SELECT MAX(a.no ) AS nomor FROM ti_kartu_stok a WHERE kode_barang = ? AND kode_unit = ? )', ([$kode_barang_detail, '4008']));
                    $stok_current = $cek_stok[0]->stok_current - $g->qty;
                    if ($stok_current < 0) {
                        $data = [
                            'kode' => 500,
                            'message' => 'Stok Tidak Mencukupi !',
                        ];
                        echo json_encode($data);
                        die;
                    }
                }
            }
        }
        $data_kunjungan = db::select('select * from ts_kunjungan where kode_kunjungan = ?',[$request->kodekunjungan]);
        $penjamin = $data_kunjungan[0]->kode_penjamin;
        $dokter = $data_kunjungan[0]->kode_paramedis;
        $unitkunjungan = $data_kunjungan[0]->kode_unit;
        if($penjamin == 'P01'){
            $kode_tipe_transaksi = 1;
        }else{
            $kode_tipe_transaksi = 2;
        }
        $unitlog = auth()->user()->unit;
        $r = DB::connection('mysql')->select("CALL GET_NOMOR_LAYANAN_HEADER($unitlog)");
        $kode_layanan_header = $r[0]->no_trx_layanan;
        $unit = DB::select('select * from mt_unit where kode_unit = ?', [$unitlog]);
        if (strlen($kode_layanan_header) < 5) {
            $year = date('y');
            $kode_layanan_header = $unit[0]['prefix_unit'] . $year . date('m') . date('d') . '000001';
            DB::connection('mysql')->select('insert into mt_nomor_trx (tgl,no_trx_layanan,unit) values (?,?,?)', [date('Y-m-d h:i:s'), $kode_layanan_header, $unitlog]);
        }
        $ts_layanan_header = [
            'kode_layanan_header' => $kode_layanan_header,
            'tgl_entry' => $this->get_now(),
            'kode_kunjungan' => $request->kodekunjungan,
            'kode_unit' => '4008',
            'kode_tipe_transaksi' => $kode_tipe_transaksi,
            'pic' => auth()->user()->id,
            'status_layanan' => '8',
            'keterangan' => 'FARMASI BARU',
            'status_retur' => 'OPN',
            'tagihan_pribadi' => '0',
            'tagihan_penjamin' => '0',
            'status_pembayaran' => 'OPN',
            'dok_kirim' => $dokter,
            'unit_pengirim' => $unitkunjungan
        ];
        $tsheader = ts_layanan_header::create($ts_layanan_header);
        //input layanan
        $NOW = $this->get_now();
        $gt_header = 0;
        foreach ($dataDetail as $dt) {
            $tipe_obat = $dt['tipeobat'];
            $kode_barang = $dt['kodebarangorder'];
            $jumlah = $dt['jumlah'];
            //insert layanan detail, jika obat racik maka insert ke ts_racikan header dan ts_racikan_detail
            if ($tipe_obat == 'NONRACIKAN') {
                $mt_barang = DB::select('select * from mt_barang where kode_barang = ?',[$kode_barang]);
                $jumlah_layanan = $mt_barang[0]->harga_jual * $jumlah;
                if($penjamin == 'P01'){
                    $tagihan_pribadi = $jumlah_layanan;
                    $tagihan_penjamin = 0;
                }else{
                    $tagihan_penjamin = $jumlah_layanan;
                    $tagihan_pribadi = 0;
                }
                $ts_layanan_detail = [
                    'id_layanan_detail' => $this->createLayanandetail(),
                    'kode_layanan_header' =>$kode_layanan_header,
                    'kode_tarif_detail' => '',
                    'total_tarif' => $mt_barang[0]->harga_jual,
                    'jumlah_layanan' => $jumlah,
                    'total_layanan' => $jumlah_layanan,
                    'grantotal_layanan' => $jumlah_layanan,
                    'status_layanan_detail' => 'OPN',
                    'tgl_layanan_detail' => $NOW,
                    'kode_barang' => $kode_barang,
                    'aturan_pakai' => $dt['aturanpakai'],
                    'kategori_resep' => 'NONRACIKAN',
                    'satuan_barang' => $mt_barang[0]->satuan,
                    'tipe_anestesi' => '0',
                    'tagihan_pribadi' => $tagihan_pribadi,
                    'tagihan_penjamin' => $tagihan_penjamin,
                    'tgl_layanan_detail_2' => $NOW,
                    'row_id_header' => $tsheader->id,
                ];
               ts_layanan_detail::create($ts_layanan_detail);
               $gt_header = $gt_header + $jumlah_layanan;
            } else {
                $get_racikan_detail = DB::select('SELECT a.*,b.* FROM ts_header_racikan_order a
                INNER JOIN ts_detail_racikan_order b ON a.`id` = b.`id_header`
                WHERE a.id = ?', [$kode_barang]);
                // dd($get_racikan_detail);
                $kode_racik = $this->get_kode_racik_real();
                $header_racikan = [
                    'kode_racik' => $kode_racik,
                    'tgl_racik' => $NOW,
                    'nama_racik' => $dt['namabarang'],
                    'total_racik' => $dt['jumlah'],
                    'tipe_racik' => $get_racikan_detail[0]->tipe_racikan,
                    'qty_racik' => $get_racikan_detail[0]->jumlah_racikan,
                ];
                header_racikan::create($header_racikan);
                $gt_racik = 0;
                foreach ($get_racikan_detail as $g) {
                    $kode_barang_detail = $g->kode_barang;
                    $mt_barang = DB::select('select * from mt_barang where kode_barang = ?',[$kode_barang_detail]);
                    $jumlah_layanan_racik = $mt_barang[0]->harga_jual * $g->qty;
                    $data_obat_racik = [
                        'kode_racik' => $kode_racik,
                        'kode_barang' => $kode_barang_detail,
                        'qty_barang' => $g->qty,
                        'satuan_barang' => $mt_barang[0]->satuan,
                        'harga_satuan_barang' => $mt_barang[0]->harga_jual,
                        'subtotal_barang' => $jumlah_layanan_racik,
                        'grantotal_barang' => $jumlah_layanan_racik
                    ];
                    detail_racikan::create($data_obat_racik);
                    $gt_racik = $gt_racik + $jumlah_layanan_racik;
                }
                if($penjamin == 'P01'){
                    $tagihan_pribadi = $gt_racik;
                    $tagihan_penjamin = 0;
                }else{
                    $tagihan_penjamin = $gt_racik;
                    $tagihan_pribadi = 0;
                }
                $ts_layanan_detail = [
                    'id_layanan_detail' => $this->createLayanandetail(),
                    'kode_layanan_header' => $kode_layanan_header,
                    'kode_tarif_detail' => '',
                    'total_tarif' => $gt_racik,
                    'jumlah_layanan' => $jumlah,
                    'total_layanan' => $gt_racik,
                    'grantotal_layanan' => $gt_racik,
                    'status_layanan_detail' => 'OPN',
                    'tgl_layanan_detail' => $NOW,
                    'kode_barang' => $kode_racik,
                    'aturan_pakai' => $get_racikan_detail[0]->aturan_pakai,
                    'kategori_resep' => '',
                    'satuan_barang' => $get_racikan_detail[0]->kemasan,
                    'tipe_anestesi' => '0',
                    'tagihan_pribadi' => $tagihan_pribadi,
                    'tagihan_penjamin' => $tagihan_penjamin,
                    'tgl_layanan_detail_2' => $NOW,
                    'row_id_header' => $tsheader->id,
                ];
                $gt_header = $gt_header + $gt_racik;
                ts_layanan_detail::create($ts_layanan_detail);
            }
        }
        if($penjamin == 'P01'){
            $tpri = $gt_header;
            $tpen = 0;
        }else{
            $tpri = 0;
            $tpen = $gt_header;
        }
        $data_header_2 = [
            'status_layanan' => 1,
            'total_layanan' => $gt_header,
            'tagihan_penjamin' => $tpri,
            'tagihan_pribadi' => $tpen,
        ];
        ts_layanan_header::where('id', $tsheader->id)
        ->update($data_header_2);
        $data = [
            'kode' => 200,
            'message' => 'Transaksi obat berhasil disimpan ...',
        ];
        echo json_encode($data);
        die;
    }
    public function Kartu_stok_farmasi(Request $request)
    {
        $menu = "kartustok";
        $now = $this->get_date();
        return view('farmasi.index_kartu_stok_farmasi', compact([
            'now',
            'menu'
        ]));
    }
    public function Riwayat_resep_farmasi(Request $request)
    {
        $menu = "Riwayatresep";
        $now = $this->get_date();
        return view('farmasi.Index_riwayat_resep_farmasi', compact([
            'now',
            'menu'
        ]));
    }
    public function Detail_po(Request $request)
    {
        $kode_po = $request->kode;
        $nama = $request->nama;
        $tgl_beli = $request->tgl_beli;
        $tgl_terima = $request->tgl_terima;
        $riwayat = DB::select('SELECT b.nama_barang,a.* FROM tg_po_detail a
        INNER JOIN mt_barang b ON a.`kode_barang` = b.`kode_barang` where a.kode_po = ?', [$request->kode]);
        return view('farmasi.tabel_po_detail', compact([
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
        <label for="inputPassword4">Qty besar</label>
        <input type="text" class="form-control" id="isi" name="isi" value="0">
        </div>
        <div class="form-group col-md-1">
        <label for="inputPassword4">Qty kecil</label>
        <input type="text" class="form-control" id="qtykecil" name="qtykecil" value="0">
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
    public function Ambil_riwayat_po(Request $request)
    {
        $tanggalawal = $request->awal;
        $tanggalakhir = $request->akhir;
        $header_po = DB::select('SELECT a.id,a.`no_faktur`,b.`nama_supplier`,a.`tgl_beli`,a.`tgl_terima`,a.`tgl_input`,a.`sub_gtotal_po`,a.`gtotal_po`,a.`pph`,a.`ppn`,a.`materai`,a.`disk_persen`,a.`disk_rupiah` FROM tg_po_header a
        INNER JOIN mt_supplier b ON a.`kode_supplier` = b.`kode_supplier` WHERE DATE(a.`tgl_terima`) BETWEEN ? AND ?', [$tanggalawal, $tanggalakhir]);
        return view('farmasi.tabel_riwayat_po', compact([
            'header_po'
        ]));
    }
    public function Detail_riwayat_po(Request $request)
    {
        $id = $request->id;
        $header_po = DB::select('SELECT a.kode_po,a.id,a.`no_faktur`,b.`nama_supplier`,b.alamat_supplier,b.tlp,date(a.`tgl_beli`) as tgl_beli,date(a.`tgl_terima`) as tgl_terima,a.`tgl_input`,a.`sub_gtotal_po`,a.`gtotal_po`,a.`pph`,a.`ppn`,a.`materai`,a.`disk_persen`,a.`disk_rupiah` FROM tg_po_header a
        INNER JOIN mt_supplier b ON a.`kode_supplier` = b.`kode_supplier` WHERE a.id = ?', [$id]);

        $detail = DB::select('SELECT b.`nama_barang`,a.* FROM tg_po_detail a
        INNER JOIN mt_barang b ON a.`kode_barang` = b.`kode_barang`
        WHERE a.kode_po = ?', [$header_po[0]->kode_po]);
        return view('farmasi.detail_riwayat_po', compact([
            'header_po',
            'detail'
        ]));
    }
    public function get_kode_racik_real()
    {
        $q = DB::connection('mysql')->select('SELECT id,kode_racik,RIGHT(kode_racik,3) AS kd_max  FROM mt_racikan
        WHERE DATE(tgl_racik) = CURDATE()
        ORDER BY id DESC
        LIMIT 1');
        $kd = "";
        if (count($q) > 0) {
            foreach ($q as $k) {
                $tmp = ((int) $k->kd_max) + 1;
                $kd = sprintf("%03s", $tmp);
            }
        } else {
            $kd = "001";
        }
        date_default_timezone_set('Asia/Jakarta');
        return 'R' . date('ymd') . $kd;
    }
    public function createLayanandetail()
    {
        $q = DB::connection('mysql')->select('SELECT id,id_layanan_detail,RIGHT(id_layanan_detail,6) AS kd_max  FROM ts_layanan_detail
        WHERE DATE(tgl_layanan_detail) = CURDATE()
        ORDER BY id DESC
        LIMIT 1');
        $kd = "";
        if (count($q) > 0) {
            foreach ($q as $k) {
                $tmp = ((int) $k->kd_max) + 1;
                $kd = sprintf("%06s", $tmp);
            }
        } else {
            $kd = "000001";
        }
        date_default_timezone_set('Asia/Jakarta');
        return 'DET' . date('ymd') . $kd;
    }
}
