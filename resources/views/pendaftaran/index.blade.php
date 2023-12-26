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
                <button class="btn btn-warning" data-toggle="modal" data-target="#modalantrian"><i class="bi bi-list-ol mr-1 ml-1"></i> Antrian</button>
                <div class="row mt-2">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header bg-light"><i class="bi bi-search ml-1 mr-1"></i> Pencarian Pasien</div>
                            <div class="card-body">
                                <div class="form-row">
                                    <div class="form-group col-md-2">
                                        <label for="inputEmail4">Nomor RM</label>
                                        <input type="text" class="form-control" id="inputEmail4"
                                            placeholder="Masukan nomor rm ...">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="inputPassword4">Nomor KTP</label>
                                        <input type="text" class="form-control" id="inputPassword4"
                                            placeholder="Masukan nomor ktp ...">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="inputPassword4">Nomor BPJS</label>
                                        <input type="text" class="form-control" id="inputPassword4"
                                            placeholder="Masukan nomor bpjs ...">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="inputPassword4">Nama Pasien</label>
                                        <input type="text" class="form-control" id="inputPassword4"
                                            placeholder="Masukan nama pasien ...">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <button class="btn btn-success" style="margin-top:31px"><i
                                                class="bi bi-search ml-1 mr-1"></i>Cari Pasien</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header bg-info"><i class="bi bi-database-fill mr-1 ml-1"></i>Data Pasien Baru
                            </div>
                            <div class="card-header">
                                <table id="tabelpasien" class="table table-sm table-bordered table-hover">
                                    <thead>
                                        <th>Nomor RM</th>
                                        <th>Nomor KTP</th>
                                        <th>Nomor BPJS</th>
                                        <th>Nama Pasien</th>
                                        <th>Alamat</th>
                                        <th>Action</th>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>23900111</td>
                                            <td>3209330506931111</td>
                                            <td>11101212000</td>
                                            <td>Pasien 1</td>
                                            <td>Dusun 3 RT 01 RW 02 Desa Babakan Kec Babakan Kab Cirebon</td>
                                            <td><button class="btn btn-success btn-sm daftarpasien"><i
                                                        class="bi bi-r-square mr-1 ml-1"></i>Daftar</button></td>
                                        </tr>
                                        <tr>
                                            <td>23900111</td>
                                            <td>3209330506931111</td>
                                            <td>11101212000</td>
                                            <td>Pasien 1</td>
                                            <td>Dusun 3 RT 01 RW 02 Desa Babakan Kec Babakan Kab Cirebon</td>
                                            <td><button class="btn btn-success btn-sm"><i
                                                        class="bi bi-r-square mr-1 ml-1"></i>Daftar</button></td>
                                        </tr>
                                        <tr>
                                            <td>23900111</td>
                                            <td>3209330506931111</td>
                                            <td>11101212000</td>
                                            <td>Pasien 1</td>
                                            <td>Dusun 3 RT 01 RW 02 Desa Babakan Kec Babakan Kab Cirebon</td>
                                            <td><button class="btn btn-success btn-sm"><i
                                                        class="bi bi-r-square mr-1 ml-1"></i>Daftar</button></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div hidden class="v_2">
            <button class="btn btn-danger kembali"><i class="bi bi-backspace ml-1 mr-1"></i>Kembali</button>
            <div class="row mt-4">
                <div class="col-md-2">
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle"
                                    src="{{ asset('public/adminlte/dist/img/user4-128x128.jpg') }}"
                                    alt="User profile picture">
                            </div>
                            <h3 class="profile-username text-center">Nina Mcintire</h3>

                            <p class="text-muted text-center">RM : 123445</p>

                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b>Nomor BPJS</b> <a class="float-right">1,322</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Tgl Lahir</b> <a class="float-right">05-06-1992</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Alamat</b> <a class="float-right">Dusun Bambu No.12 Rt 001 Rw 002 Kelurahan Coblong
                                        Kec Dago Kota Bandung</a>
                                </li>
                            </ul>
                        </div>
                        <!-- /.card-body -->
                    </div>

                </div>
                <div class="col-md-10">
                    <div class="card">
                        <div class="card-header bg-secondary"><i class="bi bi-list-check mr-1 ml-1"></i>Riwayat Kunjungan
                        </div>
                        <div class="card-body">
                            <table id="tbrk" class="table table-sm table-hover text-xs">
                                <thead>
                                    <th>Tanggal Masuk</th>
                                    <th>Poli Tujuan</th>
                                    <th>Keluhan</th>
                                    <th>Dokter Pemeriksan</th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>2023-12-12</td>
                                        <td>Poli Umum</td>
                                        <td>Pusing</td>
                                        <td>dr. xxx</td>
                                    </tr>
                                    <tr>
                                        <td>2023-12-12</td>
                                        <td>Poli Umum</td>
                                        <td>Pusing</td>
                                        <td>dr. xxx</td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header bg-info">Form Pendaftaran Pelayanan</div>
                        <div class="card-body">
                            <form>
                                <div class="form-group row">
                                    <label for="staticEmail" class="col-sm-2 col-form-label">Penjamin</label>
                                    <div class="col-sm-10">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="inlineRadioOptions"
                                                id="inlineRadio1" value="option1" selected>
                                            <label class="form-check-label" for="inlineRadio1">BPJS</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="inlineRadioOptions"
                                                id="inlineRadio2" value="option2">
                                            <label class="form-check-label" for="inlineRadio2">PRIBADI</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword" class="col-sm-2 col-form-label">Tanggal Daftar</label>
                                    <div class="col-sm-4">
                                        <input type="date" class="form-control" id="inputPassword">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword" class="col-sm-2 col-form-label">Tujuan Pelayanan</label>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <select class="form-control" id="exampleFormControlSelect1">
                                                <option>Silahkan Pilih</option>
                                                <option>Poli Umum</option>
                                                <option>Poli Gigi</option>
                                                <option>Poli Anak</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-success float-right mr-1 ml-1"
                                    onclick="simpanpendaftaran()"><i class="bi bi-download mr-1 ml-1"></i>Simpan</button>
                                <button type="button" class="btn btn-danger float-right kembali"><i
                                        class="bi bi-backspace ml-1 mr-1"></i>Batal</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="modalpasienbaru" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
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
                        ...
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                        <button type="button" class="btn btn-success">Simpan</button>
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
            $(function() {
                $('#tabelpasien').DataTable({
                    "paging": true,
                    "lengthChange": false,
                    "searching": true,
                    "ordering": true,
                    "info": true,
                    "autoWidth": false,
                    "responsive": true,
                });
            });
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
            $(".daftarpasien").on('click', function(event) {
                $('.v_1').attr('hidden', true)
                $('.v_2').removeAttr('hidden', true)
            });
            $(".kembali").on('click', function(event) {
                $('.v_2').attr('hidden', true)
                $('.v_1').removeAttr('hidden', true)
            });

            function simpanpendaftaran() {
                Swal.fire({
                    title: "Simpan Pendaftaran ?",
                    text: "Anda akan menyimpan data pendaftaran, pastikan data sudah terisi dengan benar !",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Simpan",
                    cancelButtonText: "Batal"
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire({
                            title: "Sukses !",
                            text: "Data pendaftaran berhasil disimpan...",
                            icon: "success"
                        });
                    }
                });
            }
        </script>
    </section>
    <!-- /.content -->
@endsection
