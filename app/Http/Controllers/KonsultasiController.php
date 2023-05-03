<?php

namespace App\Http\Controllers;
use App\Knowledge;
use App\Quest;
use App\Rule;
use App\Disease;
use App\Report;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Session;
use Auth;

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
        Session::forget('pherap');

        return view('user.konsultasi.konsultasi');
    }

    public function kusioner(Request $request, $ruleId = null, $parent = null, $quest = null)
    {
        if ($quest == 'tidak ada') {
            $hasil = Rule::find($ruleId);
            $pherap = Session::get('pherap');
            $dataDiri = [
                'user_id' => Auth::user()->id,
                'nama' => Session::get('nama'),
                'nohp' => Session::get('nohp'),
                'alamat' => Session::get('alamat'),
                'gender' => Session::get('option'),
                'hasil' => $hasil->hipotesa ? "[".$hasil->d_hipotesa->kode." - ".$hasil->d_hipotesa->penyakit."] ".$hasil->d_hipotesa->penyebab." | ".$hasil->d_hipotesa->solusi : "[".$pherap->kode." - ".$pherap->penyakit."] ".$pherap->penyebab." | ".$pherap->solusi,
                'created_at' => Session::get('tanggal')
            ];
            DB::table('reports')->insert($dataDiri);

            return redirect(route('konsultasi'));
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
        if ($quest->hipotesa) {
            Session::put(['pherap' => $quest->d_hipotesa]);
        }

        return view('user.konsultasi.kusioner1', compact('quest'));
    }

    public function reportByUser($userId)
    {
        if (Auth::user()->id != $userId) abort(403);

        $reports = Report::where('user_id', '=',Auth::user()->id)->get();
        return view('user.konsultasi.report', compact('reports'));
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
