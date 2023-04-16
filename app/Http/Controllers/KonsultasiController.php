<?php

namespace App\Http\Controllers;
use App\Knowledge;
use App\Quest;
use App\Disease;
use DB;
use Illuminate\Http\Request;

class KonsultasiController extends Controller
{



    public function index()
    {
        return view('user.konsultasi.konsultasi');
    }

    public function kusioner(Request $request)
    {
        if ($request->answer) {
            $q = $request->answer;
            if ($q == 'y') {
                return $request;
            }else {
                return $request;
            }

            return view('user.konsultasi.kusioner1', compact('q'));
        }

        $dataDiri = $request;
        session(['dataDiri' => $dataDiri]);

        $quest = Quest::select('id','kode', 'gejala')
        ->orderBy('kode', 'asc')->first();

        return $dataDiri;

        return view('user.konsultasi.kusioner1', compact('quest', 'dataDiri'));
    }


    public function create()
    {

    }

    public function store(Request $request)
    {


    }

    public function show(Konsultasi $konsultasi)
    {
        //
    }

    public function edit(Konsultasi $konsultasi)
    {
        //
    }


    public function update(Request $request, Konsultasi $konsultasi)
    {
        //
    }

    public function destroy(Konsultasi $konsultasi)
    {
        //
    }
}
