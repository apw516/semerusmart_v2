<div class="card mt-3">
    <div class="card-header bg-info"><i class="bi bi-database-fill mr-1 ml-1"></i>Data Master Barang</div>
    <div class="card-body">
        <table id="tabel_master_barang" class="table table-sm table-bordered table-hover">
            <thead>
                <th>Kode barang</th>
                <th>Nama barang</th>
                <th>Dosis</th>
                <th>Aturan pakai</th>
                {{-- <th>Harga beli</th>
                <th>HNA</th> --}}
            </thead>
            <tbody>
                @foreach ($mt_barang as $b)
                    <tr>
                        <td>{{ $b->kode_barang }}</td>
                        <td>{{ $b->nama_barang }}</td>
                        <td>{{ $b->dosis }}</td>
                        <td>{{ $b->aturan_pakai }}</td>
                        {{-- <td>{{ $b->harga_beli }}</td> --}}
                        {{-- <td>{{ $b->hna }}</td> --}}
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<script>
    $(function() {
        $('#tabel_master_barang').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>
