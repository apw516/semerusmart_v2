<div class="card">
    <div class="card-header bg-info"><i class="bi bi-database-fill mr-1 ml-1"></i>Data Riwayat Kunjungan</div>
    <div class="card-body">
        <table id="tabel_riwayat_kunjungan" class="table table-sm table-bordered table-hover">
            <thead>
                <th>Tanggal masuk</th>
                <th>Nomor RM</th>
                <th>Nama Pasien</th>
                <th width="50%">Alamat</th>
                <th>Penjamin</th>
                <th>Unit</th>
                <th>Status</th>
                <th>Action</th>
            </thead>
            <tbody>
                @foreach ($data_kunjungan as $dk)
                    <tr>
                        <td>{{ $dk->tgl_masuk }}</td>
                        <td>{{ $dk->no_rm }}</td>
                        <td>{{ $dk->nama_pasien }}</td>
                        <td>{{ $dk->alamat }}</td>
                        <td>{{ $dk->nama_penjamin }}</td>
                        <td>{{ $dk->nama_unit }}</td>
                        <td>
                            @if($dk->status_kunjungan == 1)
                            Aktif
                            @elseif($dk->status_kunjungan == 2)
                                Selesai
                            @else
                                {{ $dk->status_kunjungan }}</td>
                            @endif
                        <td>
                            <button class="btn btn-sm btn-warning"><i class="bi bi-pencil-square"></i></button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<script>
    $(function() {
        $('#tabel_riwayat_kunjungan').DataTable({
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
