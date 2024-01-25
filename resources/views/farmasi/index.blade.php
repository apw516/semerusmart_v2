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
                    <input type="date" class="form-control" id="tanggalawal" value="{{ $now }}">
                </div>
                <div class="form-group col-md-2">
                    <label for="inputPassword4">Tanggal Akhir</label>
                    <input type="date" class="form-control" id="tanggalakhir" value="{{ $now }}">
                </div>
                <div class="form-group col-md-2">
                    <button class="btn btn-info" style="margin-top:30px" onclick="ambil_data_pasien()"><i
                            class="bi bi-search mr-1 ml-1"></i>Cari
                        Pasien</button>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="v_tabel_pasien">

                    </div>
                </div>
            </div>
        </div>
        <div hidden class="v_2">
            <div class="detail_orderan_farmasi">

            </div>
        </div>
        <!-- Modal -->
        {{-- <div class="modal fade" id="modalcariobat" tabindex="-1" aria-labelledby="exampleModalLabel"
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
        </div> --}}

        <script>
            $(document).ready(function() {
                ambil_data_pasien()
            })
            function ambil_data_pasien() {
                tglawal = $('#tanggalawal').val()
                tglakhir = $('#tanggalakhir').val()
                spinner = $('#loader2')
                spinner.show();
                $.ajax({
                    type: 'post',
                    data: {
                        _token: "{{ csrf_token() }}",
                        tglawal,
                        tglakhir,
                    },
                    url: '<?= route('ambil_data_kunjungan_pasien') ?>',
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

        </script>
    </section>
    <!-- /.content -->
@endsection
