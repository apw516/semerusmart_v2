@extends('templates.main')
@section('container')
    <style>
        div.ex1 {
            background-color: lightblue;
            width: 100%;
            height: 710px;
            overflow: scroll;
        }

        div.ex2 {
            background-color: lightblue;
            width: 100%;
            height: 600px;
            overflow: scroll;
        }
    </style>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Stok Barang</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item active">Stok Barang</li>
                    </ol>
                </div>
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <section class="content">
        <button class="btn btn-warning mb-3 kartu_stok" data-toggle="modal" data-target="#modalkartustok"><i
                class="bi bi-info-circle-fill mr-1 ml-1"></i> Kartu Stok</button>
        <button class="btn btn-warning mb-3 stok_sediaan" data-toggle="modal" data-target="#modalstoksediaan"><i
                class="bi bi-info-circle-fill mr-1 ml-1"></i> Stok
            Sediaan</button>
        <button class="btn btn-success mb-3 riwayatpo" data-toggle="modal" data-target="#modalriwayatpo"><i
                class="bi bi-info-circle-fill mr-1 ml-1"></i> Riwayat PO</button>
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body ex1">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">Cari Data Supplier</div>
                                    <div class="card-body">
                                        <table id="tabel_master_supplier"
                                            class="table table-sm table-bordered table-hover text-xs">
                                            <thead>
                                                <th>Kode Supplier</th>
                                                <th>Nama Supplier</th>
                                                <th>Alamat Supplier</th>
                                            </thead>
                                            <tbody>
                                                @foreach ($supplier as $b)
                                                    <tr class="pilihsupplier" kode="{{ $b->kode_supplier }}"
                                                        alamat="{{ $b->alamat_supplier }}" name="{{ $b->nama_supplier }}">
                                                        <td>{{ $b->kode_supplier }}</td>
                                                        <td>{{ $b->nama_supplier }}</td>
                                                        <td>{{ $b->alamat_supplier }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">Cari Data Barang</div>
                                    <div class="card-body">
                                        <form class="form-inline">
                                            <label class="sr-only" for="inlineFormInputGroupUsername2">nama barang</label>
                                            <div class="input-group mb-2 mr-sm-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text bg-secondary ">masukan nama barang</div>
                                                </div>
                                                <input type="text" class="form-control" id="namabarang" name="namabarang"
                                                    placeholder="Masukan nama barang ...">
                                            </div>
                                            <button type="button" class="btn btn-primary mb-2" onclick="caribarang()"><i
                                                    class="bi bi-search"></i> Cari
                                                Barang</button>
                                        </form>
                                        <div class="v_tabel_barang_pencarian mt-5">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header bg-info">Form Input Stok Gudang / PO Masuk </div>
                            <div class="card-body ex2">
                                <form class="form_po_header">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Nomor Faktur</label>
                                                <input type="text" class="form-control" id="nomorfaktur"
                                                    name="nomorfaktur" aria-describedby="emailHelp"
                                                    placeholder="Masukan nomor faktur">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Nama Supplier</label>
                                                <input type="text" class="form-control" id="namasupplier"
                                                    name="namasupplier" aria-describedby="emailHelp">
                                                <input hidden type="text" class="form-control" id="kodesupplier"
                                                    name="kodesupplier" aria-describedby="emailHelp">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Tanggal Beli</label>
                                                <input type="date" class="form-control" id="tglbeli" name="tglbeli">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Tanggal Terima</label>
                                                <input type="date" class="form-control" id="tglterima"
                                                    name="tglterima">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Total PO</label>
                                                <input type="text" class="form-control" id="totalpo"
                                                    name="totalpo">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Pph</label>
                                                <div class="input-group mb-3">
                                                    <input type="text" class="form-control"
                                                        aria-label="Recipient's username" aria-describedby="basic-addon2" id="pph" name="pph" value="0">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text" id="basic-addon2">rupiah<span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">PPN</label>
                                                <div class="input-group mb-3">
                                                    <input type="text" class="form-control"
                                                        aria-label="Recipient's username" aria-describedby="basic-addon2" name="ppn" id="ppn" value="0">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text" id="basic-addon2">rupiah</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Diskon</label>
                                                <div class="input-group mb-3">
                                                    <input type="text" class="form-control"
                                                        aria-label="Recipient's username" aria-describedby="basic-addon2" name="diskon" id="diskon" value="0">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text" id="basic-addon2">%</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Materai</label>
                                                <div class="input-group mb-3">
                                                    <input type="text" class="form-control"
                                                        aria-label="Recipient's username" aria-describedby="basic-addon2" name="materai" id="materai" value="0">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text" id="basic-addon2">rupiah<span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-header bg-secondary">Data Barang Diterima ...</div>
                                            <div class="card-body">
                                                <form class="v_list">

                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button class="btn btn-success float-right" onclick="simpanpo()">Simpan</button>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="col-md-12">
                        <div class="accordion" id="accordionExample">
                            <div class="card">
                                <div class="card-header bg-success" id="headingOne">
                                    <h2 class="mb-0">
                                        <button class="btn btn-link btn-block text-left text-light text-bold"
                                            type="button" data-toggle="collapse" data-target="#collapseOne"
                                            aria-expanded="true" aria-controls="collapseOne">
                                            <i class="bi bi-list-ul mr-2 ml-2"></i> STOK GUDANG
                                        </button>
                                    </h2>
                                </div>

                                <div id="collapseOne" class="collapse" aria-labelledby="headingOne"
                                    data-parent="#accordionExample">
                                    <div class="card-body">
                                        Some placeholder content for the first accordion panel. This panel is shown by
                                        default, thanks to the <code>.show</code> class.
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header bg-success" id="headingTwo">
                                    <h2 class="mb-0">
                                        <button class="btn btn-link btn-block text-left collapsed text-light text-bold"
                                            type="button" data-toggle="collapse" data-target="#collapseTwo"
                                            aria-expanded="false" aria-controls="collapseTwo">
                                            <i class="bi bi-list-ul mr-2 ml-2"></i> STOK APOTEK
                                        </button>
                                    </h2>
                                </div>
                                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                                    data-parent="#accordionExample">
                                    <div class="card-body">
                                        Some placeholder content for the second accordion panel. This panel is hidden by
                                        default.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </section>
    <!-- Modal -->
    <div class="modal fade" id="modalriwayatpo" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Riwayat PO</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="inputEmail4">Tanggal Awal</label>
                            <input type="date" class="form-control" id="tanggal_awal_pencarian_po"
                                name="tanggal_awal_pencarian_po" value="{{ $now }}">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputPassword4">Tanggal Akhir</label>
                            <input type="date" class="form-control" id="tanggal_akhir_pencarian_po"
                                name="tanggal_akhir_pencarian_po" value="{{ $now }}">
                        </div>
                        <div class="form-group col-md-4">
                            <button style="margin-top:30px" type="button" class="btn btn-primary" id="inputPassword4"
                                onclick="cari_riwayat_po()"><i class="bi bi-search mr-1 ml-1"></i> Cari Riwayat</button>
                        </div>
                    </div>
                    <div class="v_1_tabel_riwayat_po">

                    </div>
                    <div class="v_2_tabel_riwayat_po_detail">

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="modalstoksediaan" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Stok Sediaan Farmasi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="inputEmail4">Tanggal Awal</label>
                            <input type="date" class="form-control" id="tanggal_awal_pencarian_stok_sediaan"
                                name="tanggal_awal_pencarian_stok_sediaan" value="{{ $now }}">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputPassword4">Tanggal Akhir</label>
                            <input type="date" class="form-control" id="tanggal_akhir_pencarian_stok_sediaan"
                                name="tanggal_akhir_pencarian_stok_sediaan" value="{{ $now }}">
                        </div>
                        <div class="form-group col-md-4">
                            <button style="margin-top:30px" type="button" class="btn btn-primary" id="inputPassword4"
                                onclick="cari_riwayat_sediaan()"><i class="bi bi-search mr-1 ml-1"></i> Cari
                                Riwayat</button>
                        </div>
                    </div>
                    <div class="v_1_tabel_riwayat_sediaan">

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="modalkartustok" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Kartu Stok Farmasi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="inputEmail4">Tanggal Awal</label>
                            <input type="date" class="form-control" id="tanggal_awal_pencarian_kartu_stok"
                                name="tanggal_awal_pencarian_kartu_stok" value="{{ $now }}">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputPassword4">Tanggal Akhir</label>
                            <input type="date" class="form-control" id="tanggal_akhir_pencarian_kartu_stok"
                                name="tanggal_akhir_pencarian_kartu_stok" value="{{ $now }}">
                        </div>
                        <div class="form-group col-md-4">
                            <button style="margin-top:30px" type="button" class="btn btn-primary" id="inputPassword4"
                                onclick="cari_kartu_stok()"><i class="bi bi-search mr-1 ml-1"></i> Cari
                                Riwayat</button>
                        </div>
                    </div>
                    <div class="v_1_tabel_kartu_stok">

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(function() {
            $('#tabel_master_supplier').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
                "pageLength": 5
            });
        });

        function cari_riwayat_po(tgl_awal = $('#tanggal_awal_pencarian_po').val(), tgl_akhir = $(
            '#tanggal_akhir_pencarian_po').val()) {
            spinner = $('#loader2')
            spinner.show();
            $.ajax({
                type: 'post',
                data: {
                    _token: "{{ csrf_token() }}",
                    tgl_awal,
                    tgl_akhir,
                },
                url: '<?= route('ambil_riwayat_po_header') ?>',
                error: function(response) {
                    spinner.hide();
                    alert('error')
                },
                success: function(response) {
                    spinner.hide();
                    $('.v_1_tabel_riwayat_po').html(response);
                }
            });
        }

        function cari_riwayat_sediaan(tgl_awal = $('#tanggal_awal_pencarian_stok_sediaan').val(), tgl_akhir = $(
            '#tanggal_akhir_pencarian_stok_sediaan').val()) {
            spinner = $('#loader2')
            spinner.show();
            $.ajax({
                type: 'post',
                data: {
                    _token: "{{ csrf_token() }}",
                    tgl_awal,
                    tgl_akhir,
                },
                url: '<?= route('ambil_riwayat_stok_sediaan') ?>',
                error: function(response) {
                    spinner.hide();
                    alert('error')
                },
                success: function(response) {
                    spinner.hide();
                    $('.v_1_tabel_riwayat_sediaan').html(response);
                }
            });
        }

        function cari_kartu_stok(tgl_awal = $('#tanggal_awal_pencarian_kartu_stok').val(), tgl_akhir = $(
            '#tanggal_akhir_pencarian_kartu_stok').val()) {
            spinner = $('#loader2')
            spinner.show();
            $.ajax({
                type: 'post',
                data: {
                    _token: "{{ csrf_token() }}",
                    tgl_awal,
                    tgl_akhir,
                },
                url: '<?= route('ambil_kartu_stok') ?>',
                error: function(response) {
                    spinner.hide();
                    alert('error')
                },
                success: function(response) {
                    spinner.hide();
                    $('.v_1_tabel_kartu_stok').html(response);
                }
            });
        }

        $(".pilihsupplier").on('click', function(event) {
            kode = $(this).attr('kode')
            nama = $(this).attr('name')
            alamat = $(this).attr('alamat')
            $('#namasupplier').val(nama + ' | ' + alamat)
            $('#kodesupplier').val(kode)
        });

        function caribarang() {
            namabarang = $('#namabarang').val()
            spinner = $('#loader2')
            spinner.show();
            $.ajax({
                type: 'post',
                data: {
                    _token: "{{ csrf_token() }}",
                    namabarang
                },
                url: '<?= route('cari_master_barang') ?>',
                error: function(response) {
                    spinner.hide();
                    alert('error')
                },
                success: function(response) {
                    spinner.hide();
                    $('.v_tabel_barang_pencarian').html(response);
                }
            });
        }

        function simpanpo() {
            var form_po_header = $('.form_po_header').serializeArray();
            var v_list = $('.v_list').serializeArray();
            spinner = $('#loader2')
            spinner.show();
            $.ajax({
                async: true,
                type: 'post',
                dataType: 'json',
                data: {
                    _token: "{{ csrf_token() }}",
                    form_po_header: JSON.stringify(form_po_header),
                    v_list: JSON.stringify(v_list)
                },
                url: '<?= route('simpan_po') ?>',
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
                    setTimeout(function() {
                        location.reload()
                    }, 2000);
                }
            });
        }
    </script>
@endsection
