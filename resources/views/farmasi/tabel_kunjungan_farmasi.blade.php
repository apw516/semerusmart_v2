  <table id="tabelpasien_far" class="table table-sm table-bordered table-hover">
      <thead>
          <th>Tgl Masuk</th>
          <th>Nomor RM</th>
          <th>Nama Pasien</th>
          <th>Unit Asal</th>
          <th>Dokter</th>
          <th class="text-center">===</th>
      </thead>
      <tbody>
          @foreach ($datakunjungan as $d)
              <tr>
                  <td>{{ $d->tgl_masuk }}</td>
                  <td>{{ $d->no_rm }}</td>
                  <td>{{ $d->nama_pasien }}</td>
                  <td>{{ $d->unit_asal }}</td>
                  <td>{{ $d->dokter_pemeriksa }}</td>
                  <td class="text-center"><button class="btn btn-sm btn-success inputresep"
                          kodekunjungan="{{ $d->kode_kunjungan }}" rm="{{ $d->no_rm }}"><i
                              class="bi bi-ticket-detailed ml-1 mr-1"></i>detail</button></td>
              </tr>
          @endforeach
      </tbody>
  </table>
  <script>
      $(function() {
          $('#tabelpasien_far').DataTable({
              "paging": true,
              "lengthChange": false,
              "searching": false,
              "ordering": true,
              "info": false,
              "autoWidth": false,
              "responsive": true,
          });
      });
      $(".inputresep").on('click', function(event) {
          $('.v_2').removeAttr('hidden', true)
          $('.v_1').attr('hidden', true)
          kode = $(this).attr('kodekunjungan')
          rm = $(this).attr('rm')
          spinner = $('#loader2')
          spinner.show();
          $.ajax({
              type: 'post',
              data: {
                  _token: "{{ csrf_token() }}",
                  kode,
                  rm
              },
              url: '<?= route('ambil_detail_orderan') ?>',
              error: function(response) {
                  spinner.hide();
                  alert('error')
              },
              success: function(response) {
                  spinner.hide();
                  $('.detail_orderan_farmasi').html(response);
              }
          });
      });
  </script>
