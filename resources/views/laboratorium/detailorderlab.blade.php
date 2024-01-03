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
        <form action="post" class="form_orderlab">
            
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="inputEmail4">Nama Tindakan</label>
                    <input type="text" class="form-control" id="namatindakan" name="namatindakan" value="">
                    <input hidden type="text" class="form-control" id="kodekunjungan" name="kodekunjungan" value="">
                </div>
                <div class="form-group col-md-3">
                    <label for="inputPassword4">Qty</label>
                    <input type="text" class="form-control" id="qty" name="qty" value="">
                </div>
                <div class="form-group col-md-3">
                    <label for="inputPassword4">Harga</label>
                    <input type="text" class="form-control" id="harga" name="harga" value="">
                </div>
                <div class="form-group col-md-3">
                    <label for="inputPassword4">disc</label>
                    <input type="text" class="form-control" id="disc" name="disc" value="">
                </div>
            </div>
           
        </form>

       

        <button type="button" class="btn btn-success float-right" onclick="simpanassesment()"><i class="bi bi-save mr-1"></i>Simpan</button>
        <button type="button" class="btn btn-danger float-right mr-2"><i class="bi bi-x mr-1"></i>Batal</button>
    </div>
</div>

<div class=" ml-2 mr-3 card">
    <div class="card-body">
      <h1>Riwayat Order Laboratorium</h1>
        <form action="post" class="form_orderlab">
            
        <table id="tabelantrian" class="table table-sm table-bordered table-hover">
                    <thead class="bg-info">
                        <th>No</th>
                        <th>Nama Tindakan</th>
                        <th>Harga</th>
                        <th>Action</th>

                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Gula Darah Sewaktu</td>
                            <td>Rp. 35.000</td>
                            <td>
                                <button class="badge badge-danger detailorderlab"> Retur </button>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Creatinin</td>
                            <td>Rp. 75.000</td>
                            <td>
                                <button class="badge badge-danger detailorderlab"> Retur </button>
                            </td>
                        </tr>
                    
                    </tbody>
                </table>
           
        </form>

       

   
    </div>
</div>


<script>

</script>