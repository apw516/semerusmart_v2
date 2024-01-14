<table id="tabel_pencarian_mt_barang" class="table table-sm table-hover table-sm text-xs">
    <thead>
        <th>Kode Barang</th>
        <th>Nama Barang</th>
    </thead>
    <tbody>
        @foreach ($mt_barang as $n)
            <tr class="pilihobat" namaobat="{{$n->nama_barang}}">
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
        var max_fields = 10;
        var wrapper = $(".v_list");
        var x = 1;
        $(wrapper).append(
            '<div class="form-row"><div class="form-group col-md-4"><label for="inputEmail4">Nama Obat</label><input readonly type="text" class="form-control" id="inputEmail4" value="' +
            namaobat +
            '"></div><div class="form-group col-md-1"><label for="inputPassword4">Jumlah</label><input type="text" class="form-control" id="jumlah" name="jumlah" value="0"></div><div class="form-group col-md-4"><label for="inputPassword4">Aturan Pakai</label><input type="text" class="form-control" id="aturanpakai" name="aturanpakai"></div><i class="bi bi-x-square remove_field form-group col-md-1 text-danger" status="" jenisracik="non-racikan""></i></div>'
        );
        $(wrapper).on("click", ".remove_field", function(e) { //user click on remove
            status = $(this).attr('status')
            $('#' + namaobat).removeAttr('status', true)
            e.preventDefault();
            $(this).parent('div').remove();
            x--;
        })
    });
</script>
