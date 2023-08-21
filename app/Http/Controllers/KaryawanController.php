<?php

namespace App\Http\Controllers;
use App\Models\Perhitungan;
use App\Models\Subkriteria;
use App\Models\Nasabah;

class KaryawanController extends Controller
{
	function Beranda(){
		$data['list_perhitungan'] = Perhitungan::all();
		$data['list_nasabah'] = Nasabah::all();
		return view('Karyawan.beranda', $data);
	}
}