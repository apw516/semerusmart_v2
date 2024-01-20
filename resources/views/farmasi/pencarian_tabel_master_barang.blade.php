<table id="tabel_pencarian_mt_barang" class="table table-sm table-hover table-sm text-xs">
    <thead>
        <th>Kode Barang</th>
        <th>Nama Barang</th>
    </thead>
    <tbody>
        @foreach ($mt_barang as $n)
            <tr class="pilihobat" namaobat="{{ $n->nama_barang }}" kode_barang="{{ $n->kode_barang }}">
                <td>{{ $n->kode_barang }}</td>
                <td>{{ $n->nama_barang }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
<script>
    $(function() {
        $('#tabel_pencarian_mt_barang').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
            "pageLength": 5
        });
    });
    $('#tabel_pencarian_mt_barang').on('click', '.pilihobat', function() {
        namaobat = $(this).attr('namaobat')
        kode_barang = $(this).attr('kode_barang')
        var max_fields = 10;
        var wrapper = $(".v_list");
        var x = 1;
        if (x < max_fields) {
            x++; //text box increment
            $.ajax({
                  type: 'post',
                  data: {
                      _token: "{{ csrf_token() }}",
                      namaobat,
                      kode_barang,
                  },
                  url: '<?= route('add_obat_po') ?>',
                  success: function(response) {
                      $(wrapper).append(response);
                      $(wrapper).on("click", ".remove_field", function(e) { //user click on remove
                          status = $(this).attr('status')
                          $('#' + kode_barang).removeAttr('status', true)
                          e.preventDefault();
                          $(this).parent('div').remove();
                          x--;
                      })
                  }
              });
        }
    });
</script>
