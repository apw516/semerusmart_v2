<div class="card">
    <div class="card-header">Tabel Riwayat PO</div>
    <div class="card-body">
        <table id="tabelriwayatpo" class="table table-sm table-bordered table-hover">
            <thead>
                <th>Nomor Faktur</th>
                <th>Nama Supplier</th>
                <th>Tanggal beli</th>
                <th>Tanggal terima</th>
                <th>Tanggal input</th>
                <th>Sub Total</th>
                <th>Pph</th>
                <th>Ppn</th>
                <th>Materai</th>
                <th>Diskon</th>
                <th>Grandtotal</th>
            </thead>
            <tbody>
                @foreach ($header_po as $h )
                    <tr class="detailpo" id="{{ $h->id}}">
                        <td>{{ $h->no_faktur}}</td>
                        <td>{{ $h->nama_supplier}}</td>
                        <td>{{ $h->tgl_beli}}</td>
                        <td>{{ $h->tgl_terima}}</td>
                        <td>{{ $h->tgl_input}}</td>
                        <td>IDR {{ number_format($h->sub_gtotal_po, 2) }}</td>
                        <td>IDR {{ number_format($h->pph, 2) }}</td>
                        <td>IDR {{ number_format($h->ppn, 2) }}</td>
                        <td>IDR {{ number_format($h->materai, 2) }}</td>
                        <td>{{ $h->disk_persen}} %</td>
                        <td>IDR {{ number_format($h->gtotal_po, 2) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<script>
    $(function() {
        $('#tabelriwayatpo').DataTable({
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
    $('#tabelriwayatpo').on('click', '.detailpo', function() {
        id = $(this).attr('id')
        $('.v_1').attr('hidden',true)
        $('.v_2').removeAttr('hidden',true)
        $.ajax({
            type: 'post',
            data: {
                _token: "{{ csrf_token() }}",
                id
            },
            url: '<?= route('detail_riwayat_po') ?>',
            success: function(response) {
                $('.v_2').html(response);
            }
        });
    });
