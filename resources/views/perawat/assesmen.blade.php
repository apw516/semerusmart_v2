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

        <form action="post" class="form_assesment_perawat">
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

            <!-- <div class="form-group">
                <label for="inputAddress2">Diagnosa</label>
                <input type="text" class="form-control" id="diagnosa" name="diagnosa" placeholder="" value="">
            </div> -->
            <div class="form-group">
                <label for="inputAddress2">Hasil Pemeriksaan</label>
                <textarea type="text" class="form-control" id="hasilpemeriksaan" name="hasilpemeriksaan" placeholder="">

</textarea>
            </div>
        </form>



        <button type="button" class="btn btn-success float-right" onclick="simpanassesment()"><i class="bi bi-save mr-1"></i>Simpan</button>
        <button type="button" class="btn btn-danger float-right mr-2"><i class="bi bi-x mr-1"></i>Batal</button>
    </div>
</div>


<script>

</script>