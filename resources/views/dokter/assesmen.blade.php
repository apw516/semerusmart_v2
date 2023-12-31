<div class="col-md-12">

    <div class=" ml-2 mr-3 card">
        <div class="card-body">
            <div class="tab-content">
                <div class="active tab-pane" id="activity">
                    <!-- Post -->
                    <div class="post">
                        <div class="user-block">
                            <img class="img-circle img-bordered-sm" src="{{ asset('public/adminlte/dist/img/user1-128x128.jpg') }}" alt="user image">
                            <span class="username">
                                <a href="#" class="text-dark text-bold">PUTRA</a>
                                {{-- <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a> --}}
                            </span>
                            <span class="description text-lg text-dark">Nomor RM : 2 | Antrian :
                                12</span>
                            <button class="btn btn-info mt-3 btncatatanmedis" nomorrm="2" data-toggle="modal" data-target="#modalcatatanmedis"><i class="bi bi-journal-plus mr-2"></i>Catatan
                                Medis Pasien</button>
                        </div>
                    </div>
                </div>
            </div>
            <form action="post" class="form_assesment">
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="inputEmail4">Tekanan Darah</label>
                        <input type="text" class="form-control" id="tekanandarah" name="tekanandarah" value="">
                        <input hidden type="text" class="form-control" id="kodekunjungan" name="kodekunjungan" value="">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="inputPassword4">Suhu Tubuh</label>
                        <input type="text" class="form-control" id="suhutubuh" name="suhutubuh" value="">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="inputPassword4">Frekuensi Nadi</label>
                        <input type="text" class="form-control" id="suhutubuh" name="suhutubuh" value="">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="inputPassword4">Frekuensi Nafas</label>
                        <input type="text" class="form-control" id="suhutubuh" name="suhutubuh" value="">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputAddress2">Keluhan Utama</label>
                    <textarea type="text" class="form-control" id="keluhanutama" name="keluhanutama" placeholder=""></textarea>
                </div>

                <div class="form-group">
                    <label for="inputAddress2">Diagnosa</label>
                    <input type="text" class="form-control" id="diagnosa" name="diagnosa" placeholder="" value="">
                </div>
                <div class="form-group">
                    <label for="inputAddress2">Hasil Pemeriksaan</label>
                    <textarea type="text" class="form-control" id="hasilpemeriksaan" name="hasilpemeriksaan" placeholder="">

