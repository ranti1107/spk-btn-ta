@extends('Admin.template.base')
@section('content')

<h4 class="fw-bold py-3 mb-4">Kriteria</h4>


              <!-- Hoverable Table rows -->
              <div class="card">
                  <h5 class="card-header">Perhitungan Kriteria</h5>
                  <!-- <div class="container">
                    <a class="btn btn-primary" href="{{url('Admin/perhitungan-kriteria/create')}}"> Tambah Skala Kriteria</a>
                  </div> -->
                <div class="container">
                      <form action="{{url('Admin/perhitungan-kriteria')}}" method="post" enctype="multipart/form-data">
                      @csrf
                  <div class="form-group mb-5">
                    <div class="row">

                      <div class="mt-3 col-md-3">
                          <label for="exampleFormControlInput1" class="form-label">Pilih Kriteria <strong style="color: #00FF0F">*</strong></label>
                          <select class="form-select" name="id_kriteria_1" aria-label="Default select example">
                            <option hidden>Pilih Kriteria</option>
                            @foreach($list_kriteria as $kriteria)
                            <option value="{{$kriteria->id}}">{{$kriteria->nama}}</option>
                            @endforeach
                          </select>
                        </div>

                        <div class="mt-3 col-md-3">
                          <label for="exampleFormControlInput1" class="form-label">Pilih Prioritas</label>
                          <select class="form-select" name="skala" aria-label="Default select example">
                            <option hidden>Pilih Jenis Prioritas</option>
                            <option value="1">- Sama Pentingnya</option>
                            <option value="3">- Agak Penting</option>
                            <option value="5">- Cukup Penting</option>
                            <option value="7">- Lebih Penting</option>
                            <option value="9">- Sangat Penting</option>
                          </select>
                        </div>

                        <div class="mt-3 col-md-3">
                          <label for="exampleFormControlInput1" class="form-label">Pilih Kriteria <strong style="color: #00D4FF">*</strong></label>
                          <select class="form-select" name="id_kriteria_2" aria-label="Default select example">
                            <option hidden>Pilih Kriteria</option>
                            @foreach($list_kriteria as $kriteria)
                            <option value="{{$kriteria->id}}">{{$kriteria->nama}}</option>
                            @endforeach
                          </select>
                        </div>
                        <div class="col-md-3" style="margin-top: 45px"> 
                          <button type="submit" class="btn btn-dark">
                            <i class="bx bx-plus"></i> Hitung
                          </button>
                        </div>
                      </div>
                    </div>
                      </form>
                  </div>
                <div class="container mb-4">
                  <div class="table-responsive">
                    <table class="table table-bordered">
                        <tr>
                          <td> </td>
                        @foreach($list_kriteria as $kriteria)
                          <th style="background-color: #00D4FF">{{$kriteria->nama}}</th>
                        @endforeach
                        </tr>
                        @foreach($list_kriteria as $kriteria1)
                        <tr>
                            <th style="background-color: #00FF0F">{{$kriteria1->nama}}</th>
                            @foreach($list_kriteria as $kriteria)
                            @php
                              $list_perhitungan = App\Models\PerhitunganKriteria::where('id_kriteria_1', $kriteria1->id)->where('id_kriteria_2', $kriteria->id)->get();
                            @endphp
                              @foreach($list_perhitungan as $perhitungan)
                              <td>
                                {{$perhitungan->skala}}
                              </td>
                              @endforeach
                            @endforeach
                        </tr>
                        @endforeach
                        <tr style="background-color: #FFE800">
                          <td><strong>Jumlah</strong></td>
                          @foreach($list_kriteria as $kriteria)
                          @php
                            $jumlah_kolom_1 = App\Models\PerhitunganKriteria::where('id_kriteria_2', $kriteria->id)->sum('skala');
                          @endphp
                          <td><strong>{{$jumlah_kolom_1}}</strong></td>
                          @endforeach
                        </tr>
                    </table>
                  </div>
                </div>
              </div>
              <!--/ Hoverable Table rows -->

              <hr class="my-5" />
              <div class="card">
                  <h5 class="card-header">Perhitungan Matriks Nilai Kriteria (Normalisasi)</h5>
                <div class="container mb-4">
                  <div class="row">
                    <div class="col-md-8">
                      <div class="table-responsive text-nowrap">
                        <table class="table table-bordered">
                            <tr>
                              <td> </td>
                            @foreach($list_kriteria as $kriteria)
                              <td>{{$kriteria->nama}}</td>
                            @endforeach
                            </tr>
                            @foreach($list_kriteria as $kriteria1)
                            <tr>
                                <td>{{$kriteria1->nama}}</td>

                                @foreach($list_kriteria as $kriteria)
                                @php
                                  $list_perhitungan = App\Models\PerhitunganKriteria::where('id_kriteria_1', $kriteria1->id)->where('id_kriteria_2', $kriteria->id)->get();

                                  $jumlah_skala = App\Models\PerhitunganKriteria::where('id_kriteria_2', $kriteria->id)->sum('skala');
                                  
                                @endphp
                                  @foreach($list_perhitungan as $nilai_matriks)
                                  @php
                                    //Mencari Matriks Nilai Kriteria (Normalisasi)
                                    ${"normalisasi".$kriteria1->id} = $nilai_matriks->skala/$jumlah_skala;

                                    //Mencari Total Matriks Nilai Kriteria (Normalisasi)
                                    if($kriteria1->id == $nilai_matriks->id_kriteria_1){
                                      ${"total".$kriteria1->id}[] = ${"normalisasi".$kriteria1->id};
                                    }
                                  @endphp
                                    <td>
                                      {{number_format(${"normalisasi".$kriteria1->id},3)}}
                                    </td>
                                  @endforeach
                                @endforeach
                            @endforeach
                            </tr>
                        </table>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="table-responsive text-nowrap">
                        <table class="table table-bordered">
                            <tr>
                              <td>Jumlah</td>
                              <td>Prioritas</td>
                            </tr>
                            @foreach($list_kriteria as $kriteria)
                            <tr>
                              <td>
                                {{number_format(array_sum(${"total".$kriteria->id}), 3)}}
                              </td>
                              <td>
                                <!-- Mencari Prioritas Matriks Nilai Kriteria -->
                                {{number_format(array_sum(${"total".$kriteria->id}) / $list_kriteria->count(), 3)}}
                              </td>
                            </tr>
                            @endforeach
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <hr class="my-5" />

              <div class="card">
                  <h5 class="card-header">Perhitungan Jumlah Baris</h5>
                  <div class="container mb-4">
                    <div class="row">
                      <div class="col-8">
                        <div class="table-responsive text-nowrap">
                          <table class="table table-bordered">
                          <tr>
                            <td> </td>
                          @foreach($list_kriteria as $kriteria)
                            <td>{{$kriteria->nama}}</td>
                          @endforeach
                          </tr>
                          @foreach($list_kriteria as $kriteria1)
                          <tr>
                              <td>{{$kriteria1->nama}}</td>
                              @foreach($list_kriteria as $kriteria)
                              @php
                                $list_perhitungan = App\Models\PerhitunganKriteria::where('id_kriteria_1', $kriteria1->id)->where('id_kriteria_2', $kriteria->id)->get();
                              @endphp
                                @foreach($list_perhitungan as $perhitungan)

                                @php
                                  //Mencari Jumlah Baris
                                  ${"nilai".$kriteria1->id} = $perhitungan->skala * (array_sum(${"total".$kriteria->id}) / $list_kriteria->count());
                                  
                                  if($kriteria1->id == $perhitungan->id_kriteria_1){
                                      ${"jumlah_baris".$kriteria1->id}[] = ${"nilai".$kriteria1->id};
                                    }
                                @endphp
                                <td>
                                  {{number_format(${"nilai".$kriteria1->id}, 3)}}
                                </td>
                                @endforeach
                              @endforeach
                          </tr>
                          @endforeach
                      </table>
                    </div>
                      </div>
                      <div class="col-4">
                        <table class="table table-bordered">
                            <tr>
                              <td>Jumlah</td>
                            </tr>
                            @foreach($list_kriteria as $kriteria)
                            <tr>
                              <td>
                                {{number_format(array_sum(${"jumlah_baris".$kriteria->id}), 3)}}
                              </td>
                            </tr>
                            @endforeach
                        </table>

                      </div>
                    </div>
                  </div>
              </div>

              <hr class="my-5" />
              <div class="card">
                  <h5 class="card-header">Perhitungan Rasio Konsisten</h5>
                  <div class="container mb-4">
                    <div class="row">
                      <div class="col-3">
                        <table class="table table-bordered">
                        <tr>
                          <td> Kriteria </td>
                        </tr>
                        @foreach($list_kriteria as $kriteria1)
                        <tr>
                            <td>{{$kriteria1->nama}}</td>
                        </tr>
                        @endforeach
                      </table>
                      </div>
                      <div class="col-3" style="margin-left:-27px">
                        <table class="table table-bordered">
                            <tr>
                              <td>Jumlah Perbaris</td>
                            </tr>
                            @foreach($list_kriteria as $kriteria)
                            <tr>
                              <td>
                                {{number_format(array_sum(${"jumlah_baris".$kriteria->id}), 3)}}
                              </td>
                            </tr>
                            @endforeach
                        </table>
                      </div>
                      <div class="col-3" style="margin-left:-27px">
                        <table class="table table-bordered">
                            <tr>
                              <td>Prioritas</td>
                            </tr>
                            @foreach($list_kriteria as $kriteria)
                            <tr>
                              <td>
                                {{number_format(array_sum(${"total".$kriteria->id}) / $list_kriteria->count(), 3)}}
                              </td>
                            </tr>
                            @endforeach
                        </table>
                      </div>
                      <div class="col-3" style="margin-left:-27px">
                        <table class="table table-bordered">
                            <tr>
                              <td>Hasil</td>
                            </tr>
                            @foreach($list_kriteria as $kriteria)
                            <tr>
                              <td>
                                {{number_format(array_sum(${"jumlah_baris".$kriteria->id})+(array_sum(${"total".$kriteria->id}) / $list_kriteria->count()), 3)}}

                                @php
                                  //Mencari Hasil Rasio Konsisten
                                    ${"hasil".$kriteria->id} = array_sum(${"jumlah_baris".$kriteria->id})+(array_sum(${"total".$kriteria->id}) / $list_kriteria->count());

                                    $totalhasil[] = ${"hasil".$kriteria->id};
                                    $maks = array_sum($totalhasil) / $list_kriteria->count();
                                    $ci = ($maks-$list_kriteria->count())/($list_kriteria->count()-1);
                                @endphp
                              </td>
                            </tr>
                            @endforeach
                        </table>
                      </div>
                    </div>
                  </div>
              </div>

              <div class="card mt-3">
                  <h5 class="card-header">Rasio Konsisten</h5>
                  <div class="container">
                    @php
                      if($list_kriteria->count() == 9){
                        $cr = 1.45;
                      } else if($list_kriteria->count() == 8) {
                        $cr = 1.41;
                      } else if($list_kriteria->count() == 7) {
                        $cr = 1.32;
                      } else if($list_kriteria->count() == 6) {
                        $cr = 1.24;
                      } else if($list_kriteria->count() == 5) {
                        $cr = 1.12;
                      } else if($list_kriteria->count() == 4) {
                        $cr = 0.9;
                      } else if($list_kriteria->count() == 3) {
                        $cr = 0.58;
                      } else {
                        $cr = 0;
                      }

                      $konsisten = $ci * $cr;
                    @endphp
                    <h4>
                      <strong>{{number_format($konsisten, 3)}}</strong> 
                        @if($konsisten < 0.1)
                        <span class="badge bg-success">
                          (Konsisten)
                        </span>
                        @else
                        <span class="badge bg-danger">
                          (Tidak Konsisten, Silahkan lakukan perhitungan ulang)
                        </span>
                        @endif
                    </h4>
                  </div>
              </div>


@endsection