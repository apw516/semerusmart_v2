@extends('templates.main')
@section('container')
<style>
    div.ex1 {
        background-color: lightblue;
        width: 100%;
        height: 600px;
        overflow: scroll;
    }
    div.ex2 {
        background-color: lightblue;
        width: 100%;
        height: 300px;
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
                                                    <tr class="pilihsupplier" kode="{{ $b->kode_supplier }}" alamat="{{ $b->alamat_supplier }}" name="{{ $b->nama_supplier }}">
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
                                <form>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Nomor Faktur</label>
                                                <input type="email" class="form-control" id="exampleInputEmail1"
                                                    aria-describedby="emailHelp" placeholder="Masukan nomor faktur">
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
                                                <input type="date" class="form-control" id="exampleInputPassword1">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Tanggal Terima</label>
                                                <input type="date" class="form-control" id="exampleInputPassword1">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="card">
                                                <div class="card-header bg-secondary">Data Barang Diterima ...</div>
                                                <div class="card-body">
                                                    <div class="v_list">

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="card-footer">
                                <button class="btn btn-success float-right">Simpan</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="accordion" id="accordionExample">
                            <div class="card">
                              <div class="card-header bg-success" id="headingOne">
                                <h2 class="mb-0">
                                  <button class="btn btn-link btn-block text-left text-light text-bold" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    <i class="bi bi-list-ul mr-2 ml-2"></i> STOK GUDANG
                                  </button>
                                </h2>
                              </div>

                              <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                                <div class="card-body">
                                  Some placeholder content for the first accordion panel. This panel is shown by default, thanks to the <code>.show</code> class.
                                </div>
                              </div>
                            </div>
                            <div class="card">
                              <div class="card-header bg-success" id="headingTwo">
                                <h2 class="mb-0">
                                  <button class="btn btn-link btn-block text-left collapsed text-light text-bold" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    <i class="bi bi-list-ul mr-2 ml-2"></i> STOK APOTEK
                                  </button>
                                </h2>
                              </div>
                              <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                <div class="card-body">
                                  Some placeholder content for the second accordion panel. This panel is hidden by default.
                                </div>
                              </div>
                            </div>
                          </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
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
        $(".pilihsupplier").on('click', function(event) {
            kode = $(this).attr('kode')
            nama = $(this).attr('name')
            alamat = $(this).attr('alamat')
            $('#namasupplier').val(nama+' | '+alamat)
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
    </script>
@endsection
