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
                         <b>Nomor KTP</b> <a class="float-right text-dark">{{ $data_pasien[0]->nik_bpjs }}</a>
                     </li>
                     <li class="list-group-item">
                         <b>Nomor BPJS</b> <a class="float-right text-dark">{{ $data_pasien[0]->no_Bpjs }}</a>
                     </li>
                     <li class="list-group-item">
                         <b>Tgl Lahir</b> <a class="float-right text-dark">{{ $data_pasien[0]->tgl_lahir }}</a>
                     </li>
                     <li class="list-group-item">
                         <b>Alamat</b> <a class="float-right text-dark">{{ $data_pasien[0]->alamat }}</a>
                     </li>
                 </ul>
             </div>
             <!-- /.card-body -->
         </div>

     </div>
     <div class="col-md-10">
         <div class="card">
             <div class="card-header bg-secondary"><i class="bi bi-list-check mr-1 ml-1"></i>Riwayat Kunjungan
             </div>
             <div class="card-body">
                 <table id="tbrk" class="table table-sm table-hover text-xs">
                     <thead>
                         <th>Tanggal Masuk</th>
                         <th>Poli Tujuan</th>
                         <th>Keluhan</th>
                         <th>Dokter Pemeriksan</th>
                     </thead>
                     <tbody>
                         @foreach ($riwayat_kunjungan as $r)
                             <tr>
                                 <td>{{ $r->tgl_masuk }}</td>
                                 <td>{{ $r->nama_unit }}</td>
                                 <td></td>
                                 <td></td>
                             </tr>
                         @endforeach
                     </tbody>
                 </table>
             </div>
         </div>
         <div class="card">
             <div class="card-header bg-info">Form Pendaftaran Pelayanan</div>
             <div class="card-body">
                 <form class="form_pendaftaran">
                     <div class="form-group row">
                         <input hidden type="text" name="nomorrm" id="nomorrm"
                             value="{{ $data_pasien[0]->no_rm }}">
                         <input hidden type="text" name="nomorbpjs" id="nomorbpjs"
                             value="{{ $data_pasien[0]->no_Bpjs }}">
                         <label for="staticEmail" class="col-sm-2 col-form-label">Penjamin</label>
                         <div class="col-sm-10">
                             <div class="form-check form-check-inline">
                                 <input class="form-check-input" type="radio" name="penjamin" id="penjamin"
                                     value="P02" checked>
                                 <label class="form-check-label" for="inlineRadio1">BPJS</label>
                             </div>
                             <div class="form-check form-check-inline">
                                 <input class="form-check-input" type="radio" name="penjamin" id="penjamin"
                                     value="P01">
                                 <label class="form-check-label" for="inlineRadio2">PRIBADI</label>
                             </div>
                         </div>
                     </div>
                     <div class="form-group row">
                         <label for="inputPassword" class="col-sm-2 col-form-label">Tanggal Daftar</label>
                         <div class="col-sm-4">
                             <input type="date" class="form-control" id="tanggaldaftar" name="tanggaldaftar"
                                 value="{{ $now }}">
                         </div>
                     </div>
                     <div class="form-group row">
                         <label for="inputPassword" class="col-sm-2 col-form-label">Tujuan Pelayanan</label>
                         <div class="col-sm-4">
                             <div class="form-group">
                                 <select class="form-control" id="tujuan" name="tujuan">
                                     <option value="0">Silahkan Pilih</option>
                                     @foreach ($mt_unit as $u )
                                     <option value="{{ $u->kode_unit}}">{{ $u->nama_unit }}</option>
                                     @endforeach
                                 </select>
                             </div>
                         </div>
                     </div>
                     <button type="button" class="btn btn-success float-right mr-1 ml-1"
                         onclick="simpanpendaftaran()"><i class="bi bi-download mr-1 ml-1"></i>Simpan</button>
                     <button type="button" class="btn btn-danger float-right kembali"><i
                             class="bi bi-backspace ml-1 mr-1"></i>Batal</button>
                 </form>
             </div>
         </div>
     </div>
 </div>
 <script>
     $(function() {
         $('#tbrk').DataTable({
             "paging": true,
             "lengthChange": false,
             "searching": true,
             "ordering": true,
             "info": true,
             "autoWidth": false,
             "responsive": true,
         });
     });
     $(".kembali").on('click', function(event) {
         $('.v_2').attr('hidden', true)
         $('.v_1').removeAttr('hidden', true)
     });

     function simpanpendaftaran() {
         Swal.fire({
             title: "Simpan Pendaftaran ?",
             text: "Anda akan menyimpan data pendaftaran, pastikan data sudah terisi dengan benar !",
             icon: "warning",
             showCancelButton: true,
             confirmButtonColor: "#3085d6",
             cancelButtonColor: "#d33",
             confirmButtonText: "Simpan",
             cancelButtonText: "Batal"
         }).then((result) => {
             if (result.isConfirmed) {
                 spinner = $('#loader2')
                 spinner.show();
                 var form_pendaftaran = $('.form_pendaftaran').serializeArray();
                 $.ajax({
                     async: true,
                     type: 'post',
                     dataType: 'json',
                     data: {
                         _token: "{{ csrf_token() }}",
                         form_pendaftaran: JSON.stringify(form_pendaftaran)
                     },
                     url: '<?= route('simpanpendaftaran') ?>',
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
                         if (data.kode == 500) {
                             Swal.fire({
                                 icon: 'error',
                                 title: 'Gagal',
                                 text: data.message,
                                 footer: ''
                             })
                         } else {
                             Swal.fire({
                                 icon: 'success',
                                 title: 'OK',
                                 text: data.message,
                                 footer: ''
                             })
                             location.reload()
                         }
                     }
                 });
             }
         });
     }
 </script>
