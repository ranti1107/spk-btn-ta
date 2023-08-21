<?php

namespace App\Models;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Nasabah extends Model{
	protected $table = 'nasabah';
	protected $guarded =['id'];

	public function perhitungan(){
		return $this->hasOne(Perhitungan::class, 'id_nasabah');
	}

	function handleUploadKTPpemohon(){

		if(request()->hasFile('ktp_pemohon')){
			$ktp_pemohon = request()->file('ktp_pemohon');
			$destination = "file/ktp-pemohon";
			$randomStr = Str::random(5);
			$filename = $this->id."-".time()."-".$randomStr.".".$ktp_pemohon->extension();
			$url = $ktp_pemohon->storeAs($destination, $filename);
			$this->ktp_pemohon = $url;
			$this->save;
		}
	}

	function handleUploadKTPsuami(){

		if(request()->hasFile('ktp_suami_istri')){
			$ktp_suami_istri = request()->file('ktp_suami_istri');
			$destination = "file/ktp-suami";
			$randomStr = Str::random(5);
			$filename = $this->id."-".time()."-".$randomStr.".".$ktp_suami_istri->extension();
			$url = $ktp_suami_istri->storeAs($destination, $filename);
			$this->ktp_suami_istri = $url;
			$this->save;
		}
	}

	function handleUploadKK(){

		if(request()->hasFile('kk')){
			$kk = request()->file('kk');
			$destination = "file/kk";
			$randomStr = Str::random(5);
			$filename = $this->id."-".time()."-".$randomStr.".".$kk->extension();
			$url = $kk->storeAs($destination, $filename);
			$this->kk = $url;
			$this->save;
		}
	}

	function handleUploadSuratNikah(){

		if(request()->hasFile('surat_nikah')){
			$surat_nikah = request()->file('surat_nikah');
			$destination = "file/surat-nikah";
			$randomStr = Str::random(5);
			$filename = $this->id."-".time()."-".$randomStr.".".$surat_nikah->extension();
			$url = $surat_nikah->storeAs($destination, $filename);
			$this->surat_nikah = $url;
			$this->save;
		}
	}

	function handleUploadNPWP(){

		if(request()->hasFile('npwp_spt')){
			$npwp = request()->file('npwp_spt');
			$destination = "file/npwp";
			$randomStr = Str::random(5);
			$filename = $this->id."-".time()."-".$randomStr.".".$npwp->extension();
			$url = $npwp->storeAs($destination, $filename);
			$this->npwp_spt = $url;
			$this->save;
		}
	}

	function handleUploadSKPegawai(){

		if(request()->hasFile('sk_pegawai_tetap')){
			$skp_pegawai = request()->file('sk_pegawai_tetap');
			$destination = "file/sk-pegawai";
			$randomStr = Str::random(5);
			$filename = $this->id."-".time()."-".$randomStr.".".$skp_pegawai->extension();
			$url = $skp_pegawai->storeAs($destination, $filename);
			$this->sk_pegawai_tetap = $url;
			$this->save;
		}
	}

	function handleUploadSlipGaji(){

		if(request()->hasFile('slip_gaji')){
			$slip_gaji = request()->file('slip_gaji');
			$destination = "file/slip-gaji";
			$randomStr = Str::random(5);
			$filename = $this->id."-".time()."-".$randomStr.".".$slip_gaji->extension();
			$url = $slip_gaji->storeAs($destination, $filename);
			$this->slip_gaji = $url;
			$this->save;
		}
	}

	function handleUploadSIUP(){

		if(request()->hasFile('siup')){
			$siup = request()->file('siup');
			$destination = "file/siup";
			$randomStr = Str::random(5);
			$filename = $this->id."-".time()."-".$randomStr.".".$siup->extension();
			$url = $siup->storeAs($destination, $filename);
			$this->siup = $url;
			$this->save;
		}
	}

