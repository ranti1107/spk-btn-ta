@extends('Karyawan.template.base')
@push('style')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<!-- <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css"> -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.bootstrap5.min.css">


@endpush
@section('content')
    <h4 class="fw-bold py-3 mb-4">Penilaian Nasabah</h4>


    <!-- Hoverable Table rows -->
    <div class="card">
        <h5 class="card-header">Data Penilaian</h5>
        <div class="container">
            <div class="row">
                <a href="{{ url('Karyawan/tambah-nasabah/create') }}">
                    <div class="btn btn-dark" style="float: right; margin-right: 10px; margin-bottom: 10px"><i
                            class="bx bx-plus"></i> Tambah Data Nasabah</div>
                </a>
            </div>
            <div class="table-responsive text-nowrap">
                <table id="tabel" class="table table-hover">
                    @foreach ($list_perhitungan as $perhitungan)
                        @php
                            $list_bobot = App\Models\SubPerhitungan::where('id_perhitungan', $perhitungan->id)->orderBy('id_subkriteria')->get();

                            $bobot = App\Models\SubPerhitungan::where('id_perhitungan', $perhitungan->id)->first();
                        @endphp
                    @endforeach
                    <thead>
                        <tr>
                            <th>Nama Alternatif</th>
                            <th>Aksi</th>
                            @foreach ($list_kriteria as $kriteria)
                                <th>{{ $kriteria->nama }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($list_perhitungan as $perhitungan)
                            @php
                                $list_bobot = App\Models\SubPerhitungan::where('id_perhitungan', $perhitungan->id)->orderBy('id_subkriteria')->get();
                            @endphp
                            <tr>
                                <td> {{ $perhitungan->nasabah->nama }} </td>
                                    <td>
                                        <div class="row">
                                            <div class="btn-group">
                                                <form action="{{ url('Karyawan/perhitungan/hapus', $perhitungan->id) }}"
                                                    method="post" class="form-inline" style="margin-right: 5px"
                                                    onsubmit="return confirm('Yakin Akan Menghapus Data Ini?')">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="btn btn-danger"><i class="bx bx-user-x"></i></button>
                                                </form>
                                                <a href="{{ url('Karyawan/tambah-bobot', $perhitungan->id) }}"><button
                                                        class="btn btn-warning"><i class="bx bx-archive-in"></i>
                                                        Bobot</button></a>
                                            </div>
                                        </div>
                                    </td>

                                @foreach ($list_bobot as $bobot)
                                    <td>{{ $bobot->subkriteria->nama }}</td>
                                @endforeach
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!--/ Hoverable Table rows -->

    <hr class="my-5" />
@endsection
@push('script')
<script type="text/javascript" src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.bootstrap5.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.colVis.min.js"></script>
<script>
    $(document).ready(function() {
    var table = $('#tabel').DataTable( {
        stateSave: true,
        buttons: ['excel','pdf','print'],
        dom: 
        "<'row'<'col-md-3'l><'col-md-5'B><'col-md-4'f>>"+
        "<'row'<'col-md-12'tr>>"+
        "<'row'<'col-md-5'i><'col-md-7'p>>",
        lengthMenu:[
            [10,25,50,100,-1],
            [10,25,50,100,"Semua"]
        ]
    } );
 
    table.buttons().container()
        .appendTo( '#table_wrapper .col-md-5:eq(0)' );
} );

</script>
@endpush