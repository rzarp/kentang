<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Quest;
use DB;
use Auth;
use DataTables;


class QuestController extends Controller
{
   
    public function index()
    {
        $data['quest'] = DB::table('quests')->latest()->get();
        return view('admin.quest.viewquest',$data);
    }

    
    public function create()
    {
        return view('admin.quest.quest');
    }

   
    public function store(Request $request)
    {
        $request->validate ([
            'kode'         => 'required',
            'gejala'       => 'required',
        ]);

        DB::table('quests')
        ->insert([
            'kode'         => $request->kode,
            'gejala'       => $request->gejala,
                       
        ]);

        return redirect(route('quest'))->with('pesan','Data Berhasil ditambahkan');
    }

    
    public function show(Request $request)
    {
        if ($request->ajax()) {
            $data = Quest::latest()->get();
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
                        <a href="'.route('quest.edit',['id' => $row->id]).'" class="btn btn-primary btn-action mr-1 edit-confirm" data-toggle="tooltip" title="" data-original-title="Edit" ><i class="fas fa-pencil-alt"></i></a>
                        <a href="'.route('quest.delete',['id' => $row->id]).'" class="btn btn-danger btn-action trigger--fire-modal-2 delete-confirm" data-toggle="tooltip" title=""data-original-title="Delete"><i class="fas fa-trash"></i></a>
                        ';
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('admin.quest.viewquest');
    }


    public function edit($id) {
        $quest = Quest::find($id);
        return view('admin.quest.edit-quest',['quest'=>$quest]);
    }

  
    public function update(Request $request, $id) 
    {
    

        $quest = Quest::find($id);
        $request->validate ([
            'kode'         => 'required',
            'gejala'       => 'required',
        ]);

      
        DB::table('quests')
            ->where('id', $id)
            ->update([
                'kode'         => $request->kode,
                'gejala'       => $request->gejala,   
            ]);

        return redirect(route('quest.edit',$id))->with('pesan','Data Berhasil diupdate');

    }

  
    public function destroy($id)
    {
        $quest = DB::table('quests')->where('id',$id)->first();
        DB::table('quests')->where('id',$id)->delete();
        return redirect(route('show.quest'))->with('pesan','Data Berhasil dihapus!');
    }
}
