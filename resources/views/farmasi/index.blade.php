@extends('templates.main')
@section('container')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Layanan Resep</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item active">Layanan Resep</li>
                    </ol>
                </div>
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <section class="content">
        <div class="v_1">
            <div class="form-row">
                <div class="form-group col-md-2">
                    <label for="inputEmail4">Tanggal Awal</label>
                    <input type="date" class="form-control" id="inputEmail4">
                </div>
                <div class="form-group col-md-2">
                    <label for="inputPassword4">Tanggal Akhir</label>
                    <input type="date" class="form-control" id="inputPassword4">
                </div>
                <div class="form-group col-md-2">
                    <button class="btn btn-info" style="margin-top:30px"><i class="bi bi-search mr-1 ml-1"></i>Cari
                        Pasien</button>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <table id="tabelpasien_far" class="table table-sm table-bordered table-hover">
                        <thead>
                            <th>Tgl Masuk</th>
                            <th>Nomor RM</th>
                            <th>Nama Pasien</th>
                            <th>Unit Asal</th>
                            <th>Dokter</th>
                            <th class="text-center">===</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td>2023-12-12</td>
                                <td>123123123</td>
                                <td>ARNOLD SCHWENSTEIGER</td>
                                <td>Poli Umum</td>
                                <td>dr . xxxxx</td>
                                <td class="text-center"><button class="btn btn-sm btn-success inputresep"><i
                                            class="bi bi-ticket-detailed ml-1 mr-1"></i>detail</button></td>
                            </tr>
                            <tr>
                                <td>2023-12-12</td>
                                <td>123123123</td>
                                <td>ARNOLD SCHWENSTEIGER</td>
                                <td>Poli Umum</td>
                                <td>dr . xxxxx</td>
                                <td class="text-center"><button class="btn btn-sm btn-success"><i
                                            class="bi bi-ticket-detailed ml-1 mr-1"></i>detail</button></td>
                            </tr>
                            <tr>
                                <td>2023-12-12</td>
                                <td>123123123</td>
                                <td>ARNOLD SCHWENSTEIGER</td>
                                <td>Poli Umum</td>
                                <td>dr . xxxxx</td>
                                <td class="text-center"><button class="btn btn-sm btn-success"><i
                                            class="bi bi-ticket-detailed ml-1 mr-1"></i>detail</button></td>
                            </tr>
                        </tbody>
                    </table>
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
                        <div class="card-header bg-secondary"><i class="bi bi-list-check mr-1 ml-1"></i>Detail Order Farmasi | dr. xxxx | Poli Umum
                        </div>
                        <div class="card-body">
                            <button class="btn btn-success" data-toggle="modal" data-target="#modalcariobat"><i
                                    class="bi bi-search mr-1 ml-1"></i>Cari Obat</button>
                            <div class="container-fluid mt-4">
                                <div class="form-row text-md">
                                    <div class="form-group col-md-2"><label for="">Nama Obat</label><input readonly
                                            type="" class="form-control form-control-sm" id=""
                                            name="namatindakan" value="PARACETAMOL 500MG"><input hidden readonly type=""
                                            class="form-control form-control-sm" id="" name="kodelayanan"
                                            value=""><input hidden readonly type=""
                                            class="form-control form-control-sm" id="" name="kodelayanan"
                                            value="">
                                    </div>
                                    <div class="form-group col-md-2"><label for="inputPassword4">Aturan Pakai</label><input
                                            readonly type="" class="form-control form-control-sm" id=""
                                            name="tarif" value="3X3 SESUDAH MAKAN"></div>
                                    <div class="form-group col-md-1"><label for="inputPassword4">Jumlah</label><input
                                            type="" class="form-control form-control-sm" id=""
                                            name="qty" value="12"></div>
                                    <div class="form-group col-md-1"></div><i
                                        class="bi bi-x-square remove_field form-group col-md-2 text-danger"
                                        kode2=""></i>
                                </div>
                                <div class="form-row text-md">
                                    <div class="form-group col-md-2"><label for="">Nama Obat</label><input readonly
                                            type="" class="form-control form-control-sm" id=""
                                            name="namatindakan" value="PARACETAMOL 500MG"><input hidden readonly type=""
                                            class="form-control form-control-sm" id="" name="kodelayanan"
                                            value=""><input hidden readonly type=""
                                            class="form-control form-control-sm" id="" name="kodelayanan"
                                            value="">
                                    </div>
                                    <div class="form-group col-md-2"><label for="inputPassword4">Aturan Pakai</label><input
                                            readonly type="" class="form-control form-control-sm" id=""
                                            name="tarif" value="3X3 SESUDAH MAKAN"></div>
                                    <div class="form-group col-md-1"><label for="inputPassword4">Jumlah</label><input
                                            type="" class="form-control form-control-sm" id=""
                                            name="qty" value="12"></div>
                                    <div class="form-group col-md-1"></div><i
                                        class="bi bi-x-square remove_field form-group col-md-2 text-danger"
                                        kode2=""></i>
                                </div>
                                <div class="form-row text-md">
                                    <div class="form-group col-md-2"><label for="">Nama Obat</label><input readonly
                                            type="" class="form-control form-control-sm" id=""
                                            name="namatindakan" value="PARACETAMOL 500MG"><input hidden readonly type=""
                                            class="form-control form-control-sm" id="" name="kodelayanan"
                                            value=""><input hidden readonly type=""
                                            class="form-control form-control-sm" id="" name="kodelayanan"
                                            value="">
                                    </div>
                                    <div class="form-group col-md-2"><label for="inputPassword4">Aturan Pakai</label><input
                                            readonly type="" class="form-control form-control-sm" id=""
                                            name="tarif" value="3X3 SESUDAH MAKAN"></div>
                                    <div class="form-group col-md-1"><label for="inputPassword4">Jumlah</label><input
                                            type="" class="form-control form-control-sm" id=""
                                            name="qty" value="12"></div>
                                    <div class="form-group col-md-1"></div><i
                                        class="bi bi-x-square remove_field form-group col-md-2 text-danger"
                                        kode2=""></i>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="button" class="btn btn-success float-right" onclick="simpanorderobat()"> <i class="bi bi-box-arrow-down mr-1 ml-1"></i> Simpan</button>
                          </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="modalcariobat" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"><i class="bi bi-search mr-1 ml-1"></i> Cari Obat
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>

        <script>
            $(function() {
                $('#tabelpasien_far').DataTable({
                    "paging": true,
                    "lengthChange": false,
                    "searching": false,
                    "ordering": true,
                    "info": false,
                    "autoWidth": false,
                    "responsive": true,
                });
            });
            $(".inputresep").on('click', function(event) {
                $('.v_2').removeAttr('hidden', true)
                $('.v_1').attr('hidden', true)
            });
            $(".kembali").on('click', function(event) {
                $('.v_2').attr('hidden', true)
                $('.v_1').removeAttr('hidden', true)
            });
            function simpanorderobat() {
                Swal.fire({
                    title: "Simpan Pemakaian Obat ?",
                    text: "Anda akan menyimpan data pemakaian obat, pastikan data sudah terisi dengan benar !",
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
