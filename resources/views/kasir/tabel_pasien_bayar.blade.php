  <div class="card">
      <div class="card-header bg-success"><i class="bi bi-database-fill mr-1 ml-1"></i>Data Pasien
      </div>
      <div class="card-header">
          <table id="tbl_patient_cashier" class="table table-sm table-bordered table-hover">
              <thead>
                  <th>Tanggal Kunjungan</th>
                  <th>No Kunjungan</th>
                  <th>Nomor RM</th>
                  <th>Nama Pasien</th>
                  <th>No Telepon</th>
                  <th>Nama Dokter</th>
                  <th>Nama Poli</th>
                  <th>Kasir</th>
                  <th></th>
              </thead>
              <tbody>
                  @foreach ($data_pasien_bayar as $p)
                      <tr>
                          <td>{{ $p->tgl_masuk }}</td>
                          <td>{{ $p->kode_kunjungan }}</td>
                          <td>{{ $p->no_rm }}</td>
                          <td>{{ $p->nama_px }}</td>
                          <td>{{ $p->no_hp }}</td>
                          <td>{{ $p->nama_paramedis }}</td>
                          <td>{{ $p->nama_unit }}</td>
                          <td></td>
                          <td><button rm="{{ $p->no_rm }}" class="btn btn-success btn-sm bayar"><i
                                      class="bi bi-cash mr-1 ml-1"></i>Bayar</button></td>
                      </tr>
                  @endforeach
              </tbody>
          </table>
      </div>
  </div>
  <script>
      $(function() {
          $('#tbl_patient_cashier').DataTable({
              "paging": true,
              "lengthChange": false,
              "searching": true,
              "ordering": true,
              "info": true,
              "autoWidth": false,
              "responsive": true,
              "columnDefs": [{
				"targets": [8], // your case first column
				"className": "text-center"
			}]
          });
      });
     
  </script>
