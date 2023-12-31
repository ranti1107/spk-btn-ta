@extends('Karyawan.template.base')
@section('content')

<h4 class="fw-bold py-3 mb-4">Nasabah Pemohon</h4>

          <div class="row">
            <div class="col-12 col-lg-12 d-flex">
              <div class="card flex-fill">
                <div class="card-header">
                  <h5 class="card-title mb-0">Tambah Data Nasabah Pemohon</h5>
                </div>
                <form action="{{url('Karyawan/nasabah')}}" method="post" enctype="multipart/form-data" style="margin-left: 20px; margin-right: 20px; margin-bottom: 20px">
                  @csrf
                  <div class="container">
                    <div class="row">
                      <div class="mt-3 col-md-6">
                        <label for="exampleFormControlInput1" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" name="nama" id="exampleFormControlInput1" required>
                      </div>
                      <div class="mt-3 col-md-6">
                        <label for="exampleFormControlInput1" class="form-label">NIK</label>
                        <input type="number" class="form-control @error('nik') is-invalid @enderror" name="nik" id="exampleFormControlInput1">
                        @error('nik')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                        @enderror
                      </div>
                      <div class="mt-3 col-md-6">
                        <label for="exampleFormControlInput1" class="form-label">Tempat, Tanggal Lahir</label>
                        <input type="text" class="form-control" name="ttl" id="exampleFormControlInput1" required>
                      </div>
                      <div class="mt-3 col-md-6">
                        <label for="exampleFormControlInput1" class="form-label">Jenis Kelamin</label>
                        <select class="form-select" name="jenis_kelamin" aria-label="Default select example" required>
                          <option hidden>Pilih Jenis Kelamin</option>
                          <option value="Laki-laki">Laki-laki</option>
                          <option value="Perempuan">Perempuan</option>
                        </select>
                      </div>
                      <div class="mt-3 col-md-6">
                        <label for="exampleFormControlInput1" class="form-label">Alamat Lengkap</label>
                        <input type="text" class="form-control" name="alamat" id="exampleFormControlInput1" required>
                      </div>
                      <div class="mt-3 col-md-6">
                        <label for="exampleFormControlInput1" class="form-label">Pas Foto Pemohon dan Pasangan (Apabila telah menikah)</label>
                        <input type="file" class="form-control" name="pas_foto" id="exampleFormControlInput1">
                      </div>
                      <div class="mt-3 col-md-6">
                        <label for="exampleFormControlInput1" class="form-label">Fotokopi KTP Pemohon</label>
                        <input type="file" class="form-control" name="ktp_pemohon" id="exampleFormControlInput1">
                      </div>
                      <div class="mt-3 col-md-6">
                        <label for="exampleFormControlInput1" class="form-label">Fotokopi KTP Suami/Istri</label>
                        <input type="file" class="form-control" name="ktp_suami_istri" id="exampleFormControlInput1">
                      </div>
                      <div class="mt-3 col-md-6">
                        <label for="exampleFormControlInput1" class="form-label">Fotokopi Kartu Keluarga</label>
                        <input type="file" class="form-control" name="kk" id="exampleFormControlInput1">
                      </div>
                      <div class="mt-3 col-md-6">
                        <label for="exampleFormControlInput1" class="form-label">Fotokopi Surat Nikah/Cerai</label>
                        <input type="file" class="form-control" name="surat_nikah" id="exampleFormControlInput1">
                      </div>
                      <div class="mt-3 col-md-6">
                        <label for="exampleFormControlInput1" class="form-label">Fotokopi NPWP/SPT Tahunan</label>
                        <input type="file" class="form-control" name="npwp_spt" id="exampleFormControlInput1">
                      </div>
                      <div class="mt-3 col-md-6">
                        <label for="exampleFormControlInput1" class="form-label">Fotokopi SK Pengangkatan Pegawai Tetap</label>
                        <input type="file" class="form-control" name="skp_pegawai" id="exampleFormControlInput1">
                      </div>
                      <div class="mt-3 col-md-6">
                        <label for="exampleFormControlInput1" class="form-label">Asli Slip Gaji Satu Bulan Terakhir/ Surat Keterangan Penghasilan</label>
                        <input type="file" class="form-control" name="slip_gaji" id="exampleFormControlInput1">
                      </div>
                      <div class="mt-3 col-md-6">
                        <label for="exampleFormControlInput1" class="form-label">Fotokopi SIUP</label>
                        <input type="file" class="form-control" name="siup" id="exampleFormControlInput1">
                      </div>
                      <div class="mt-3 col-md-6">
                        <label for="exampleFormControlInput1" class="form-label">Fotokopi TDP</label>
                        <input type="file" class="form-control" name="tdp" id="exampleFormControlInput1">
                      </div>
                      <div class="mt-3 col-md-6">
                        <label for="exampleFormControlInput1" class="form-label">Fotokopi Akta Pendirian/Perubahan</label>
                        <input type="file" class="form-control" name="akta_pendirian" id="exampleFormControlInput1">
                      </div>
                      <div class="mt-3 col-md-6">
                        <label for="exampleFormControlInput1" class="form-label">Fotokopi Akta Pengesahan Menteri Kehakiman</label>
                        <input type="file" class="form-control" name="akta_pengesahan_menteri" id="exampleFormControlInput1">
                      </div>
                      <div class="mt-3 col-md-6">
                        <label for="exampleFormControlInput1" class="form-label">Fotokopi Data Keuangan Perusahaan</label>
                        <input type="file" class="form-control" name="data_keuangan_perusahaan" id="exampleFormControlInput1">
                      </div>
                      <div class="mt-3 col-md-6">
                        <label for="exampleFormControlInput1" class="form-label">Fotokopi Izin Praktek</label>
                        <input type="file" class="form-control" name="izin_praktek" id="exampleFormControlInput1">
                      </div>
                      <div class="mt-3 col-md-6">
                        <label for="exampleFormControlInput1" class="form-label">Fotokopi Rekening Koran atau Tabungan 3 Bulan Terakhir</label>
                        <input type="file" class="form-control" name="rekening_koran" id="exampleFormControlInput1">
                      </div>
                      <div class="row mt-3">
                        <div class="row mt-3 m-auto">
                        <button type="submit" class="btn btn-primary border-0 w-25" style="margin-left: auto;"><i class="fa fa-check-square"></i> Simpan</button>
                      </div>
                    </div>
                  </form>
              </div>
            </div>
          </div>

@endsection

