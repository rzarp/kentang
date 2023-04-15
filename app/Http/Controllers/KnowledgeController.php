<?php

namespace App\Http\Controllers;

use App\Knowledge;
use App\Quest;
use App\Disease;
use DB;
use Auth;
use DataTables;
use Illuminate\Http\Request;

class KnowledgeController extends Controller
{

    public function index()
    {
        $dd = Knowledge::with('kode1','kode2')
        ->groupBy('kode2')
        ->get();

        return "asddasd";


        $data['knowledge'] = DB::table('knowledge')->latest()->get();
        return view('admin.disease.viewknowledge',$data);
    }


    public function create()
    {
        $diseases = Disease::select('id', 'penyakit', 'penyebab', 'solusi')->get();
        $rule = [];
        foreach ($diseases as $d) {
            $knl = DB::table('knowledge as k')
            ->select('gejala')
            ->join('quests as q', 'k.kode_1', '=', 'q.id')
            ->where('k.kode_2', '=',$d->id)
            ->get();

            $tmp['penyakit'] = $d->penyakit;
            $tmp['penyebab'] = $d->penyebab;
            $tmp['solusi'] = $d->solusi;
            $tmp['gejala'] = [];

            foreach ($knl as $v) {
                array_push($tmp['gejala'], $v->gejala);
            }

            array_push($rule, $tmp);
        }
        // return $rule;


        $knowledge = Knowledge::with('kode1','kode2')->get();

        $quests = Quest::all();
        $diseases = Disease::all();
        return view('admin.knowledge.knowledge',compact('quests','diseases', 'knowledge', 'rule'));

    }


    public function store(Request $request)
    {

        // dd($request);
        $request->validate ([
            'kode_1'       => 'required',
            'kode_2'       => 'required',

        ]);

        DB::table('knowledge')
        ->insert([
            'kode_1'         => $request->kode_1,
            'kode_2'         => $request->kode_2,
        ]);

        return redirect(route('knowledge'))->with('pesan','Data Berhasil ditambahkan');
    }


    public function show(Request $request)
    {
        if ($request->ajax()) {
            $data = Knowledge::with('kode1','kode2')
            ->get();
            $data2 = DB::table('diseases as d')
                    ->select('gejala', 'penyakit')
                    ->leftJoin('knowledge as k', 'k.kode_2', '=', 'd.id')
                    ->leftJoin('quests as q', 'k.kode_1', '=', 'q.id')
                    ->get();


            return Datatables::of($data)
                    ->editColumn('created_at', function ($user) {
                        return [
                        'display' => e($user->created_at->format('d/m/Y H:i:s')),
                        'timestamp' => $user->created_at->timestamp
                        ];
                    })
                    ->editColumn('updated_at', function ($user) {
                        return [
                        'display' => ($user->updated_at->format('d/m/Y H:i:s')),
                        'timestamp' => $user->updated_at->timestamp
                        ];
                    })
                    ->addIndexColumn()
                    ->addColumn('action', function($row)
                    {

                        $btn =
                        '
                        <a href="'.route('knowledge.edit',['id' => $row->id]).'" class="btn btn-primary btn-action mr-1 edit-confirm" data-toggle="tooltip" title="" data-original-title="Edit" ><i class="fas fa-pencil-alt"></i></a>
                        <a href="'.route('knowledge.delete',['id' => $row->id]).'" class="btn btn-danger btn-action trigger--fire-modal-2 delete-confirm" data-toggle="tooltip" title=""data-original-title="Delete"><i class="fas fa-trash"></i></a>
                        ';
                        return $btn;
                    })

                    ->addColumn('kode1', function($row)
                    {
                        return '['.$row->kode1->kode.'] '.$row->kode1->gejala ;
                    })
                    ->addColumn('kode2', function($row)
                    {
                        return '['.$row->kode2->kode.'] '.$row->kode2->penyakit ;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('admin.knowledge.viewknowledge');
    }


    public function edit($id) {
        $quests = Quest::all();
        $diseases = Disease::all();
        $knowledge = Knowledge::find($id);
        return view('admin.knowledge.edit-knowledge',compact('quests', 'diseases','knowledge'));
    }


    public function update(Request $request, $id)
    {
        $knowledge = Knowledge::find($id);
        $request->validate ([
            'kode_1'       => 'required',
            'kode_2'       => 'required',

        ]);

        DB::table('knowledge')
        ->where('id', $id)
        ->update([
            'kode_1'         => $request->kode_1,
            'kode_2'         => $request->kode_2,
        ]);

        return redirect(route('knowledge.edit',$id))->with('pesan','Data Berhasil diupdate');
    }


    public function destroy($id)
    {



        DB::table('knowledge')->where('id',$id)->delete();

        return redirect(route('show.knowledge'))->with('pesan','Data Berhasil dihapus!');
    }
}
