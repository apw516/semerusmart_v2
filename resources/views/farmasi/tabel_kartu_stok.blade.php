<table id="tabelkartustok" class="table table-sm table-bordered table-hover">
    <thead>
        <th>Nama Barang</th>
        <th>Tanggal Stok</th>
        <th>Stok last</th>
        <th>Stok In</th>
        <th>Stok Out</th>
        <th>Stok Current</th>
    </thead>
    <tbody>
        @foreach ($stok as $s )
            <tr>
                <td>{{ $s->nama_barang }}</td>
                <td>{{ $s->tgl_stok}}</td>
                <td>{{ $s->stok_last}}</td>
                <td>{{ $s->stok_in}}</td>
                <td>{{ $s->stok_out}}</td>
                <td>{{ $s->stok_current}}</td>
            </tr>
        @endforeach
    </tbody>
</table>
<script>
    $(function() {
     $('#tabelkartustok').DataTable({
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
</script>
