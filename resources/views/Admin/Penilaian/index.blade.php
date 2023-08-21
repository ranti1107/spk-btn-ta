@extends('Admin.template.base')
@push('style')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css">
<!-- <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css"> -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.bootstrap5.min.css">


@endpush
@section('content')
    <!-- Prioritas Kriteria -->
    <table class="table table-bordered">
        @foreach ($list_kriteria as $kriteria1)
            @foreach ($list_kriteria as $kriteria)
                @php
                    $list_perhitungan3 = App\Models\PerhitunganKriteria::where('id_kriteria_1', $kriteria1->id)
                        ->where('id_kriteria_2', $kriteria->id)
                        ->get();

                    $jumlah_kolom = App\Models\PerhitunganKriteria::where('id_kriteria_2', $kriteria->id)->sum('skala');

                @endphp
                @foreach ($list_perhitungan3 as $nilai_matriks)
                    @php
                        ${'normalisasi' . $kriteria1->id} = $nilai_matriks->skala / $jumlah_kolom;

                        if ($kriteria1->id == $nilai_matriks->id_kriteria_1) {
                            ${'prioritasKriteria' . $kriteria1->id}[] = ${'normalisasi' . $kriteria1->id};
                        }
                    @endphp
                @endforeach
            @endforeach
        @endforeach
    </table>

    <h4 class="fw-bold py-3 mb-4">Penilaian Nasabah</h4>

    <!-- Hoverable Table rows -->
    <div class="card">
        <h5 class="card-header">Data Penilaian</h5>
        <div class="container">
            <div class="table-responsive">
                <table id="table" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Nama Alternatif</th>
                            @foreach ($list_kriteria as $kriteria)
                                <th>{{ $kriteria->nama }}</th>

                                @foreach ($kriteria->subkriteria as $subkriteria1)
                                    @foreach ($kriteria->subkriteria as $subkriteria2)
                                        @php
                                            $list_perhitungan1 = App\Models\PerhitunganSubkriteria::where('id_subkriteria_1', $subkriteria1->id)
                                                ->where('id_subkriteria_2', $subkriteria2->id)
                                                ->get();

                                            $jumlah_kolom = App\Models\PerhitunganSubkriteria::where('id_subkriteria_2', $subkriteria2->id)->sum('skala');

                                        @endphp
                                        @foreach ($list_perhitungan1 as $nilai_matriks)
                                            @php
                                                ${'normalisasi' . $subkriteria1->id} = $nilai_matriks->skala / $jumlah_kolom;

                                                if ($subkriteria1->id == $nilai_matriks->id_subkriteria_1) {
                                                    ${'total' . $subkriteria1->id}[] = ${'normalisasi' . $subkriteria1->id};
                                                }
                                            @endphp
                                        @endforeach
                                    @endforeach
                                    @php
                                        ${'prioritas' . $subkriteria1->id} = array_sum(${'total' . $subkriteria1->id}) / $kriteria->subkriteria->count();

                                        $maks[] = ${'prioritas' . $subkriteria1->id};
                                        $max = max($maks);
                                        ${'prioritasSubkriteria' . $subkriteria1->id} = ${'prioritas' . $subkriteria1->id} / $max;
                                    @endphp
                                @endforeach
                            @endforeach
                            <th style="background-color: #FFE000">Jumlah</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($list_perhitungan as $perhitungan)
                            <tr>
                                <td> {{ $perhitungan->nasabah->nama }} </td>

                                @php
                                    $list_bobot = App\Models\SubPerhitungan::where('id_perhitungan', $perhitungan->id)->orderBy('id_subkriteria')->get();
                                @endphp

                                @foreach ($list_bobot as $bobot)
                                    <td>
                                        {{ number_format((${'prioritasSubkriteria' . $bobot->subkriteria->id} * array_sum(${'prioritasKriteria' . $bobot->subkriteria->kriteria->id})) / $list_kriteria->count(), 3) }}
                                    </td>

                                    @php
                                        ${'totalPenilaian' . $perhitungan->nasabah->id}[] = (${'prioritasSubkriteria' . $bobot->subkriteria->id} * array_sum(${'prioritasKriteria' . $bobot->subkriteria->kriteria->id})) / $list_kriteria->count();
                                    @endphp
                                @endforeach
                                <td style="background-color: #FFE000">{{ number_format(array_sum(${'totalPenilaian' . $perhitungan->nasabah->id}), 3) }}</td>
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
    var table = $('#table').DataTable( {
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
