<?php

namespace App\Http\Controllers;

use App\Models\Perhitungan;
use App\Models\SubPerhitungan;
use App\Models\Kriteria;
use App\Models\Subkriteria;
use App\Models\Nasabah;
use Illuminate\Http\Request;

class PenilaianController extends Controller
{
    function Hasil()
    {
        $perhitungan = Perhitungan::count();
        $subperhitungan = SubPerhitungan::all()->groupBy('id_perhitungan')->count();
        if ($perhitungan == $subperhitungan) {
            $data['list_perhitungan'] = Perhitungan::all();
            $data['list_kriteria'] = Kriteria::all();

            return view('Admin.Penilaian.index', $data);
        }

        return abort(404);
    }

}