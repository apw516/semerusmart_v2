<table id="tb_header_po" class="table table-sm table-hover">
    <thead>
        <th>Tanggal entry</th>
        <th>Nama Supplier</th>
        <th>Alamat</th>
        <th>Tanggal beli</th>
        <th>Tanggal terima</th>
    </thead>
    <tbody>
        @foreach ($riwayat as $r)
            <tr class="pilih_po" kode="{{ $r->kode_po }}" nama="{{ $r->nama_supplier}}" tglbeli={{ $r->tgl_beli}} tglterima="{{ $r->tgl_terima }}">
                <td>{{ $r->tgl_input }}</td>
                <td>{{ $r->nama_supplier }}</td>
                <td>{{ $r->alamat_supplier }}</td>
                <td>{{ $r->tgl_beli }}</td>
                <td>{{ $r->tgl_terima }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
<script>
    $(function() {
        $('#tb_header_po').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
            "pageLength": 3,
        });
    });
    $('#tb_header_po').on('click', '.pilih_po', function() {
        kode = $(this).attr('kode')
        nama = $(this).attr('nama')
        tgl_beli = $(this).attr('tgl_beli')
        tgl_terima = $(this).attr('tgl_terima')
        $.ajax({
            type: 'post',
            data: {
                _token: "{{ csrf_token() }}",
                kode,
                nama,
                tgl_beli,
                tgl_terima
            },
            url: '<?= route('detail_po') ?>',
            success: function(response) {
                $('.v_2_tabel_riwayat_po_detail').html(response);
            }
        });
    });
</script>
