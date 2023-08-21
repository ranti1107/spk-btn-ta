@extends('Admin.template.base')
@section('content')

<h4 class="fw-bold py-3 mb-4">Daftar Akun Karyawan</h4>


              <!-- Hoverable Table rows -->
              <div class="card">
                  <h5 class="card-header">Data Karyawan</h5>
                <div class="row">
                    <a href="{{url('Admin/user-karyawan/create')}}">
                      <div class="btn btn-dark" style="float: right; margin-right: 10px; margin-bottom: 10px"><i class="bx bx-plus"></i> Tambah Karyawan</div>
                    </a>
                  </div>
                <div class="table-responsive text-nowrap">
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th>Nama</th>
                        <th>Username</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                      @foreach($list_user_karyawan as $karyawan)
                      <tr>
                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{$karyawan->nama}}</strong></td>
                        <td>{{$karyawan->username}}</td>
                        <td>
                          <div class="row">
                            <div class="btn-group">
                              <a href="{{url('Admin/user-karyawan/edit', $karyawan->id)}}">
                                <button class="btn btn-primary" style="margin-right: 5px"><i class="bx bx-edit-alt"></i></button>
                              </a>
                              <form action="{{url('Admin/user-karyawan', $karyawan->id)}}" method="post" class="form-inline" onsubmit="return confirm('Yakin Akan Menghapus Data Ini?')">
                                @csrf
                                @method("delete")
                                <button class="btn btn-danger"><i class="bx bx-trash"></i></button>
                              </form>
                            </div>
                          </div>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
              <!--/ Hoverable Table rows -->

              <hr class="my-5" />

@endsection