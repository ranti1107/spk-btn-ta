<?php

namespace App\Http\Controllers;
use App\Models\Kriteria;
use App\Models\PerhitunganKriteria;
use App\Models\SubPerhitungan;
use Illuminate\Http\Request;


class KriteriaController extends Controller
{
	function BerandaKriteria(){
		$data['list_kriteria'] = Kriteria::orderBy('kode', 'ASC')->get();
		return view('Admin.Kriteria.beranda', $data);
	}

	function CreateKriteria(){
		$kode = Kriteria::max('kode');
		if($kode == null){
			$kode_kriteria = 1;
		} else {
			$kode_kriteria = substr($kode, 1,2)+1;
		}

		$data['kode'] = "C".$kode_kriteria;
		return view('Admin.Kriteria.create', $data);
	}

	function store(Request $request){
		$request->validate(
            [
                'kode' => ($request->id) ? 'required' : 'required|unique:kriteria',
                'nama' => ($request->id) ? 'required' : 'required|unique:kriteria',
            ],
            [
            	'nama.required'=>'Harap isi bidang ini',
            	'nama.unique'=>'Kriteria sudah tersedia',
            ]
        );

			$kriteria = new Kriteria;
			$kriteria-> kode = request('kode');
			$kriteria-> nama = request('nama');
			$kriteria-> jenis = request('jenis');
			$kriteria-> save();

			$perhitungankriteria = new PerhitunganKriteria;
			$perhitungankriteria-> id_kriteria_1 = $kriteria->id;
			$perhitungankriteria-> id_kriteria_2 = $kriteria->id;
			$perhitungankriteria-> skala = 1;
			$perhitungankriteria-> save();

			foreach (Kriteria::where('id', '!=', $kriteria->id)->get() as $item) {
				$perhitungankriteria = new PerhitunganKriteria;
				$perhitungankriteria-> id_kriteria_1 = $kriteria->id;
				$perhitungankriteria-> id_kriteria_2 = $item->id;
				$perhitungankriteria-> skala = 1;
				$perhitungankriteria-> save();

				$perhitungankriteria = new PerhitunganKriteria;
				$perhitungankriteria-> id_kriteria_1 = $item->id;
				$perhitungankriteria-> id_kriteria_2 = $kriteria->id;
				$perhitungankriteria-> skala = 1;
				$perhitungankriteria-> save();
			}

			return redirect ('Admin/kriteria')->with('success', 'Data Kriteria berhasil ditambahkan');

	}

	function edit(Kriteria $kriteria){
		$data['kriteria'] = $kriteria;
		return view('Admin.Kriteria.edit', $data);

	}

	function update(Kriteria $kriteria){
		$kriteria-> kode = request('kode');
		$kriteria-> nama = request('nama');
		$kriteria-> jenis = request('jenis');
		$kriteria-> save();


		return redirect ('Admin/kriteria')-> with ('success', 'Data Kriteria berhasil diedit');

	}

	function destroy(Kriteria $kriteria){
		foreach(
			$kriteria->subkriteria as $subkriteria
		){
			$subkriteria->delete();
		}

		$bobots = SubPerhitungan::where('id_kriteria', $kriteria->id)->get();
		if(!is_null($bobots)){
			foreach(
				$bobots as $bobot
			){
				$bobot->delete();
			}
		}

		$kriteria1 = PerhitunganKriteria::where('id_kriteria_1', $kriteria->id)->get();
		if(!is_null($kriteria1)){
			foreach(
				$kriteria1 as $subkriteria
			){
				$subkriteria->delete();
			}
		}

		$kriteria2 = PerhitunganKriteria::where('id_kriteria_2', $kriteria->id)->get();
		if(!is_null($kriteria2)){
			foreach(
				$kriteria2 as $subkriteria
			){
				$subkriteria->delete();
			}
		}

		$kriteria->delete();

		return redirect ('Admin/kriteria')-> with ('danger', 'Data Kriteria berhasil dihapus');

	}

	function berandaperhitungan(Request $request){
		$data['list_kriteria'] = Kriteria::orderBy('kode', 'ASC')->get();

		return view('Admin.Kriteria.perhitungan', $data);
	}

	function tambahperhitungan(Kriteria $kriteria){
		$data['list_kriteria'] = Kriteria::orderBy('kode', 'ASC')->get();

		$kriteria = PerhitunganKriteria::where('id_kriteria_1', $kriteria1->id)->where('id_kriteria_2', $kriteria->id)->get('skala');
		foreach($kriteria as $k){
			$jumlah_kolom = PerhitunganKriteria::where('id_kriteria_1', $k->id)->sum('skala');
			
			$jumlah = $k/$jumlah_kolom;
		}


		return view('Admin.Kriteria.tambahperhitungan', $data);
	}

	function perhitungan(){
		$check = PerhitunganKriteria::where('id_kriteria_1', request('id_kriteria_1'))->where('id_kriteria_2', request('id_kriteria_2'))->first();
		if($check){
			$check->delete();
		}
		$perhitungankriteria = new PerhitunganKriteria;
		$perhitungankriteria-> id_kriteria_1 = request('id_kriteria_1');
		$perhitungankriteria-> id_kriteria_2 = request('id_kriteria_2');
		$perhitungankriteria-> skala = request('skala');
		$perhitungankriteria-> save();

		$check2 = PerhitunganKriteria::where('id_kriteria_1', request('id_kriteria_2'))->where('id_kriteria_2', request('id_kriteria_1'))->first();
		if($check2){
			$check2->delete();
		}
		$perhitungankriteria = new PerhitunganKriteria;
		$perhitungankriteria-> id_kriteria_1 = request('id_kriteria_2');
		$perhitungankriteria-> id_kriteria_2 = request('id_kriteria_1');
		$perhitungankriteria-> skala = 1/request('skala');
		$perhitungankriteria-> save();


		return redirect ('Admin/perhitungan-kriteria')-> with ('success', 'Skala Kriteria berhasil ditambahkan');

	}

}