<?php

namespace App\Http\Controllers;
use App\Models\Nasabah;
use Illuminate\Http\Request;


class NasabahController extends Controller
{
	function BerandaNasabah(){
		$data['list_nasabah'] = Nasabah::all();
		return view('Karyawan.Nasabah.beranda', $data);
	}

	function CreateNasabah(){
		return view('Karyawan.Nasabah.create');
	}

	function simpan(Request $request){
		$request->validate(
            [
                'nik' => ($request->id) ? 'required' : 'required|unique:nasabah',
            ],
            [
            	'nik.required'=>'Harap isi bidang ini',
            	'nik.unique'=>'NIK sudah tersedia',
            ]
        );

		$nasabah = new Nasabah;
		$nasabah->nama = request('nama');
		$nasabah->nik = request('nik');
		$nasabah->ttl = request('ttl');
		$nasabah->jenis_kelamin = request('jenis_kelamin');
		$nasabah->alamat = request('alamat');
		$nasabah->handleUploadKTPpemohon();
		$nasabah->handleUploadKTPsuami();
		$nasabah->handleUploadKK();
		$nasabah->handleUploadSuratNikah();
		$nasabah->handleUploadNPWP();
		$nasabah->handleUploadSKPegawai();
		$nasabah->handleUploadSlipGaji();
		$nasabah->handleUploadSIUP();
		$nasabah->handleUploadTDP();
		$nasabah->handleUploadAktaPendirian();
		$nasabah->handleUploadAktaPengesahan();
		$nasabah->handleUploadDataKeuangan();
		$nasabah->handleUploadIzinPraktek();
		$nasabah->handleUploadRekeningKoran();
		$nasabah->handleUploadPasFoto();

		$nasabah->save();

		return redirect('Karyawan/nasabah')->with('success', 'Data Nasabah Berhasil Ditambahkan');
	}

	function edit(Nasabah $nasabah){
		$data['nasabah'] = $nasabah;
		return view('Karyawan.Nasabah.edit', $data);
	}

	function update(Nasabah $nasabah, Request $request){
		$nasabah->nama = request('nama');
		$nasabah->nik = request('nik');
		$nasabah->ttl = request('ttl');
		$nasabah->jenis_kelamin = request('jenis_kelamin');
		$nasabah->alamat = request('alamat');
		$nasabah->handleUploadKTPpemohon();
		$nasabah->handleUploadKTPsuami();
		$nasabah->handleUploadKK();
		$nasabah->handleUploadSuratNikah();
		$nasabah->handleUploadNPWP();
		$nasabah->handleUploadSKPegawai();
		$nasabah->handleUploadSlipGaji();
		$nasabah->handleUploadSIUP();
		$nasabah->handleUploadTDP();
		$nasabah->handleUploadAktaPendirian();
		$nasabah->handleUploadAktaPengesahan();
		$nasabah->handleUploadDataKeuangan();
		$nasabah->handleUploadIzinPraktek();
		$nasabah->handleUploadRekeningKoran();
		$nasabah->handleUploadPasFoto();
		$nasabah->update();

		return redirect('Karyawan/nasabah')->with('success', 'Data Nasabah Berhasil Diedit');
	}

	function detail(Nasabah $nasabah){
		$data['nasabah'] = $nasabah;
		return view('Karyawan.Nasabah.detail', $data);
	}

	function destroy(Nasabah $nasabah){
		$nasabah->handleDeleteFile();
		$nasabah->delete();

		return redirect ('Karyawan/nasabah')-> with ('danger', 'Data Nasabah Berhasil Dihapus');

	}
}