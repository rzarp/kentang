<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Quest;
use App\Rule;
use App\Disease;
use App\Report;
use DB;

class RulesController extends Controller
{
    public function index() {
        $rules = Rule::all();

        $parents = Quest::all();
        $pertanyaans = Quest::all();
        $yas = Quest::all();
        $tidaks = Quest::all();
        $penyakits = Disease::all();

        return view('admin.rules.rules', compact('rules','parents','pertanyaans','yas','tidaks', 'penyakits'));
    }

    public function store(Request $request)
    {
        $data = $request->validate ([
            'parent'       => 'nullable|exists:quests,id',
            'quest'       => 'required|exists:quests,id',
            'yes'       => 'nullable|exists:quests,id',
            'no'       => 'nullable|exists:quests,id',
            'hipotesa'       => 'nullable|exists:diseases,id',

        ]);

        DB::table('rules')
        ->insert($data);

        return redirect(route('rules'))->with('pesan','Data Berhasil ditambahkan');

    }

    public function edit($id)
    {

    }

    public function update($id)
    {
        # code...
    }

    public function delete($id)
    {
        # code...
    }

    public function report()
    {
        $reports = Report::all();
        // return $reports;
        return view('admin.report.report', compact('reports'));
    }
}
