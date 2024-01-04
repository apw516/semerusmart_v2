  <div class="card">
      <div class="card-header bg-info"><i class="bi bi-database-fill mr-1 ml-1"></i>Data Pasien
      </div>
      <div class="card-header">
          <table id="tabelpasien" class="table table-sm table-bordered table-hover">
              <thead>
                  <th>Nomor RM</th>
                  <th>Nomor KTP</th>
                  <th>Nomor BPJS</th>
                  <th>Nama Pasien</th>
                  <th>Tanggal lahir</th>
                  <th>Alamat</th>
                  <th>Action</th>
              </thead>
              <tbody>
                  @foreach ($data_pasien as $p)
                      <tr>
                          <td>{{ $p->no_rm }}</td>
                          <td>{{ $p->NIK }}</td>
                          <td>{{ $p->no_asuransi }}</td>
                          <td>{{ $p->nama_pasien }}</td>
                          <td>{{ $p->TGL_LAHIR }} | {{ $p->jenis_kelamin }}</td>
                          <td>{{ $p->alamat }}</td>
                          <td><button rm="{{ $p->no_rm }}" class="btn btn-success btn-sm daftarpasien"><i
                                      class="bi bi-r-square mr-1 ml-1"></i>Daftar</button></td>
                      </tr>
                  @endforeach
              </tbody>
          </table>
      </div>
  </div>
  <script>
      $(function() {
          $('#tabelpasien').DataTable({
              "paging": true,
              "lengthChange": false,
              "searching": true,
              "ordering": true,
              "info": true,
              "autoWidth": false,
              "responsive": true,
          });
      });
      $(".daftarpasien").on('click', function(event) {
          $('.v_1').attr('hidden', true)
          $('.v_2').removeAttr('hidden', true)
          rm = $(this).attr('rm')
          spinner = $('#loader2')
          spinner.show();
          $.ajax({
              type: 'post',
              data: {
                  _token: "{{ csrf_token() }}",
                  rm
              },
              url: '<?= route('ambildetailpasien') ?>',
              error: function(response) {
                  spinner.hide();
                  alert('error')
              },
              success: function(response) {
                  spinner.hide();
                  $('.v_detail_pasien').html(response);
              }
          });
      });
  </script>
