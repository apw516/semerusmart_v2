<button class="btn btn-danger kembali"><i class="bi bi-backspace ml-1 mr-1"></i>Kembali</button>
<input hidden type="text" value="{{ $datakunjungan[0]->kode_kunjungan }}" id="kodekunjunganorder"
    name="kodekunjunganorder">
<div class="row mt-4">
    <div class="col-md-2">
        <div class="card card-primary card-outline">
            <div class="card-body box-profile">
                <div class="text-center">
                    <img class="profile-user-img img-fluid img-circle"
                        src="{{ asset('public/adminlte/dist/img/user4-128x128.jpg') }}" alt="User profile picture">
                </div>
                <h3 class="profile-username text-center">{{ $data_pasien[0]->nama_px }}</h3>

                <p class="text-muted text-center">RM : {{ $data_pasien[0]->no_rm }}</p>

                <ul class="list-group list-group-unbordered mb-3">
                    <li class="list-group-item">
                        <b>Nomor BPJS</b> <a class="float-right">{{ $data_pasien[0]->no_Bpjs }}</a>
                    </li>
                    <li class="list-group-item">
                        <b>Tgl Lahir</b> <a class="float-right">{{ $data_pasien[0]->tgl_lahir_2 }}</a>
                    </li>
                    <li class="list-group-item">
                        <b>Alamat</b> <a class="float-right">{{ $data_pasien[0]->alamatnya }}</a>
                    </li>
                </ul>
            </div>
            <!-- /.card-body -->
        </div>

    </div>
    <div class="col-md-10">
        <div class="card">
            <div class="card-header bg-secondary"><i class="bi bi-list-check mr-1 ml-1"></i>Detail Order Farmasi
                | {{ $datakunjungan[0]->dokter_pemeriksa }}| {{ $datakunjungan[0]->unit_asal }} |
                {{ $datakunjungan[0]->penjamin }}
            </div>
            <div class="card-body">
                <div class="form-inline">
                    <div class="form-group mx-sm-3 mb-2">
                        <label for="inputPassword2" class="sr-only">Password</label>
                        <input type="text" class="form-control" id="nama_obat_reguler"
                            placeholder="Masukan nama obat ...">
                    </div>
                    <button type="button" class="btn btn-primary mb-2" onclick="cariobat_reguler()"><i
                            class="bi bi-search mr-1 ml-1"></i> Cari obat</button>
                    <button type="button" class="btn btn-danger mb-2 mr-2 ml-2 buatracikan" data-toggle="modal"
                        data-target="#modalbuatracikan"><i class="bi bi-plus-circle-fill mr-1 ml-1"></i>Buat
                        racikan</button>
                </div>
                <div class="v_tabel_obat_reguler mt-3">

                </div>
                <div class="container-fluid mt-4">
                    <form action="" class="form_order_obat">

                    </form>
                    {{-- <div class="form-row text-md">
                        <div class="form-group col-md-2"><label for="">Nama Obat</label><input readonly
                                type="" class="form-control form-control-sm" id="" name="namatindakan"
                                value="PARACETAMOL 500MG"><input hidden readonly type=""
                                class="form-control form-control-sm" id="" name="kodelayanan"
                                value=""><input hidden readonly type=""
                                class="form-control form-control-sm" id="" name="kodelayanan" value="">
                        </div>
                        <div class="form-group col-md-2"><label for="inputPassword4">Aturan Pakai</label><input readonly
                                type="" class="form-control form-control-sm" id="" name="tarif"
                                value="3X3 SESUDAH MAKAN"></div>
                        <div class="form-group col-md-1"><label for="inputPassword4">Jumlah</label><input type=""
                                class="form-control form-control-sm" id="" name="qty" value="12"></div>
                        <div class="form-group col-md-1"></div><i
                            class="bi bi-x-square remove_field form-group col-md-2 text-danger" kode2=""></i>
                    </div>
                    <div class="form-row text-md">
                        <div class="form-group col-md-2"><label for="">Nama Obat</label><input readonly
                                type="" class="form-control form-control-sm" id="" name="namatindakan"
                                value="PARACETAMOL 500MG"><input hidden readonly type=""
                                class="form-control form-control-sm" id="" name="kodelayanan"
                                value=""><input hidden readonly type=""
                                class="form-control form-control-sm" id="" name="kodelayanan" value="">
                        </div>
                        <div class="form-group col-md-2"><label for="inputPassword4">Aturan
                                Pakai</label><input readonly type="" class="form-control form-control-sm"
                                id="" name="tarif" value="3X3 SESUDAH MAKAN"></div>
                        <div class="form-group col-md-1"><label for="inputPassword4">Jumlah</label><input type=""
                                class="form-control form-control-sm" id="" name="qty" value="12"></div>
                        <div class="form-group col-md-1"></div><i
                            class="bi bi-x-square remove_field form-group col-md-2 text-danger" kode2=""></i>
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
                        <div class="form-group col-md-2"><label for="inputPassword4">Aturan
                                Pakai</label><input readonly type="" class="form-control form-control-sm"
                                id="" name="tarif" value="3X3 SESUDAH MAKAN"></div>
                        <div class="form-group col-md-1"><label for="inputPassword4">Jumlah</label><input
                                type="" class="form-control form-control-sm" id="" name="qty"
                                value="12"></div>
                        <div class="form-group col-md-1"></div><i
                            class="bi bi-x-square remove_field form-group col-md-2 text-danger" kode2=""></i>
                    </div> --}}
                </div>
            </div>
            <div class="card-footer">
                <button type="button" class="btn btn-success float-right" onclick="simpanorderobat()"> <i
                        class="bi bi-box-arrow-down mr-1 ml-1"></i> Simpan</button>
            </div>

        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalbuatracikan" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Buat racikan obat</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-header">Header Racikan</div>
                    <div class="card-body">
                        <form action="" class="form_header_racikan">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Nama Racikan</label>
                                        <input type="text" class="form-control" id="namaracikan" name="namaracikan"
                                            aria-describedby="emailHelp">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Jumlah Racikan</label>
                                        <input type="text" class="form-control" id="jumlahracikan"
                                            name="jumlahracikan" aria-describedby="emailHelp">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Kemasan</label>
                                        <select class="form-control" id="kemasan" name="kemasan">
                                            <option>Kapsul</option>
                                            <option>Kertas Perkamen</option>
                                            <option>Pot Salep</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Tipe Racikan</label>
                                        <select class="form-control" id="tiperacikan" name="tiperacikan">
                                            <option>Powder</option>
                                            <option>Non Powder</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Aturan Pakai</label>
                                        <textarea type="text" class="form-control" id="aturanpakai" name="aturanpakai" aria-describedby="aturanpakai"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">

                                </div>
                            </div>
                        </form>
                        <div class="card mt-5">
                            <div class="card-header">Kompnen Obat Racik</div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-inline">
                                            <div class="form-group mx-sm-3 mb-2">
                                                <label for="inputPassword2" class="sr-only">Password</label>
                                                <input type="text" class="form-control" id="nama_obat_racik"
                                                    placeholder="Masukan nama obat komponen racik ...">
                                            </div>
                                            <button type="button" class="btn btn-primary mb-2"
                                                onclick="cariobat_racik()"><i class="bi bi-search mr-1 ml-1"></i> Cari
                                                obat</button>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mt-3">
                                        <div class="v_tabel_obat_racik">

                                        </div>
                                        <div class="card">
                                            <div class="card-header">Draft Komponen</div>
                                            <div class="card-body">
                                                <div class="row mt-1">
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="exampleFormControlInput1">Nama Obat</label>
                                                            <input readonly type="text"
                                                                class="form-control text-sm" id="draf_nama_obat"
                                                                placeholder="Nama Obat ...">
                                                            <input hidden readonly type="text"
                                                                class="form-control text-sm" id="draf_kode_barang"
                                                                placeholder="Nama Obat ...">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-1">
                                                        <div class="form-group">
                                                            <label for="exampleFormControlInput1">Satuan</label>
                                                            <input readonly type="text"
                                                                class="form-control text-sm" id="draft_satuan_obat"
                                                                placeholder="satuan obat ...">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label for="exampleFormControlInput1">Dosis Awal</label>
                                                            <input type="text" class="form-control"
                                                                id="draft_dosis_awal" placeholder="Dosis awal ...">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label for="exampleFormControlInput1">Dosis Racik</label>
                                                            <input type="text" class="form-control text-sm"
                                                                id="draft_dosis_racik" placeholder="dosis racik ..."
                                                                value="0">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-1">
                                                        <div class="form-group">
                                                            <label for="exampleFormControlInput1">Action</label><br>
                                                            <button class="btn btn-secondary btn-sm"
                                                                onclick="simpandraft_racik()"><i
                                                                    class="bi bi-arrow-down mr-1"></i></button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card mt-3 shadow-lg">
                                                    <div class="card-header">Obat Yang dipilih</div>
                                                    <div class="card-body">
                                                        <form class="v_form_obat_racik">

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
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="simpan_racikan()">Simpan</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(".kembali").on('click', function(event) {
        $('.v_2').attr('hidden', true)
        $('.v_1').removeAttr('hidden', true)
    });

    function simpandraft_racik() {
        jumlahracikan = $('#jumlahracikan').val()
        kodebarang = $('#draf_kode_barang').val()
        dosis_racik = $('#draft_dosis_racik').val()
        dosis_awal = $('#draft_dosis_awal').val()
        var max_fields = 10;
        var wrapper = $(".v_form_obat_racik");
        var x = 1;
        $.ajax({
            type: 'post',
            data: {
                _token: "{{ csrf_token() }}",
                jumlahracikan,
                kodebarang,
                dosis_racik,
                dosis_awal
            },
            url: '<?= route('simpandraft_racik') ?>',
            success: function(response) {
                $(wrapper).append(response);
                $(wrapper).on("click", ".remove_field", function(e) {
                    status = $(this).attr('status')
                    $('#' + kode).removeAttr('status', true)
                    e.preventDefault();
                    $(this).parent('div').remove();
                    x--;
                })
            }
        });
    }

    function cariobat_reguler() {
        nama = $('#nama_obat_reguler').val()
        spinner = $('#loader2')
        spinner.show();
        $.ajax({
            type: 'post',
            data: {
                _token: "{{ csrf_token() }}",
                nama
            },
            url: '<?= route('cari_obat_reguler') ?>',
            error: function(response) {
                spinner.hide();
                alert('error')
            },
            success: function(response) {
                spinner.hide();
                $('.v_tabel_obat_reguler').html(response);
            }
        });
    }

    function cariobat_racik() {
        nama = $('#nama_obat_racik').val()
        spinner = $('#loader2')
        spinner.show();
        $.ajax({
            type: 'post',
            data: {
                _token: "{{ csrf_token() }}",
                nama
            },
            url: '<?= route('cari_obat_racik') ?>',
            error: function(response) {
                spinner.hide();
                alert('error')
            },
            success: function(response) {
                spinner.hide();
                $('.v_tabel_obat_racik').html(response);
            }
        });
    }

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
                var formorder = $('.form_order_obat').serializeArray();
                kodekunjungan = $('#kodekunjunganorder').val()
                spinner = $('#loader2')
                spinner.show();
                $.ajax({
                    async: true,
                    type: 'post',
                    dataType: 'json',
                    data: {
                        _token: "{{ csrf_token() }}",
                        formorder: JSON.stringify(formorder),
                        kodekunjungan
                    },
                    url: '<?= route('simpan_transaksi_obat') ?>',
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
                        if(data.kode == 500){
                            spinner.hide();
                            Swal.fire({
                                icon: 'error',
                                title: 'Gagal',
                                text: data.message,
                                footer: ''
                            })
                        }else{
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
                    }
                });
            }
        });
    }

    function simpan_racikan() {
        var header = $('.form_header_racikan').serializeArray();
        var detail = $('.v_form_obat_racik').serializeArray();
        kodekunjungan = $('#kodekunjunganorder').val()
        var max_fields = 10;
        var wrapper = $(".form_order_obat");
        var x = 1;
        $.ajax({
            type: 'post',
            data: {
                _token: "{{ csrf_token() }}",
                header: JSON.stringify(header),
                detail: JSON.stringify(detail),
                kodekunjungan
            },
            url: '<?= route('simpan_racikan') ?>',
            success: function(response) {
                $(wrapper).append(response);
                $(wrapper).on("click", ".remove_field", function(e) {
                    status = $(this).attr('status')
                    $('#' + kode).removeAttr('status', true)
                    e.preventDefault();
                    $(this).parent('div').remove();
                    x--;
                })
            }
        });
    }
</script>
