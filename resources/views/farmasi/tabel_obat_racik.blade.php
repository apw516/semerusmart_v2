<table id="data_tb_obat_rac" class="table table-sm table-bordered table-hover">
    <thead>
        <th>nama obat</th>
        <th>satuan</th>
        <th>Aturan Pakai</th>
        <th>Dosis</th>
    </thead>
    <tbody>
        @foreach ($data_obat as $d)
            <tr class="pillihobatracik" kodebarang="{{ $d->kode_barang }}" nama_barang={{ $d->nama_barang }}
                satuan={{ $d->satuan }} dosis={{ $d->dosis }}>
                <td>{{ $d->nama_barang }}</td>
                <td>{{ $d->satuan }}</td>
                <td>{{ $d->aturan_pakai }}</td>
                <td>{{ $d->dosis }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
<script>
    $(function() {
        $('#data_tb_obat_rac').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": true,
            "ordering": true,
            "info": false,
            "autoWidth": false,
            "responsive": true,
        });
    });
    $('#data_tb_obat_rac').on('click', '.pillihobatracik', function() {
        kodebarang = $(this).attr('kodebarang')
        nama_barang = $(this).attr('nama_barang')
        satuan = $(this).attr('satuan')
        dosis = $(this).attr('dosis')
        $('#draf_nama_obat').val(nama_barang)
        $('#draf_kode_barang').val(kodebarang)
        $('#draft_satuan_obat').val(satuan)
        $('#draft_dosis_awal').val(dosis)
    });
