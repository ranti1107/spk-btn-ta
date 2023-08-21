@extends('Admin.template.base')
@section('content')

<h4 class="fw-bold py-3 mb-4">User Karyawan</h4>

              <div class="row">

                <!-- Merged -->
                <div class="col-md-12">
                  <div class="card mb-4">
                    <h5 class="card-header">Edit Data <b>{{$karyawan->nama}}</b></h5>
                    <form action="{{url('Admin/user-karyawan/edit', $karyawan->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method("PUT")
                    <div class="card-body demo-vertical-spacing demo-only-element">
                      <div class="input-group input-group-merge">
                        <span class="input-group-text" id="basic-addon-search31"><i class="bx bx-id-card"></i></span>
                        <input
                          type="text"
                          class="form-control"
                          placeholder="Masukkan Nama"
                          aria-label="Masukkan Nama"
                          aria-describedby="basic-addon-search31"
                          name="nama"
                          value="{{$karyawan->nama}}"
                        />
                      </div>

                      <div class="input-group input-group-merge">
                        <span class="input-group-text" id="basic-addon-search31"><i class="bx bx-user"></i></span>
                        <input
                          type="text"
                          class="form-control @error('username') is-invalid @enderror"
                          placeholder="Masukkan Username"
                          aria-label="Masukkan Username"
                          aria-describedby="basic-addon-search31"
                          name="username"
                          value="{{$karyawan->username}}"
                        />
                        @error('username')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                        @enderror
                      </div>

                      <div class="input-group input-group-merge">
                        <span class="input-group-text" id="basic-addon-search31"><i class="bx bx-envelope"></i></span>
                        <input
                          type="text"
                          class="form-control"
                          placeholder="Masukkan Email"
                          aria-label="Masukkan Email"
                          aria-describedby="basic-addon33"
                          name="email"
                          value="{{$karyawan->email}}"
                        />
                        <span class="input-group-text" id="basic-addon33">@example.com</span>
                      </div>
                      <div class="input-group input-group-merge">
                        <span class="input-group-text" id="basic-addon-search31"><i class="bx bx-image-add"></i></span>
                        <input
                          type="file"
                          class="form-control"
                          aria-describedby="basic-addon33"
                          name="foto"
                        />
                      </div>
                      <!-- <div class="form-password-toggle">
                        <label class="form-label" for="basic-default-password32">Password</label>
                        <div class="input-group input-group-merge">
                          <input
                            type="password"
                            class="form-control"
                            id="basic-default-password32"
                            placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                            aria-describedby="basic-default-password"
                            name="password"
                          />
                          <span class="input-group-text cursor-pointer" id="basic-default-password"
                            ><i class="bx bx-hide"></i
                          ></span>
                        </div>
                      </div> -->
                      <button class="btn btn-primary" type="submit">Simpan</button>
                    </div>
                    </form>
                  </div>
                </div>

@endsection