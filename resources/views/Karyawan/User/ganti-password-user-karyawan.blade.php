@extends('Karyawan.template.base')
@section('content')

<h4 class="fw-bold py-3 mb-4">Setting Akun Karyawan</h4>

              <div class="row">

                <!-- Merged -->
                <div class="col-md-12">
                  <div class="card mb-4">
                    <h5 class="card-header">Ganti Password <b>{{$karyawan->nama}}</b></h5>
                    <form action="{{url('Karyawan/ganti-password')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body demo-vertical-spacing demo-only-element">
                      <div class="form-password-toggle">
                        <label class="form-label" for="basic-default-password1">Password Lama</label>
                        <div class="input-group input-group-merge">
                          <input
                            type="password"
                            class="form-control"
                            id="basic-default-password1"
                            placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                            aria-describedby="basic-default-password"
                            name="lama"
                          />
                          <span class="input-group-text cursor-pointer" id="basic-default-password"
                            ><i class="bx bx-hide"></i
                          ></span>
                        </div>
                      </div>
                      <div class="form-password-toggle">
                        <label class="form-label" for="basic-default-password2">Password Baru</label>
                        <div class="input-group input-group-merge">
                          <input
                            type="password"
                            class="form-control"
                            id="basic-default-password2"
                            placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                            aria-describedby="basic-default-password"
                            name="baru"
                            required
                          >
                          <span class="input-group-text cursor-pointer" id="basic-default-password"
                            ><i class="bx bx-hide"></i
                          ></span>
                        </div>
                      </div>
                      <div class="form-password-toggle">
                        <label class="form-label" for="basic-default-password3">Konfirmasi Password Baru</label>
                        <div class="input-group input-group-merge">
                          <input
                            type="password"
                            class="form-control"
                            id="basic-default-password3"
                            placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                            aria-describedby="basic-default-password"
                            name="konfirmasi"
                          />
                          <span class="input-group-text cursor-pointer" id="basic-default-password"
                            ><i class="bx bx-hide"></i
                          ></span>
                        </div>
                      </div>
                      <button class="btn btn-primary" type="submit">Simpan</button>
                    </div>
                    </form>
                  </div>
                </div>

@endsection