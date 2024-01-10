@extends('templates.main')
@section('container')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Daftar Pelayanan</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Daftar Pelayanan</li>
                    </ol>
                </div>
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <section class="content">
        <div class="v_1">
            <div class="container-fluid">
                <button class="btn btn-success" data-toggle="modal" data-target="#modalpasienbaru"><i
                        class="bi bi-person-plus-fill mr-1 ml-1"></i> Pasien Baru</button>
                <button class="btn btn-warning" data-toggle="modal" data-target="#modalantrian"><i
                        class="bi bi-list-ol mr-1 ml-1"></i> Antrian</button>
                <button class="btn btn-primary float-right" data-toggle="modal" data-target="#modalantrian"><i
                        class="bi bi-list-ol mr-1 ml-1"></i> Riwayat Pendaftaran</button>
                <div class="row mt-2">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header bg-light"><i class="bi bi-search ml-1 mr-1"></i> Pencarian Pasien</div>
                            <div class="card-body">
                                <div class="form-row">
                                    <div class="form-group col-md-2">
                                        <label for="inputEmail4">Nomor RM</label>
                                        <input type="text" class="form-control" id="nomorrm" name="nomorrm"
                                            placeholder="Masukan nomor rm ...">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="inputPassword4">Nomor KTP</label>
                                        <input type="text" class="form-control" id="nomorktp" name="nomorktp"
                                            placeholder="Masukan nomor ktp ...">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="inputPassword4">Nomor BPJS</label>
                                        <input type="text" class="form-control" id="nomorbpjs" name="nomorbpjs"
                                            placeholder="Masukan nomor bpjs ...">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="inputPassword4">Nama Pasien</label>
                                        <input type="text" class="form-control" id="namapasien" name="namapasien"
                                            placeholder="Masukan nama pasien ...">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <button class="btn btn-success" style="margin-top:31px" onclick="cari_pasien()"><i
                                                class="bi bi-search ml-1 mr-1"></i>Cari Pasien</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="v_tabel_pasien">

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div hidden class="v_2">
            <button class="btn btn-danger kembali"><i class="bi bi-backspace ml-1 mr-1"></i>Kembali</button>
            <div class="v_detail_pasien">

            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="modalpasienbaru" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"><i class="bi bi-person-plus-fill mr-1 ml-1"></i>
                            Pasien Baru</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="form_pasien_baru">
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="inputEmail4">NIK</label>
                                    <input type="text" class="form-control" id="nik" name="nik"
                                        placeholder="Masukan Nomor Identitas Pasien ...">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputPassword4">Nomor Asuransi / Nomor BPJS</label>
                                    <input type="text" class="form-control" id="nomorasuransi" name="nomorasuransi"
                                        placeholder="Masukan Nomor Asuransi Pasein, jika ada ...">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputPassword4">Nomor Telephone</label>
                                    <input type="text" class="form-control" id="notelp" name="notelp"
                                        placeholder="Masukan Nomor Telephone / handphone, jika ada ...">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputAddress">Nama Pasien</label>
                                <input type="text" class="form-control" id="namapasien" name="namapasien"
                                    placeholder="Masukan Nama Lengkap Pasien ...">
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <label for="inputCity">Tempat Lahir</label>
                                    <input type="text" class="form-control" id="tempatlahir" name="tempatlahir"
                                        placeholder="Masukan Tempat Lahir Pasien ...">
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="inputZip">Tanggal Lahir</label>
                                    <input type="date" class="form-control" id="tanggallahir" name="tanggallahir">
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="inputZip">Agama</label>
                                    <select id="agama" name="agama" class="form-control">
                                        <option selected>Siahkan Pilih</option>
                                        @foreach ($agama as $ag)
                                            <option value="{{ $ag->ID }}">{{ $ag->agama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputState">Jenis Kelamin</label>
                                    <select id="jeniskelamin" name="jeniskelamin" class="form-control">
                                        <option selected>Siahkan Pilih</option>
                                        <option value="L">Laki - Laki</option>
                                        <option value="P">Perempuan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-2">
                                    <label for="inputCity">Negara</label>
                                    <input type="text" class="form-control" id="namanegara"
                                        name="namanegara "value="Indonesia" placeholder="Cari Nama Negara">
                                    <input hidden type="text" class="form-control" id="idnegara" name="idnegara"
                                        value="101">
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="inputZip">Provinsi</label>
                                    <input type="text" class="form-control" id="namaprovinsi" name="namaprovinsi"
                                        placeholder="Cari Nama Provinsi ...">
                                    <input hidden type="text" class="form-control" id="kodeprovinsi"
                                        name="kodeprovinsi">
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="inputZip">Kabupaten</label>
                                    <input type="text" class="form-control" id="namakabupaten" name="namakabupaten"
                                        placeholder="Cari Nama Kabupaten ...">
                                    <input hidden type="text" class="form-control" id="kodekabupaten"
                                        name="kodekabupaten">
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="inputZip">Kecamatan</label>
                                    <input type="text" class="form-control" id="namakecamatan" name="namakecamatan"
                                        placeholder="Cari Nama Kecamatan ...">
                                    <input hidden type="text" class="form-control" id="kodekecamatan"
                                        name="kodekecamatan">
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="inputZip">Desa</label>
                                    <input type="text" class="form-control" id="namadesa" name="namadesa"
                                        placeholder="Cari Nama Desa ...">
                                    <input hidden type="text" class="form-control" id="kodedesa" name="kodedesa">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputAddress">Alamat</label>
                                <textarea type="text" class="form-control" id="alamat" name="alamat"
                                    placeholder="Contoh Format Penulisan : Dusun II,Rt 001 Rw 002"></textarea>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <label for="inputCity">Pekerjaan</label>
                                    <select id="pekerjaan" name="pekerjaan" class="form-control">
                                        <option selected>Siahkan Pilih</option>
                                        @foreach ($pekerjaan as $pj)
                                            <option value="{{ $pj->ID }}">{{ $pj->pekerjaan }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="inputZip">Pendidikan</label>
                                    <select id="pendidikan" name="pendidikan" class="form-control">
                                        <option selected>Siahkan Pilih</option>
                                        @foreach ($pendidikan as $pd)
                                            <option value="{{ $pd->ID }}">{{ $pd->pendidikan }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="inputZip">Status Perkawinan</label>
                                    <select id="statusperkawinan" name="statusperkawinan" class="form-control">
                                        <option selected>Siahkan Pilih</option>
                                        @foreach ($status_perkawinan as $sp)
                                            <option value="{{ $sp->ID }}">{{ $sp->status_kawin }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                        <button type="button" class="btn btn-success" onclick="simpanpasienbaru()">Simpan</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="modalantrian" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"><i class="bi bi-card-checklist mr-1 ml-1"></i>
                            List Antrian</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        ...
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>
        <script>
            $(document).ready(function() {
                rm = $('#nomorrm').val()
                ktp = $('#nomorktp').val()
                bpjs = $('#nomorbpjs').val()
                nama = $('#namapasien').val()
                ambildatapasien(rm, ktp, bpjs, nama)
            })

            function ambildatapasien(rm = $('#nomorrm').val(), ktp = $('#nomorktp').val(), bpjs = $('#nomorbpjs').val(), nama =
                $('#namapasien').val()) {
                spinner = $('#loader2')
                spinner.show();
                $.ajax({
                    type: 'post',
                    data: {
                        _token: "{{ csrf_token() }}",
                        rm,
                        ktp,
                        bpjs,
                        nama,
                    },
                    url: '<?= route('ambildatapasien') ?>',
                    error: function(response) {
                        spinner.hide();
                        alert('error')
                    },
                    success: function(response) {
                        spinner.hide();
                        $('.v_tabel_pasien').html(response);
                    }
                });
            }

            function cari_pasien(rm = $('#nomorrm').val(), ktp = $('#nomorktp').val(), bpjs = $('#nomorbpjs').val(), nama = $(
                '#namapasien').val()) {
                spinner = $('#loader2')
                spinner.show();
                $.ajax({
                    type: 'post',
                    data: {
                        _token: "{{ csrf_token() }}",
                        rm,
                        ktp,
                        bpjs,
                        nama,
                    },
                    url: '<?= route('caripasien') ?>',
                    error: function(response) {
                        spinner.hide();
                        alert('error')
                    },
                    success: function(response) {
                        spinner.hide();
                        $('.v_tabel_pasien').html(response);
                    }
                });
            }
            $(function() {
                $('#tbrk').DataTable({
                    "paging": true,
                    "lengthChange": false,
                    "searching": false,
                    "ordering": true,
                    "info": false,
                    "autoWidth": false,
                    "responsive": true,
                });
            });
            $(".kembali").on('click', function(event) {
                $('.v_2').attr('hidden', true)
                $('.v_1').removeAttr('hidden', true)
            });
            $(document).ready(function() {
                $('#namaprovinsi').autocomplete({
                    source: function(request, response) {
                        $.getJSON("<?= route('cariprovinsi') ?>", {
                                prov: $('#namaprovinsi').val()
                            },
                            response);
                    },
                    select: function(event, ui) {
                        $('[id="namaprovinsi"]').val(ui.item.label);
                        $('[id="kodeprovinsi"]').val(ui.item.kode);
                    }
                });
            });
            $(document).ready(function() {
                $('#namakabupaten').autocomplete({
                    source: function(request, response) {
                        $.getJSON("<?= route('carikabupaten') ?>", {
                                kab: $('#namakabupaten').val(),
                                prov: $('#kodeprovinsi').val()
                            },
                            response);
                    },
                    select: function(event, ui) {
                        $('[id="namakabupaten"]').val(ui.item.label);
                        $('[id="kodekabupaten"]').val(ui.item.kode);
                    }
                });
            });
            $(document).ready(function() {
                $('#namakecamatan').autocomplete({
                    source: function(request, response) {
                        $.getJSON("<?= route('carikecamatan') ?>", {
                                kec: $('#namakecamatan').val(),
                                kab: $('#kodekabupaten').val()
                            },
                            response);
                    },
                    select: function(event, ui) {
                        $('[id="namakecamatan"]').val(ui.item.label);
                        $('[id="kodekecamatan"]').val(ui.item.kode);
                    }
                });
            });
            $(document).ready(function() {
                $('#namadesa').autocomplete({
                    source: function(request, response) {
                        $.getJSON("<?= route('caridesa') ?>", {
                                des: $('#namadesa').val(),
                                kec: $('#kodekecamatan').val()
                            },
                            response);
                    },
                    select: function(event, ui) {
                        $('[id="namadesa"]').val(ui.item.label);
                        $('[id="kodedesa"]').val(ui.item.kode);
                    }
                });
            });

            function simpanpasienbaru() {
                var form_pasien_baru = $('.form_pasien_baru').serializeArray();
                spinner = $('#loader2')
                spinner.show();
                $.ajax({
                    async: true,
                    type: 'post',
                    dataType: 'json',
                    data: {
                        _token: "{{ csrf_token() }}",
                        form_pasien_baru: JSON.stringify(form_pasien_baru)
                    },
                    url: '<?= route('simpanpasienbaru') ?>',
                    error: function(data) {
                        spinner.hide();
                        Swal.fire({
                            icon: 'error',
                            title: 'Ooops....',
                            text: 'Sepertinya ada masalah......',
                            footer: ''
                        })
                    },
                    success: function(data) {
                        spinner.hide();
                        Swal.fire({
                            icon: 'success',
                            title: 'OK',
                            text: data.message,
                            footer: ''
                        })
                        ambildatapasien(rm = $('#nomorrm').val(), ktp = $('#nomorktp').val(), bpjs = $('#nomorbpjs')
                            .val(), nama =  $('#namapasien').val())
                    }
                });
            }
        </script>
    </section>
    <!-- /.content -->
@endsection
