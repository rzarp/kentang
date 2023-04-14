<?php

namespace App\Http\Controllers;

use App\Konsultasi;
use App\Quest;
use App\Disease;
use DB;
use Illuminate\Http\Request;

class KonsultasiController extends Controller
{
   

    
    public function index()
    {
        $data['konsultasi'] = DB::table('konsultasis')->latest()->get();
        return view('admin.konsultasi.viewkonsultasi',$data);
    }

   
    public function create()
    {
        $pertanyaan = DB::table('quests')->get();
        $jawaban = DB::table('diseases')->get();
        $option = DB::table('konsultasis')->get();
        return view('admin.konsultasi.konsultasi',compact('pertanyaan','jawaban','option'));  
    }

    public function store(Request $request)
    {

        // dd($request);
        $request->validate ([
            'gejala'       => 'required',
            'option'       => 'required',
            'penyakit'     => 'required',
            
        ]);

        DB::table('konsultasis')
        ->insert([
            'gejala'         => $request->gejala,
            'option'         => $request->option,
            'penyakit'       => $request->penyakit,
        ]);

        return redirect(route('konsultasi'))->with('pesan','Data Berhasil ditambahkan');
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
