@extends('Karyawan.template.base')
@section('content')

<h4 class="fw-bold py-3 mb-4">Nasabah Pemohon</h4>

          <div class="row">
            <div class="col-12 col-lg-12 d-flex">
              <div class="card flex-fill">
                <div class="card-header">
                  <h5 class="card-title mb-0">Edit Data Nasabah</h5>
                </div>
                <form action="{{url('Karyawan/nasabah/edit', $nasabah->id)}}" method="post" enctype="multipart/form-data" style="margin-left: 20px; margin-right: 20px; margin-bottom: 20px">
                  @csrf
                  @method("PUT")
                  <div class="container">
                    <div class="row">
                      <div class="mt-3 col-md-6">
                        <label for="exampleFormControlInput1" class="form-label">Nama Nasabah Pemohon</label>
                        <input type="text" class="form-control" name="nama" value="{{$nasabah->nama}}" id="exampleFormControlInput1">
                      </div>
                      <div class="mt-3 col-md-6">
                        <label for="exampleFormControlInput1" class="form-label">NIK</label>
                        <input type="number" value="{{$nasabah->nik}}" class="form-control @error('nik') is-invalid @enderror" name="nik" id="exampleFormControlInput1" required>
                        @error('nik')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                        @enderror
                      </div>
                      <div class="mt-3 col-md-6">
                        <label for="exampleFormControlInput1" class="form-label">Tanggal Lahir</label>
                        <input type="text" class="form-control" name="ttl" value="{{$nasabah->ttl}}" id="exampleFormControlInput1">
                      </div>
                      <div class="mt-3 col-md-6">
                        <label for="exampleFormControlInput1" class="form-label">Alamat</label>
                        <input type="text" class="form-control" name="alamat" value="{{$nasabah->alamat}}" id="exampleFormControlInput1">
                      </div>
                      <div class="mt-3 col-md-6">
                        <label for="exampleFormControlInput1" class="form-label">Pas Foto Pemohon dan Pasangan</label>
                        <input type="file" class="form-control" name="pas_foto" value="{{$nasabah->pas_foto}}" id="exampleFormControlInput1">
                      </div>
                      <div class="mt-3 col-md-6">
                        <label for="exampleFormControlInput1" class="form-label">Jenis Kelamin</label>
                        <select class="form-select" name="jenis_kelamin">
                        	<option value="{{$nasabah->jenis_kelamin}}" hidden>{{$nasabah->jenis_kelamin}}</option>
                        	<option value="Laki-laki">Laki-laki</option>
                        	<option value="Perempuan">Perempuan</option>
                        </select>
                      </div>
                      <div class="mt-3 col-md-6">
                        <label for="exampleFormControlInput1" class="form-label">Fotokopi KTP Pemohon</label>
                        <input type="file" class="form-control" name="ktp_pemohon" value="{{$nasabah->ktp_pemohon}}" id="exampleFormControlInput1">
                      </div>
                      <div class="mt-3 col-md-6">
                        <label for="exampleFormControlInput1" class="form-label">Fotokopi KTP Suami/Istri</label>
                        <input type="file" class="form-control" name="ktp_suami_istri" value="{{$nasabah->ktp_suami_istri}}" id="exampleFormControlInput1">
                      </div>
                      <div class="mt-3 col-md-6">
                        <label for="exampleFormControlInput1" class="form-label">Fotokopi Kartu Keluarga</label>
                        <input type="file" class="form-control" name="kk" value="{{$nasabah->kk}}" id="exampleFormControlInput1">
                      </div>
                       <div class="mt-3 col-md-6">
                        <label for="exampleFormControlInput1" class="form-label">Fotokopi Surat Nikah/Cerai</label>
                        <input type="file" class="form-control" name="surat_nikah" value="{{$nasabah->surat_nikah}}" id="exampleFormControlInput1">
                      </div>
                      <div class="mt-3 col-md-6">
                        <label for="exampleFormControlInput1" class="form-label">Fotokopi NPWP/SPT Tahunan</label>
                        <input type="file" class="form-control" name="npwp_spt" value="{{$nasabah->npwp_spt}}" id="exampleFormControlInput1">
                      </div>
                      <div class="mt-3 col-md-6">
                        <label for="exampleFormControlInput1" class="form-label">Fotokopi SK Pengangkatan Pegawai Tetap</label>
                        <input type="file" class="form-control" name="skp_pegawai_tetap" value="{{$nasabah->sk_pegawai_tetap}}" id="exampleFormControlInput1">
                      </div>
                      <div class="mt-3 col-md-6">
                        <label for="exampleFormControlInput1" class="form-label">Asli Slip Gaji/Surat Keterangan Penghasilan</label>
                        <input type="file" class="form-control" name="slip_gaji" value="{{$nasabah->slip_gaji}}" id="exampleFormControlInput1">
                      </div>
                      <div class="mt-3 col-md-6">
                        <label for="exampleFormControlInput1" class="form-label">Fotokopi SIUP</label>
                        <input type="file" class="form-control" name="siup" value="{{$nasabah->siup}}" id="exampleFormControlInput1">
                      </div>
                      <div class="mt-3 col-md-6">
                        <label for="exampleFormControlInput1" class="form-label">Fotokopi TDP</label>
                        <input type="file" class="form-control" name="tdp" value="{{$nasabah->tdp}}" id="exampleFormControlInput1">
                      </div>
                      <div class="mt-3 col-md-6">
                        <label for="exampleFormControlInput1" class="form-label">Fotokopi Akta Pendirian/Perubahan</label>
                        <input type="file" class="form-control" name="akta_pendirian" value="{{$nasabah->akta_pendirian}}" id="exampleFormControlInput1">
                      </div>
                      <div class="mt-3 col-md-6">
                        <label for="exampleFormControlInput1" class="form-label">Fotokopi Akta Pengesahan Menteri Kehakiman</label>
                        <input type="file" class="form-control" name="akta_pengesahan_menteri" value="{{$nasabah->akta_pengesahan_menteri}}" id="exampleFormControlInput1">
                      </div>
                      <div class="mt-3 col-md-6">
                        <label for="exampleFormControlInput1" class="form-label">Fotokopi Data Keuangan Perusahaan</label>
                        <input type="file" class="form-control" name="data_keuangan_perusahaan" value="{{$nasabah->data_keuangan_perusahaan}}" id="exampleFormControlInput1">
                      </div>
                      <div class="mt-3 col-md-6">
                        <label for="exampleFormControlInput1" class="form-label">Fotokopi Izin Praktek</label>
                        <input type="file" class="form-control" name="izin_praktek" value="{{$nasabah->izin_praktek}}" id="exampleFormControlInput1">
                      </div>
                      <div class="mt-3 col-md-6">
                        <label for="exampleFormControlInput1" class="form-label">Fotokopi Rekening Koran/Tabungan 3 Bulan Terakhir</label>
                        <input type="file" class="form-control" name="rekening_koran" value="{{$nasabah->rekening_koran}}" id="exampleFormControlInput1">
                      </div>
                      <div class="row mt-3 m-auto">
                        <button class="btn btn-primary border-0 w-25" style="margin-left: auto;"><i class="fa fa-check-square"></i> Simpan</button>
                      </div>
                    </div>
                  </div>
                  </form>
              </div>
            </div>
          </div>

@endsection