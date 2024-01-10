@extends('templates.main')
@section('container')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Master Barang</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item active">Master Barang</li>
                    </ol>
                </div>
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <section class="content">
        <button class="btn btn-success" data-toggle="modal" data-target="#modalmasterbarang"><i
                class="bi bi-plus mr-1 ml-1"></i>Add Master Barang</button>
        <div class="v1">

        </div>
        <div class="v2" hidden></div>
    </section>
    <!-- Modal -->
    <div class="modal fade" id="modalmasterbarang" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel"><i class="bi bi-plus mr-1 ml-1"></i>Add Master Barang
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="form_master_barang">
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Nama Barang</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="namabarang" name="namabarang"
                                    placeholder="Masukan nama barang ...">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Nama Generik</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="namagenerik" name="namagenerik"
                                    placeholder="Masukan nama generik ...">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Dosis</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="dosis" name="dosis"
                                    placeholder="Masukan dosis ...">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Satuan Besar</label>
                            <div class="col-sm-5">
                                <select id="satuanbesar" name="satuanbesar" class="form-control">
                                    <option selected>Silahkan Pilih ...</option>
                                    @foreach ($satuan as $sat)
                                        <option value="{{ $sat->kode_satuan }}">{{ $sat->nama_satuan }}</option>
                                    @endforeach
                                </select>

                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Satuan Kecil</label>
                            <div class="col-sm-5">
                                <select id="satuankecil" name="satuankecil" class="form-control">
                                    <option selected>Silahkan Pilih ...</option>
                                    @foreach ($satuan as $sat)
                                        <option value="{{ $sat->kode_satuan }}">{{ $sat->nama_satuan }}</option>
                                    @endforeach
                                </select>

                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Rasio</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="rasio" name="rasio"
                                    placeholder="Masukan Rasio Barang ...">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Sediaan</label>
                            <div class="col-sm-5">
                                <select id="sediaan" name="sediaan" class="form-control">
                                    <option selected>Silahkan Pilih ...</option>
                                    @foreach ($sediaan as $sat)
                                        <option value="{{ $sat->nama_sediaan }}">{{ $sat->nama_sediaan }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Aturan Pakai</label>
                            <div class="col-sm-10">
                                <textarea type="text" class="form-control" id="aturanpakai" name="aturanpakai"
                                    placeholder="Masukan aturan pakai ..."></textarea>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-primary" onclick="simpanmasterbarang()">Simpan</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            ambil_master_barang()
        })

        function ambil_master_barang() {
            spinner = $('#loader2')
            spinner.show();
            $.ajax({
                type: 'post',
                data: {
                    _token: "{{ csrf_token() }}"
                },
                url: '<?= route('ambil_master_barang') ?>',
                error: function(response) {
                    spinner.hide();
                    alert('error')
                },
                success: function(response) {
                    spinner.hide();
                    $('.v1').html(response);
                }
            });
        }

        function simpanmasterbarang() {
            var form_master_barang = $('.form_master_barang').serializeArray();
            spinner = $('#loader2')
            spinner.show();
            $.ajax({
                async: true,
                type: 'post',
                dataType: 'json',
                data: {
                    _token: "{{ csrf_token() }}",
                    form_master_barang: JSON.stringify(form_master_barang)
                },
                url: '<?= route('simpanmasterbarang') ?>',
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
                    ambil_master_barang()
                }
            });
        }
    </script>
@endsection
