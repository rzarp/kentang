<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Quest;
use App\Rule;
use DB;

class RulesController extends Controller
{
    public function index() {
        $rules = Rule::all();

        $parents = Quest::all();
        $pertanyaans = Quest::all();
        $yas = Quest::all();
        $tidaks = Quest::all();

        return view('admin.rules.rules', compact('rules','parents','pertanyaans','yas','tidaks'));
    }

    public function store(Request $request)
    {
        $data = $request->validate ([
            'parent'       => 'nullable|exists:quests,id',
            'quest'       => 'required|exists:quests,id',
            'yes'       => 'nullable|exists:quests,id',
            'no'       => 'nullable|exists:quests,id',
            'hipotesa'       => 'nullable',

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
}
