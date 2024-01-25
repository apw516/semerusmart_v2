<div class="card">
    <div class="card-header">Riwayat Stok Farmasi</div>
    <div class="card-body">
        <table id="tabel_riwayat_resep" class="table table-sm table-bordered table-hover">
            <thead>
                <th>Tanggal masuk</th>
                <th>Nomor RM</th>
                <th>Nama Pasien</th>
                <th>Dokter Pemeriksa</th>
                <th>Dokter Pengirim</th>
                <th>Unit Asal</th>
                <th>Unit Tujuan</th>
            </thead>
            <tbody>
                @foreach ($riwyat_resep as $r )
                    <tr>
                        <td>{{ $r->tgl_masuk }}</td>
                        <td>{{ $r->no_rm }}</td>
                        <td>{{ $r->namapasien }}</td>
                        <td>{{ $r->nama_dokter}}</td>
                        <td>{{ $r->nama_dokter_2 }}</td>
                        <td>{{ $r->nama_unit }}</td>
                        <td>{{ $r->nama_unit_2 }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<script>
    $(function() {
        $('#tabel_riwayat_resep').DataTable({
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
