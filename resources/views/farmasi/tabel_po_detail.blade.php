<div class="card mt-2">
    <div class="card-header bg-secondary">PO {{ $kode_po }} | Tanggal beli : {{ $tgl_beli }}| Tanggal terima : {{ $tgl_terima}} | Supplier {{ $nama }}
    <button class="btn btn-danger mr-2 ml-2 float-right" data-toggle="tooltip" data-placement="top" title="Retur PO ..."><i class="bi bi-trash-fill"></i></button>
    </div>
    <div class="card-body">
        <table id="tb_detail_po" class="table table-sm table-hover">
            <thead>
                <th>Nama Barang</th>
                <th>Jumlah</th>
                <th>Satuan</th>
                <th>Diskon</th>
                <th>SubTotal</th>
                <th>batch</th>
                <th>ed</th>
            </thead>
            <tbody>
                @foreach ($riwayat as $r )
                    <tr>
                        <td>{{ $r->nama_barang }}</td>
                        <td>{{ $r->qty}}</td>
                        <td>{{ $r->satuan}}</td>
                        <td>{{ $r->diskon}}</td>
                        <td>{{ $r->sub_total}}</td>
                        <td>{{ $r->batch}}</td>
                        <td>{{ $r->ed}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<script>
       $(function() {
        $('#tb_detail_po').DataTable({
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