	function handleUploadTDP(){

		if(request()->hasFile('tdp')){
			$tdp = request()->file('tdp');
			$destination = "file/tdp";
			$randomStr = Str::random(5);
			$filename = $this->id."-".time()."-".$randomStr.".".$tdp->extension();
			$url = $tdp->storeAs($destination, $filename);
			$this->tdp = $url;
			$this->save;
		}
	}

	function handleUploadAktaPendirian(){

		if(request()->hasFile('akta_pendirian')){
			$akta_pendirian = request()->file('akta_pendirian');
			$destination = "file/akta-pendirian";
			$randomStr = Str::random(5);
			$filename = $this->id."-".time()."-".$randomStr.".".$akta_pendirian->extension();
			$url = $akta_pendirian->storeAs($destination, $filename);
			$this->akta_pendirian = $url;
			$this->save;
		}
	}

	function handleUploadAktaPengesahan(){

		if(request()->hasFile('akta_pengesahan_menteri')){
			$akta_pengesahan = request()->file('akta_pengesahan_menteri');
			$destination = "file/akta-pengesahan";
			$randomStr = Str::random(5);
			$filename = $this->id."-".time()."-".$randomStr.".".$akta_pengesahan->extension();
			$url = $akta_pengesahan->storeAs($destination, $filename);
			$this->akta_pengesahan_menteri = $url;
			$this->save;
		}
	}

	function handleUploadDataKeuangan(){

		if(request()->hasFile('data_keuangan_perusahaan')){
			$data_keuangan = request()->file('data_keuangan_perusahaan');
			$destination = "file/data-keuangan";
			$randomStr = Str::random(5);
			$filename = $this->id."-".time()."-".$randomStr.".".$data_keuangan->extension();
			$url = $data_keuangan->storeAs($destination, $filename);
			$this->data_keuangan_perusahaan = $url;
			$this->save;
		}
	}

	function handleUploadIzinPraktek(){

		if(request()->hasFile('izin_praktek')){
			$izin_praktek = request()->file('izin_praktek');
			$destination = "file/izin-praktek";
			$randomStr = Str::random(5);
			$filename = $this->id."-".time()."-".$randomStr.".".$izin_praktek->extension();
			$url = $izin_praktek->storeAs($destination, $filename);
			$this->izin_praktek = $url;
			$this->save;
		}
	}

	function handleUploadRekeningKoran(){

		if(request()->hasFile('rekening_koran')){
			$rekening_koran = request()->file('rekening_koran');
			$destination = "file/rekening-koran";
			$randomStr = Str::random(5);
			$filename = $this->id."-".time()."-".$randomStr.".".$rekening_koran->extension();
			$url = $rekening_koran->storeAs($destination, $filename);
			$this->rekening_koran = $url;
			$this->save;
		}
	}

	function handleUploadPasFoto(){

		if(request()->hasFile('pas_foto')){
			$pas_foto = request()->file('pas_foto');
			$destination = "file/pas-foto";
			$randomStr = Str::random(5);
			$filename = $this->id."-".time()."-".$randomStr.".".$pas_foto->extension();
			$url = $pas_foto->storeAs($destination, $filename);
			$this->pas_foto = $url;
			$this->save;
		}
	}
	
	function handleDeleteFile(){
		$ktp_pemohon = $this->ktp_pemohon;
		$ktp_suami_istri = $this->ktp_suami_istri;
		$kk = $this->kk;
		$surat_nikah = $this->surat_nikah;
		$npwp = $this->npwp;
		$skp_pegawai = $this->skp_pegawai;
		$slip_gaji = $this->slip_gaji;
		$siup = $this->siup;
		$tdp = $this->tdp;
		$akta_pendirian = $this->akta_pendirian;
		$akta_pengesahan = $this->akta_pengesahan;
		$data_keuangan = $this->data_keuangan;
		$izin_praktek = $this->izin_praktek;
		$rekening_koran = $this->rekening_koran;
		$pas_foto = $this->pas_foto;
		return true;
	}

}