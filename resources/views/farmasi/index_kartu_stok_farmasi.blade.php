@extends('templates.main')
@section('container')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Kartu Stok Farmasi</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item active">Kartu Stok Farmasi</li>
                    </ol>
                </div>
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <section class="content">
        <div class="v_1">
            <div class="container-fluid">
                <div class="row mt-2">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header bg-light"><i class="bi bi-search ml-1 mr-1"></i> Pencarian Kartu Stok Farmasi</div>
                            <div class="card-body">
                                <div class="form-row">
                                    <div class="form-group col-md-2">
                                        <label for="inputEmail4">Tanggal Awal</label>
                                        <input type="date" class="form-control" id="tanggalawal" name="tanggalawal"
                                            placeholder="Masukan nomor rm ..." value="{{ $now }}">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="inputPassword4">Tanggal Akhir</label>
                                        <input type="date" class="form-control" id="tanggalakhir" name="tanggalakhir"
                                            placeholder="Masukan nomor ktp ..." value="{{ $now }}">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <button class="btn btn-success" style="margin-top:31px"
                                            onclick="cari_stok_farmasi()"><i class="bi bi-search ml-1 mr-1"></i>Cari
                                            riwayat</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="v_tabel_stok_farmasi">

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div hidden class="v_2">

        </div>
    </section>
    <script>
        $(document).ready(function() {
            awal = $('#tanggalawal').val()
            akhir = $('#tanggalakhir').val()
            cari_stok_farmasi(awal, akhir)
        })
        function cari_stok_farmasi(tgl_awal = $('#tanggalawal').val(), tgl_akhir = $(
            '#tanggalakhir').val()) {
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
                    $('.v_tabel_stok_farmasi').html(response);
                }
            });
        }

    </script>
@endsection
