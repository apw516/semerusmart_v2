<table id="tabelsediaan" class="table table-sm table-bordered table-hover">
    <thead>
        <th>Tanggal Entry</th>
        <th>Last Update</th>
        <th>Nama Barang</th>
        <th>Supplier</th>
        <th>Expired date</th>
        <th>Stok Last</th>
        <th>Stok in</th>
        <th>Stok out</th>
        <th>Stok Current</th>
    </thead>
    <tbody>
        @foreach ($stok_sediaan as $sd)
            <tr>
                <td>{{ $sd->tgl_entry }}</td>
                <td>{{ $sd->last_update }}</td>
                <td>{{ $sd->nama_barang }}</td>
                <td>{{ $sd->nama_supplier }}</td>
                <td>{{ $sd->ed }}</td>
                <td>{{ $sd->stok_last }}</td>
                <td>{{ $sd->stok_in }}</td>
                <td>{{ $sd->stok_out }}</td>
                <td>{{ $sd->stok }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
<script>
    $(function() {
        $('#tabelsediaan').DataTable({
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
