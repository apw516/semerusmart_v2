@extends('templates.main')
@section('container')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">REKAMEDIS ELEKTRONIK PERAWAT</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    {{-- <li class="breadcrumb-item"><a href="#">Home</a></li> --}}
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div>
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<section class="content">
    <div class="container-fluid">
        <div class="row form_ermnya">
            <div class="col-md-12">
                <H5>Antrian Pasien</H5>
                <div class="v_a_p">

                </div>
                <table id="tabelantrian" class="table table-sm table-bordered table-hover">
                    <thead class="bg-info">
                        <th>No</th>
                        <th>Nama</th>
                        <th>Status</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>AGYL PUTRA PRABOWO</td>
                            <td>
                                <button class="badge badge-danger assesmenperawat"> Belum Di Assesment </button>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td> RABOWO</td>
                            <td>
                                <button class="badge badge-danger assesmenperawat"> Belum Di Assesment </button>
                            </td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td> PUTRA </td>
                            <td>
                                <button class="badge badge-danger assesmenperawat"> Belum Di Assesment </button>
                            </td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td> NINGSIH </td>
                            <td>
                                <button class="badge badge-danger assesmenperawat"> Belum Di Assesment </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
          
        </div>
    </div>
</section>
<script>
    $(function() {
        $('#tabelantrian').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });

    $(".assesmenperawat").click(function() {
        spinner = $('#loader2');
        spinner.show();
    
        $.ajax({
            type: "post",
            data: {
                _token: "{{ csrf_token() }}",
               


            },
            url: '<?= route('assesmenperawat') ?>',
            error: function(data) {
                spinner.hide();
                alert('oke!!')
            },
            success: function(response) {
                spinner.hide();
                $('.form_ermnya').html(response);

            }
        });
    });

    // $(function() {
    //     $('#tabeltindakan').DataTable({
    //         "paging": true,
    //         "lengthChange": false,
    //         "searching": true,
    //         "ordering": true,
    //         "info": true,
    //         "autoWidth": false,
    //         "responsive": true,
    //     });
    // });
    // $(document).ready(function() {
    //     get_antrian_erm()
    // })

    // function get_antrian_erm() {
    //     $.ajax({
    //         type: 'post',
    //         data: {
    //             _token: "{{ csrf_token() }}"
    //         },
    //         success: function(response) {
    //             $('.v_a_p').html(response);
    //         }
    //     });
    // }
</script>
<!-- /.content -->
@endsection