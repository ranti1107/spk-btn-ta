@extends('Karyawan.template.base')
@section('content')
    <h4 class="fw-bold py-3 mb-4">Penilaian Nasabah</h4>

    <div class="row">
        <div class="col-12 col-lg-12 d-flex">
            <div class="card flex-fill">
                <div class="card-header">
                    <h5 class="card-title mb-0">Tambah Bobot</h5>
                </div>
                <form action="{{ url('Karyawan/tambah-bobot', $perhitungan->id) }}" method="post"
                    enctype="multipart/form-data" style="margin-left: 20px; margin-right: 20px; margin-bottom: 20px">
                    @csrf
                    @method('PUT')
                    <div class="container">
                        <div class="row">
                            <div class="mt-3 col-md-6">
                                <label for="exampleFormControlInput1" class="form-label">Nasabah</label>
                                <input type="text" class="form-control" value="{{ $perhitungan->nasabah->nama }}"
                                    readonly>
                                <div class="row mt-2">
                                    <div class="table-basic text-nowrap">
                                        <table class="table">
                                            @php
                                                $list_bobot = App\Models\SubPerhitungan::where('id_perhitungan', $perhitungan->id)->get();
                                            @endphp
                                            @foreach ($list_bobot as $bobot)
                                                <tr>
                                                    <td>{{ $bobot->subkriteria->kriteria->nama }}</td>
                                                    <td>:</td>
                                                    <td>{{ $bobot->subkriteria->nama }}</td>
                                                </tr>
                                            @endforeach
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-3 col-md-6">
                                    <div class="row">
                                        <label for="exampleFormControlInput1" class="form-label">Pilih Kriteria</label>
                                @foreach ($list_kriteria as $kriteria)
                                        <button type="button" class="btn btn-secondary mb-2" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal{{ $kriteria->id }}">
                                            {{ $kriteria->nama }}
                                        </button>
                                @endforeach
                                    </div>
                            </div>

                            <div class="row mt-3 m-auto">
                                <a href="{{ url('Karyawan/perhitungan') }}" class="btn btn-primary border-0 w-25"
                                    style="margin-left: auto;"><i class="fa fa-check-square"></i> Lanjutkan</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection


<!-- Modal -->
@foreach ($list_kriteria as $kriteria)
    <div class="modal fade" id="exampleModal{{ $kriteria->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Pilih Subkriteria</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('Karyawan/tambah-bobot', $perhitungan->id) }}" method="post">
                        @csrf
                        <input type="hidden" name="id_kriteria" value="{{ $kriteria->id }}">
                        <input type="text" name="id_perhitungan" value="{{ $perhitungan->id }}" hidden>
                        <label for="exampleFormControlInput1" class="form-label">{{ $kriteria->nama }}</label>
                        <select class="form-select mb-4" name="id_subkriteria" aria-label="Default select example">
                            <option hidden>Pilihan Kriteria</option>
                            @php
                                $list_subkriteria = App\Models\Subkriteria::where('kriteria_id', $kriteria->id)->orderBy('bobot','DESC')->get();
                            @endphp
                            @foreach ($list_subkriteria as $subkriteria)
                                <option value="{{ $subkriteria->id }}">{{ $subkriteria->nama }}</option>
                            @endforeach
                        </select>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
                </form>
            </div>
        </div>
    </div>
@endforeach