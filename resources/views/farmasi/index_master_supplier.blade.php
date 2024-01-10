@extends('templates.main')
@section('container')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Master Supplier</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item active">Master Supplier</li>
                    </ol>
                </div>
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <section class="content">
        <button class="btn btn-success" data-toggle="modal" data-target="#modalmastersupplier"><i
                class="bi bi-plus mr-1 ml-1"></i>Add Master Supplier</button>
        <div class="v1">

        </div>
        <div class="v2" hidden></div>
    </section>
    <!-- Modal -->
    <div class="modal fade" id="modalmastersupplier" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel"><i class="bi bi-plus mr-1 ml-1"></i>Add Master Supplier
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="form_master_supplier">
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Nama Supplier</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="namasupplier" name="namasupplier"
                                    placeholder="Masukan nama supplier ...">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Alamat Supplier</label>
                            <div class="col-sm-10">
                                <textarea type="text" class="form-control" id="alamatsupplier" name="alamatsupplier"
                                    placeholder="Masukan alamat supplier ..."></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Kontak</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="kontak" name="kontak"
                                    placeholder="Masukan nomor telepon supplier ...">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-primary" onclick="simpanmastersupplier()">Simpan</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            ambil_master_supplier()
        })

        function ambil_master_supplier() {
            spinner = $('#loader2')
            spinner.show();
            $.ajax({
                type: 'post',
                data: {
                    _token: "{{ csrf_token() }}"
                },
                url: '<?= route('ambil_master_supplier') ?>',
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

        function simpanmastersupplier() {
            var form_master_supplier = $('.form_master_supplier').serializeArray();
            spinner = $('#loader2')
            spinner.show();
            $.ajax({
                async: true,
                type: 'post',
                dataType: 'json',
                data: {
                    _token: "{{ csrf_token() }}",
                    form_master_supplier: JSON.stringify(form_master_supplier)
                },
                url: '<?= route('simpanmastersupplier') ?>',
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
                    ambil_master_supplier()
                }
            });
        }
    </script>
@endsection
