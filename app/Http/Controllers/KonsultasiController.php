<?php

namespace App\Http\Controllers;
use App\Knowledge;
use App\Quest;
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

    public function kusioner(Request $request)
    {
        if ($request->answer) {
            $q = $request->answer;
            $id = $request->id;

            if ($q == 'y') {

                if (Session::has('rule')) {
                    $rule = Session::get('rule');
                }else{
                    $rule = new Collection();
                }

                $rule->push($id);
                Session::put(['rule' => $rule]);

                $diseases = DB::table('knowledge as k')
                // ->select('penyakit', 'q.kode', 'd.kode as kode_penyakit')
                // ->join('diseases as d', 'k.kode_2', '=', 'd.id')
                // ->join('quests as q', 'k.kode_1', '=', 'q.id')
                ->where('k.kode_1', '=',$id)
                ->orderBy('kode_2')
                ->first();
                // dd($diseases);

                $quest = DB::table('knowledge as k')
                ->select('gejala', 'q.id', 'kode_2')
                ->join('quests as q', 'k.kode_1', '=', 'q.id')
                ->where('k.kode_2', $diseases->kode_2)
                ->where('k.kode_2', '!=',)
                ->get();

                return $quest;

                $knowledge = DB::table('knowledge as k')
                ->select('gejala', 'q.id')
                ->join('quests as q', 'k.kode_1', '=', 'q.id')
                ->where('k.kode_2', '=',$diseases[0]->id)
                ->get();

                $quest = Quest::select('id','kode', 'gejala')
                ->where('id', '=', $id)
                ->orderBy('kode', 'asc')->get();

                return $quest;
            }else {
                return "no";
            }

            return view('user.konsultasi.kusioner1', compact('q'));
        }

        $dataDiri = $request;
        Session::put(['nama' => $dataDiri->nama]);
        Session::put(['nohp' => $dataDiri->nohp]);
        Session::put(['alamat' => $dataDiri->alamat]);
        Session::put(['option' => $dataDiri->option]);
        Session::put(['tanggal' => $dataDiri->tanggal]);

        $quest = Quest::select('id','kode', 'gejala')
        ->orderBy('kode', 'asc')->first();


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
