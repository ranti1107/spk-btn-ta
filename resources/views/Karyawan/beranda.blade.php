@extends('Karyawan.template.base')
@section('content')

<h4 class="fw-bold py-3 mb-4">Beranda
<?php 
  $user = Auth::user();
?>
@if($user->level == 0)
    Admin
@else
    Karyawan
@endif
</h4>
              <div class="row">
                <div class="col-lg-8 mb-4 order-0">
                  <div class="card">
                    <div class="d-flex align-items-end row">
                      <div class="col-sm-7">
                        <div class="card-body">
                          <h5 class="card-title text-primary">Hallo {{Auth::user()->nama}} 🎉</h5>
                          <p class="mb-4">
                            Selamat datang di Sistem Pendukung Keputusan Pemberian KPR Metode AHP
                          </p>

                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4 col-md-4 order-1">
                  <div class="row">
                    <div class="col-lg-6 col-md-12 col-6 mb-4">
                      <div class="card">
                        <div class="card-body">
                          <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                              <i class="bx bx-receipt"></i>
                            </div>
                            <div class="dropdown">
                              <button
                                class="btn p-0"
                                type="button"
                                id="cardOpt3"
                                data-bs-toggle="dropdown"
                                aria-haspopup="true"
                                aria-expanded="false"
                              >
                                <i class="bx bx-dots-vertical-rounded"></i>
                              </button>
                              <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3">
                                <a class="dropdown-item" href="{{url('Admin/kriteria')}}">View More</a>
                              </div>
                            </div>
                          </div>
                          <span class="fw-semibold d-block mb-1">Nasabah yang sudah diproses</span>
                          <h3 class="card-title mb-2">{{$list_perhitungan->count()}}</h3>
                          <small class="text-success fw-semibold">Nasabah</small>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-6 mb-4">
                      <div class="card">
                        <div class="card-body">
                          <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                              <i class="bx bx-group"></i>
                            </div>
                            <div class="dropdown">
                              <button
                                class="btn p-0"
                                type="button"
                                id="cardOpt6"
                                data-bs-toggle="dropdown"
                                aria-haspopup="true"
                                aria-expanded="false"
                              >
                                <i class="bx bx-dots-vertical-rounded"></i>
                              </button>
                              <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt6">
                                <a class="dropdown-item" href="javascript:void(0);">View More</a>
                              </div>
                            </div>
                          </div>
                          <span class="fw-semibold d-block mb-1">Total Seluruh Nasabah</span>
                          <h3 class="card-title mb-2">{{$list_nasabah->count()}}</h3>
                          <small class="text-success fw-semibold">Orang</small>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

@endsection