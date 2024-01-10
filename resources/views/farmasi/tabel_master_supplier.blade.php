<div class="card mt-3">
    <div class="card-header bg-info"><i class="bi bi-database-fill mr-1 ml-1"></i>Data Master Supplier</div>
    <div class="card-body">
        <table id="tabel_master_supplier" class="table table-sm table-bordered table-hover">
            <thead>
                <th>Kode Supplier</th>
                <th>Nama Supplier</th>
                <th>Alamat Supplier</th>
            </thead>
            <tbody>
                @foreach ($mt_supplier as $b)
                    <tr>
                        <td>{{ $b->kode_supplier }}</td>
                        <td>{{ $b->nama_supplier }}</td>
                        <td>{{ $b->alamat_supplier }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<script>
    $(function() {
        $('#tabel_master_supplier').DataTable({
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