</textarea>
                </div>
            </form>
            <!-- tindakan pasien -->
            <div class="accordion" id="accordionExample1">
                <div class="card">
                    <div class="card-header bg-info" id="headingOne">
                        <h2 class="mb-0">
                            <button class="btn text-light text-bold btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Pilih Tindakan
                            </button>
                        </h2>
                    </div>

                    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample1">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="card">
                                        <div class="card-header bg-dark">Pilih Tindakan</div>
                                        <div class="card-body">
                                            <table id="tabeltindakan" class="table table-sm table-bordered table-hover">
                                                <thead class="bg-info">
                                                    <th>Nama Tindakan</th>
                                                    <th>Tarif</th>
                                                </thead>
                                                <tbody>
                                                    <tr class="pilihlayanan">
                                                        <td>NAMA_TARIF</td>
                                                        <td>IDR </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="card">
                                                <div class="card-header bg-dark">Riwayat Tindakan Hari ini</div>
                                                <div class="card-body">
                                                    <div class="v_r_tindakan">

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="card">
                                                <div class="card-header bg-warning">Tindakan Yang Dipilih ...</div>
                                                <div class="card-body">
                                                    <form action="" method="post" class="formtindakan">
                                                        <div class="input_fields_wrap">
                                                            <div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
            <!-- order obat -->
            <div class="accordion" id="accordionExample1">
                <div class="card">
                    <div class="card-header bg-info" id="headingOne">
                        <h2 class="mb-0">
                            <button class="btn text-light text-bold btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                Order Obat
                            </button>
                        </h2>
                    </div>

                    <div id="collapseTwo" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample1">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="card">
                                        <div class="card-header bg-dark">Order Obat</div>
                                        <div class="card-body">
                                            <table id="tabelobat" class="table table-sm table-bordered table-hover">
                                                <thead class="bg-info">
                                                    <th>Nama Obat</th>
                                                    <th>Tarif</th>
                                                    <th>stok</th>
                                                </thead>
                                                <tbody>
                                                    <tr class="pilihlayanan">
                                                        <td>NAMA_TARIF</td>
                                                        <td>IDR </td>
                                                        <td>Stok</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="card">
                                                <div class="card-header bg-dark">Riwayat Obat Hari ini</div>
                                                <div class="card-body">
                                                    <div class="v_r_obat">

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="card">
                                                <div class="card-header bg-warning">Tindakan Yang Dipilih ...</div>
                                                <div class="card-body">
                                                    <form action="" method="post" class="formobat">
                                                        <div class="input_fields_wrap1">
                                                            <div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>

            <!-- order lab -->
            <div class="accordion" id="accordionExample1">
                <div class="card">
                    <div class="card-header bg-info" id="headingOne">
                        <h2 class="mb-0">
                            <button class="btn text-light text-bold btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                                Order Laboratorium
                            </button>
                        </h2>
                    </div>

                    <div id="collapseThree" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample1">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="card">
                                        <div class="card-header bg-dark">Order Laboratorium</div>
                                        <div class="card-body">
                                            <table id="tabellab" class="table table-sm table-bordered table-hover">
                                                <thead>
                                                    <th>Nama tindakan</th>
                                                </thead>
                                                <tbody>
                                                    @foreach ($layananlab as $t)
                                                    <tr class="pilihlayanan" jenis="nonpaket" namatindakan="{{ $t->Tindakan }}" tarif="{{ $t->tarif }}" kode="{{ $t->kode }}">
                                                        <td>{{ $t->Tindakan }}</td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="card">
                                                <div class="card-header bg-dark">Riwayat Lab Hari ini</div>
                                                <div class="card-body">
                                                    <div class="v_r_obat">

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="card">
                                                <div class="card-header bg-warning">Tindakan Yang Dipilih ...</div>
                                                <div class="card-body">
                                                    <form action="" method="post" class="formlab">
                                                        <div class="input_fields_wrap_lab">
                                                            <div>
                                                            </div>


                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>

            <button type="button" class="btn btn-success float-right" onclick="simpanassesment()"><i class="bi bi-save mr-1"></i>Simpan</button>
            <button type="button" class="btn btn-danger float-right mr-2"><i class="bi bi-x mr-1"></i>Batal</button>
        </div>
    </div>

</div>
<script>
    $(function() {
        $("#tabellab").DataTable({
            "responsive": false,
            "lengthChange": false,
            "pageLength": 5,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        });
    });

    $('#tabellab').on('click', '.pilihlayanan', function() {
        var max_fields = 10; //maximum input boxes allowed
        var wrapper = $(".input_fields_wrap_lab"); //Fields wrapper
        var x = 1; //initlal text box countnamatindakan
        kode = $(this).attr('kode')
        namatindakan = $(this).attr('namatindakan')
        tarif = $(this).attr('tarif')
        id = $(this).attr('id')
        jenis = $(this).attr('jenis')


        // e.preventDefault();
        if (x < max_fields) { //max input box allowed
            x++; //text box increment
            $(wrapper).append(
                '<div class="form-row text-xs"><div class="form-group col-md-5"><label for="">Tindakan</label><input readonly type="" class="form-control form-control-sm" id="" name="namatindakan" value="' +
                namatindakan +
                '"><input hidden readonly type="" class="form-control form-control-sm" id="" name="kodelayanan" value="' +
                kode +
                '"><input hidden  readonly type="" class="form-control form-control-sm" id="" name="jenis" value="' +
                jenis +
                '"></div><div class="form-group col-md-2"><label for="inputPassword4">Tarif</label><input readonly type="" class="form-control form-control-sm" id="" name="tarif" value="' +
                tarif +
                '"></div><div class="form-group col-md-1"><label for="inputPassword4">Jumlah</label><input type="" class="form-control form-control-sm" id="" name="qty" value="1"></div><div class="form-group col-md-1"><label for="inputPassword4">Disc</label><input type="" class="form-control form-control-sm" id="" name="disc" value="0"></div><div class="form-group col-md-1"><label for="inputPassword4">Cyto</label><input type="" class="form-control form-control-sm" id="" name="cyto" value="0"></div><i class="bi bi-x-square remove_field form-group col-md-2 text-danger"></i></div>'
            );
            $(wrapper).on("click", ".remove_field", function(e) { //user click on remove
                e.preventDefault();
                $(this).parent('div').remove();
                x--;
            })
        }
    });
</script>