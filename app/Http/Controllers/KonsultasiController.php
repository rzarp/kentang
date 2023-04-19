<?php

namespace App\Http\Controllers;
use App\Knowledge;
use App\Quest;
use App\Rule;
use App\Disease;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Session;

class KonsultasiController extends Controller
{



    public function index()
    {
        return view('user.konsultasi.konsultasi');
    }

    public function resetKuis()
    {
        Session::forget('rule');
        Session::forget('nama');
        Session::forget('nohp');
        Session::forget('alamat');
        Session::forget('option');
        Session::forget('tanggal');

        return view('user.konsultasi.konsultasi');
    }

    public function kusioner(Request $request, $ruleId = null, $parent = null, $quest = null)
    {
        if ($quest == 'tidak ada') {
            $hasil = Rule::find($ruleId);
            return $hasil;
        }

        $nextQuestion = Rule::where('parent', '=', $parent)
                        ->where('quest', '=', $quest)
                        ->first();

        if ($nextQuestion) {
            $quest = $nextQuestion;
        }else{
            $dataDiri = $request;
            Session::put(['nama' => $dataDiri->nama]);
            Session::put(['nohp' => $dataDiri->nohp]);
            Session::put(['alamat' => $dataDiri->alamat]);
            Session::put(['option' => $dataDiri->option]);
            Session::put(['tanggal' => $dataDiri->tanggal]);

            $quest = Rule::where('parent','=', null)->first();
        }


        return view('user.konsultasi.kusioner1', compact('quest'));
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
