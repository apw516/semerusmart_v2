<?php

namespace App\Http\Controllers;

use App\Models\ts_kunjungan;
use App\Models\SatuSehatModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PendaftaranController extends Controller
{
    public function DaftarPelayanan()
    {
        $menu = "Daftar Pelayanan";
        $agama = DB::select('select * from mt_agama');
        $pendidikan = DB::select('select * from mt_pendidikan');
        $pekerjaan = DB::select('select * from mt_pekerjaan');
        $status_perkawinan = DB::select('select * from mt_status_perkawinan');
        return view('pendaftaran.index', compact([
            'menu',
            'agama',
            'pendidikan',
            'pekerjaan',
            'status_perkawinan'
        ]));
    }
    public function Riwayat_pendaftaran()
    {
        $menu = "Riwayat Pendaftaran";
        $now = $this->get_date();
        return view('pendaftaran.index_riwayat_pendaftaran', compact([
            'menu',
            'now'
        ]));
    }
    public function Cari_provinsi(Request $request)
    {
        $result = DB::table('mt_lokasi_provinces')->where('name', 'LIKE', '%' . $request['prov'] . '%')->get();
        if (count($result) > 0) {
            foreach ($result as $row)
                $arr_result[] = array(
                    'label' => $row->name,
                    'kode' => $row->id,
                );
            echo json_encode($arr_result);
        }
    }
    public function Cari_kabupaten(Request $request)
    {
        // dd($request->prov);
        $result = DB::table('mt_lokasi_regencies')->where('name', 'LIKE', '%' . $request['kab'] . '%')->where('province_id', '=', $request->prov)->get();
        if (count($result) > 0) {
            foreach ($result as $row)
                $arr_result[] = array(
                    'label' => $row->name,
                    'kode' => $row->id,
                );
            echo json_encode($arr_result);
        }
    }
    public function Cari_kecamatan(Request $request)
    {
        $result = DB::table('mt_lokasi_districts')->where('name', 'LIKE', '%' . $request['kec'] . '%')->where('regency_id', '=', $request->kab)->get();
        if (count($result) > 0) {
            foreach ($result as $row)
                $arr_result[] = array(
                    'label' => $row->name,
                    'kode' => $row->id,
                );
            echo json_encode($arr_result);
        }
    }
    public function Cari_desa(Request $request)
    {
        $result = DB::table('mt_lokasi_villages')->where('name', 'LIKE', '%' . $request['des'] . '%')->where('district_id', '=', $request->kec)->get();
        if (count($result) > 0) {
            foreach ($result as $row)
                $arr_result[] = array(
                    'label' => $row->name,
                    'kode' => $row->id,
                );
            echo json_encode($arr_result);
        }
    }
    public function Ambil_data_pasien(Request $request)
    {
        $data_pasien = db::select('select date(tgl_entry) as tgl_masuk,jenis_kelamin,date(tgl_lahir) as tgl_lahir,no_rm,no_Bpjs,nik_bpjs,nama_px,fc_alamat(no_rm) as alamat from mt_pasien order by date(tgl_entry) Desc Limit 25');
        return view('pendaftaran.tabel_pasien', compact([
            'data_pasien'
        ]));
    }
    public function Ambil_riwayat_pendaftaran(Request $request)
    {
        $data_kunjungan = db::select('SELECT *,fc_nama_px(no_rm) as nama_pasien,fc_alamat4(no_rm) as alamat,fc_nama_unit1(kode_unit) as nama_unit,fc_NAMA_PENJAMIN2(kode_penjamin) as nama_penjamin FROM ts_kunjungan WHERE DATE(tgl_masuk) BETWEEN ? AND ?',[$request->awal,$request->akhir]);
        return view('pendaftaran.tabel_riwayat_kunjungan', compact([
            'data_kunjungan'
        ]));
    }
    public function Cari_pasien(Request $request)
    {
        $data_pasien = DB::select("CALL WSP_PANGGIL_DATAPASIEN('$request->rm','$request->nama','','$request->ktp','$request->bpjs')");
        return view('pendaftaran.tabel_pasien_pencarian', compact([
            'data_pasien'
        ]));
    }
    public function get_date()
    {
        $dt = Carbon::now()->timezone('Asia/Jakarta');
        $date = $dt->toDateString();
        $now = $date;
        return $now;
    }
    public function get_now()
    {
        $dt = Carbon::now()->timezone('Asia/Jakarta');
        $date = $dt->toDateString();
        $time = $dt->toTimeString();
        $now = $date . ' ' . $time;
        return $now;
    }
    public function Ambil_detail_pasien(Request $request)
    {
        $data_pasien = DB::select('select no_rm,nama_px,date(tgl_lahir) as tgl_lahir,no_Bpjs,nik_bpjs,fc_alamat(no_rm) as alamat from mt_pasien where no_rm = ?', [$request->rm]);
        $riwayat_kunjungan = DB::select('select * ,fc_nama_unit1(kode_unit) as nama_unit from ts_kunjungan where no_rm = ?', [$request->rm]);
        $now = $this->get_date();
        $mt_unit = DB::select('select * from mt_unit where group_unit = ?',['J']);
        return view('pendaftaran.detail_pasien', compact([
            'data_pasien',
            'riwayat_kunjungan',
            'now',
            'mt_unit'
        ]));
    }
    public function Simpan_pendaftaran(Request $request)
    {
        $data = json_decode($_POST['form_pendaftaran'], true);
        foreach ($data as $nama) {
            $index =  $nama['name'];
            $value =  $nama['value'];
            $dataSet[$index] = $value;
        }
        if($dataSet['tujuan'] == '0'){
            $back = [
                'kode' => 500,
                'message' => 'Tujuan pelayanan belum dipilih !'
            ];
            echo json_encode($back);
            die;
        }
        if($dataSet['penjamin'] == 'P02' && $dataSet['nomorbpjs'] == ''){
            $back = [
                'kode' => 500,
                'message' => 'Nomor BPJS pasien belum diisi ...'
            ];
            echo json_encode($back);
            die;
        }
        $cek_rm = DB::select('select * from ts_kunjungan where no_rm = ?', [$dataSet['nomorrm']]);
        if (count($cek_rm) == 0) {
            $counter = 1;
        } else {
            foreach ($cek_rm as $c)
                $arr_counter[] = array(
                    'counter' => $c->counter
                );
            $last_count = max($arr_counter);
            $counter = $last_count['counter'] + 1;
        }
        $ts_kunjungan = [
            'counter' => $counter,
            'no_rm' => $dataSet['nomorrm'],
            'kode_unit' => $dataSet['tujuan'],
            'tgl_masuk' => $this->get_now(),
            'status_kunjungan' => 1,
            'kode_penjamin' => $dataSet['penjamin'],
            'pic' => 1,
        ];
        try {
            ts_kunjungan::create($ts_kunjungan);
            $back = [
                'kode' => 200,
                'message' => 'Pendaftaran Pasien berhasil ...'
            ];
            echo json_encode($back);
            die;
        } catch (\Exception $e) {
            $back = [
                'kode' => 500,
                'message' => $e->getMessage()
            ];
            echo json_encode($back);
            die;
        }
    }
    public function Simpan_pasien_baru(Request $request)
    {
        $data = json_decode($_POST['form_pasien_baru'], true);
        foreach ($data as $nama) {
            $index =  $nama['name'];
            $value =  $nama['value'];
            $dataSet[$index] = $value;
        }
        dd($dataSet);
    }
}
