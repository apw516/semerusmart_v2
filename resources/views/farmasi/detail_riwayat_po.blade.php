<div class="container-fluid">
    <button class="btn btn-danger mb-2" onclick="kembali()"><i class="bi bi-backspace-fill mr-1 ml-1"></i> Kembali</button>
    <div class="row">
        <div class="col-12"> <!-- Main content -->
            <div class="invoice p-3 mb-3 shadow-lg">
                <!-- title row -->
                <div class="row">
                    <div class="col-12">
                        <h4>
                            Semerusmart.
                            <small class="float-right">Date: {{ $header_po[0]->tgl_input }}</small>
                        </h4>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- info row -->
                <div class="row invoice-info">
                    <div class="col-sm-4 invoice-col">
                        Dari
                        <address>
                            <strong>{{ $header_po[0]->nama_supplier }}</strong><br>
                            {{ $header_po[0]->alamat_supplier }}<br>
                            Phone: {{ $header_po[0]->tlp }}<br>
                        </address>
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-4 invoice-col">

                    </div>
                    <!-- /.col -->
                    <div class="col-sm-4 invoice-col">
                        <b>Nomor Faktur #{{ $header_po[0]->no_faktur }}</b><br>
                        <br>
                        <b>Tanggal Beli:</b> {{ $header_po[0]->tgl_beli }}<br>
                        <b>Tanggal Terima:</b> {{ $header_po[0]->tgl_terima }}<br>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->

                <!-- Table row -->
                <div class="row">
                    <div class="col-12 table-responsive">
                        <table class="table table-striped table-sm">
                            <thead>
                                <tr>
                                    <th>Nama Barang</th>
                                    <th>Satuan</th>
                                    <th>Jumlah Satuan</th>
                                    <th>Jumlah Satuan Sedang</th>
                                    <th>Jumlah Satuan Kecil</th>
                                    <th>Harga Satuan Sedang</th>
                                    <th>Diskon</th>
                                    <th>Jumlah</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($detail as $d)
                                    <tr>
                                        <td>{{ $d->nama_barang }}</td>
                                        <td>{{ $d->satuan }}</td>
                                        <td>{{ $d->qty }}</td>
                                        <td>{{ $d->isi }}</td>
                                        <td>{{ $d->qty_kecil }}</td>
                                        <td>IDR {{ number_format($d->harga_satuan_sedang, 2) }}</td>
                                        <td>{{ $d->diskon }} %</td>
                                        <td>IDR {{ number_format($d->sub_total, 2) }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->

                <div class="row">
                    <!-- accepted payments column -->
                    <div class="col-6">

                    </div>
                    <!-- /.col -->
                    <div class="col-6">
                        <p class="lead">Jumlah yang dibayar</p>

                        <div class="table-responsive">
                            <table class="table table-sm">
                                <tr>
                                    <th style="width:50%">Subtotal:</th>
                                    <td>IDR {{ number_format($header_po[0]->sub_gtotal_po, 2) }}</td>
                                </tr>
                                <tr>
                                    <th>Diskon</th>
                                    <td>{{ $header_po[0]->disk_rupiah }} %</td>
                                </tr>
                                <tr>
                                    <th>Pph</th>
                                    <td>IDR {{ number_format($header_po[0]->pph, 2) }}</td>
                                </tr>
                                <tr>
                                    <th>Ppn:</th>
                                    <td>IDR {{ number_format($header_po[0]->ppn, 2) }}</td>
                                </tr>
                                <tr>
                                    <th>Materai:</th>
                                    <td>IDR {{ number_format($header_po[0]->materai, 2) }}</td>
                                </tr>
                                <tr>
                                    <th>Total:</th>
                                    <td>IDR {{ number_format($header_po[0]->gtotal_po, 2) }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->

                <!-- this row will not appear when printing -->
                <div class="row no-print">
                    <div class="col-12">
                        {{-- <a href="invoice-print.html" rel="noopener" target="_blank" class="btn btn-default"><i
                                class="fas fa-print"></i> Print</a> --}}
                        <button type="button" class="btn btn-success float-right"><i class="bi bi-printer far"></i>
                            Print
                        </button>
                    </div>
                </div>
            </div>
            <!-- /.invoice -->
        </div><!-- /.col -->
    </div><!-- /.row -->
</div><!-- /.container-fluid -->
<script>
    function kembali() {
        $('.v_2').attr('hidden', true)
        $('.v_1').removeAttr('hidden', true)
    }
</script>
