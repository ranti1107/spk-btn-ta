<?php

namespace App\Http\Controllers;
use App\Models\Subkriteria;
use App\Models\PerhitunganSubkriteria;
use App\Models\Kriteria;
use App\Models\SubPerhitungan;
use Illuminate\Http\Request;


class SubKriteriaController extends Controller
{
	function BerandaSubKriteria(Kriteria $kriteria){
		$data['list_kriteria'] = Kriteria::orderBy('kode', 'ASC')->get();
		$data['kriteria'] = $kriteria->kode;
		// $data['list_subkriteria'] = Subkriteria::all();
		return view('Admin.Sub-Kriteria.beranda', $data);
	}

	function createSubKriteria(Kriteria $kriteria){
		$data['kriteria'] = $kriteria;
		return view('Admin.Sub-Kriteria.create', $data);
	}

	function store(Request $request){
		$request->validate(
            [
                'nama' => ($request->id) ? 'required' : 'required|unique:sub_kriteria',
            ],
            [
            	'nama.required'=>'Harap isi bidang ini',
            	'nama.unique'=>'Subkriteria sudah tersedia',
            ]
        );

		$subkriteria = new SubKriteria;
		$subkriteria-> kriteria_id = request('kriteria_id');
		$subkriteria-> nama = request('nama');
		$subkriteria-> bobot = request('bobot');
		$subkriteria-> save();

		$subkriteria_baru = Subkriteria::where('kriteria_id', $subkriteria->kriteria->id)->first();
		$cek_sub1 = PerhitunganSubkriteria::where('id_subkriteria_1', $subkriteria_baru->id)->where('id_subkriteria_2', $subkriteria_baru->id)->first();

		if(empty($cek_sub1)){
			$perhitungansubkriteria = new PerhitunganSubkriteria;
			$perhitungansubkriteria-> id_subkriteria_1 = $subkriteria->id;
			$perhitungansubkriteria-> id_subkriteria_2 = $subkriteria->id;
			$perhitungansubkriteria-> skala = 1;
			$perhitungansubkriteria-> save();
		}else{
			foreach (Subkriteria::where('kriteria_id', $subkriteria->kriteria->id)->get() as $item) {
				$perhitungansubkriteria = new PerhitunganSubkriteria;
				$perhitungansubkriteria-> id_subkriteria_1 = $subkriteria->id;
				$perhitungansubkriteria-> id_subkriteria_2 = $item->id;
				$perhitungansubkriteria-> skala = 1;
				$perhitungansubkriteria-> save();

			}
		}


		return redirect ('Admin/sub-kriteria')->with('success', 'Data Subkriteria berhasil ditambahkan');

	}

	function edit(Subkriteria $subkriteria, Kriteria $kriteria){
		$data['kriteria'] = $kriteria;
		$data['subkriteria'] = $subkriteria;
		return view('Admin.Sub-Kriteria.edit', $data);

	}

	function update(Subkriteria $subkriteria){
		$subkriteria-> nama = request('nama');
		$subkriteria-> bobot = request('bobot');
		$subkriteria-> save();


		return redirect ('Admin/sub-kriteria')-> with ('success', 'Data Subkriteria berhasil diedit');

	}

	function destroy(Subkriteria $subkriteria){

		$subkriteria1 = PerhitunganSubkriteria::where('id_subkriteria_1', $subkriteria->id)->get();

		if(!is_null($subkriteria1)){
		foreach(
			$subkriteria1 as $subkriteria_1
		){
			$subkriteria_1->delete();
		}
		}

		$subkriteria2 = PerhitunganSubkriteria::where('id_subkriteria_2', $subkriteria->id)->get();

		if(!is_null($subkriteria2)){
		foreach(
			$subkriteria2 as $subkriteria_2
		){
			$subkriteria_2->delete();
		}
		}

		$bobots = SubPerhitungan::where('id_subkriteria', $subkriteria->id)->get();
		foreach($bobots as $bobot){
			$bobot->delete();
		}
		$subkriteria->delete();

		return redirect ('Admin/sub-kriteria')-> with ('danger', 'Data Subkriteria berhasil dihapus');

	}

	function berandaperhitungan(Kriteria $kriteria){
		$data['kriteria'] = $kriteria;
		$data['list_subkriteria'] = Subkriteria::where('kriteria_id', $kriteria->id)->get();

		return view('Admin.Sub-Kriteria.perhitungan', $data);
	}

	function perhitungan(){
		$check = PerhitunganSubkriteria::where('id_subkriteria_1', request('id_subkriteria_1'))->where('id_subkriteria_2', request('id_subkriteria_2'))->first();
		if($check){
			$check->delete();
		}
		$perhitungansubkriteria = new PerhitunganSubkriteria;
		$perhitungansubkriteria-> id_subkriteria_1 = request('id_subkriteria_1');
		$perhitungansubkriteria-> id_subkriteria_2 = request('id_subkriteria_2');
		$perhitungansubkriteria-> skala = request('skala');
		$perhitungansubkriteria-> save();

		$check2 = PerhitunganSubkriteria::where('id_subkriteria_1', request('id_subkriteria_2'))->where('id_subkriteria_2', request('id_subkriteria_1'))->first();
		if($check2){
			$check2->delete();
		}
		$perhitungansubkriteria = new PerhitunganSubkriteria;
		$perhitungansubkriteria-> id_subkriteria_1 = request('id_subkriteria_2');
		$perhitungansubkriteria-> id_subkriteria_2 = request('id_subkriteria_1');
		$perhitungansubkriteria-> skala = 1/request('skala');
		$perhitungansubkriteria-> save();


		return redirect()->back()-> with ('success', 'Skala Subkriteria berhasil ditambahkan');

	}
}