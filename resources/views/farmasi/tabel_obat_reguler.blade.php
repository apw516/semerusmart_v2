<table id="data_tb_obat_reg" class="table table-sm table-bordered table-hover">
    <thead>
        <th>nama obat</th>
        <th>satuan</th>
        <th>Aturan Pakai</th>
        <th>Stok</th>
    </thead>
    <tbody>
        @foreach ($data_obat as $d)
            <tr class="pilihobat" kode_barang="{{ $d->kode_barang }}" no="{{ $d->kode_barang }}">
                <td>{{ $d->nama_barang }}</td>
                <td>{{ $d->satuan }}</td>
                <td>{{ $d->aturan_pakai }}</td>
                <td>{{ $d->stok_current }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
<script>
    $(function() {
        $('#data_tb_obat_reg').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": true,
            "ordering": true,
            "info": false,
            "autoWidth": false,
            "responsive": true,
        });
    });
    $('#data_tb_obat_reg').on('click', '.pilihobat', function() {
        kodebarang = $(this).attr('kode_barang')
        no = $(this).attr('no')
        var max_fields = 10;
        var wrapper = $(".form_order_obat");
        var x = 1;
        $.ajax({
            type: 'post',
            data: {
                _token: "{{ csrf_token() }}",
                kodebarang,
                no
            },
            url: '<?= route('pilih_obat_reguler') ?>',
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
    });
