@extends('templates.main')
@section('container')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Kasir</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Kasir</li>
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
                            <div class="card-header bg-light"><i class="bi bi-search ml-1 mr-1"></i> Pencarian Pasien</div>
                            <div class="card-body">
                                <div class="form-row">
                                    <div class="form-group col-md-2">
                                        <label for="inputEmail4">Nomor RM</label>
                                        <input type="text" class="form-control" id="nomorrm" name="nomorrm"
                                            placeholder="Masukan nomor rm ...">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="inputPassword4">Nama Pasien</label>
                                        <input type="text" class="form-control" id="namapasien" name="namapasien"
                                            placeholder="Masukan nama pasien ...">
                                    </div>
                                  
                                    <div class="form-group col-md-2 btn-group"  role="group">
                                    <button class="btn btn-success" style="margin-top:31px" onclick="search_patient_cashier()"><i
                                                class="bi bi-search"></i>Cari Pasien</button>
                                        <button class="btn btn-outline-success" style="margin-top:31px" onclick="get_patient_cashier()"><i
                                                class="bi bi-arrow-counterclockwise"></i>Reset</button>
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

        <script>
            $(document).ready(function() {
                rm = $('#nomorrm').val()
                ktp = $('#nomorktp').val()
                bpjs = $('#nomorbpjs').val()
                nama = $('#namapasien').val()
                get_patient_cashier(rm,ktp,bpjs,nama)
            })

            function get_patient_cashier(rm = $('#nomorrm').val(),ktp = $('#nomorktp').val(),bpjs = $('#nomorbpjs').val(),nama = $('#namapasien').val()) {
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
                    url: '<?= route('get_patient_cashier') ?>',
                    error:function(response){
                        spinner.hide();
                        alert('error')
                    },
                    success: function(response) {
                        spinner.hide();
                        $('.v_tabel_pasien').html(response);
                    }
                });
            }

            function search_patient_cashier(rm = $('#nomorrm').val(),nama = $('#namapasien').val()) {
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
                    url: '<?= route('search_patient_cashier') ?>',
                    error:function(response){
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
