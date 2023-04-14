<?php

namespace App\Http\Controllers;

use App\Disease;
use DB;
use Auth;
use DataTables;
use Illuminate\Http\Request;

class DiseaseController extends Controller
{
   
    public function index()
    {
        $data['disease'] = DB::table('diseases')->latest()->get();
        return view('admin.disease.viewdisease',$data);
    }

   
    public function create()
    {
        return view('admin.disease.disease');
    }

   
    public function store(Request $request)
    {
        $request->validate ([
            'kode'           => 'required',
            'penyakit'       => 'required',
            'penyebab'       => 'required',
            'solusi'         => 'required',
        ]);

        DB::table('diseases')
        ->insert([
            'kode'         => $request->kode,
            'penyakit'     => $request->penyakit,
            'penyebab'     => $request->penyebab,
            'solusi'       => $request->solusi,
                       
        ]);

        return redirect(route('disease'))->with('pesan','Data Berhasil ditambahkan');
    }

   
    public function show(Request $request)
    {
        if ($request->ajax()) {
            $data = Disease::latest()->get();
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
                        <a href="'.route('disease.edit',['id' => $row->id]).'" class="btn btn-primary btn-action mr-1 edit-confirm" data-toggle="tooltip" title="" data-original-title="Edit" ><i class="fas fa-pencil-alt"></i></a>
                        <a href="'.route('disease.delete',['id' => $row->id]).'" class="btn btn-danger btn-action trigger--fire-modal-2 delete-confirm" data-toggle="tooltip" title=""data-original-title="Delete"><i class="fas fa-trash"></i></a>
                        ';
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('admin.disease.viewdisease');
    }

   
    public function edit($id) {
        $disease = Disease::find($id);
        return view('admin.disease.edit-disease',['disease'=>$disease]);
    }

  
    public function update(Request $request, $id) 
    {
    

        $disease = Disease::find($id);
        $request->validate ([
            'kode'           => 'required',
            'penyakit'       => 'required',
            'penyebab'       => 'required',
            'solusi'         => 'required',
        ]);

      
        DB::table('diseases')
            ->where('id', $id)
            ->update([
                'kode'         => $request->kode,
                'penyakit'     => $request->penyakit,
                'penyebab'     => $request->penyebab,
                'solusi'       => $request->solusi, 
            ]);

        return redirect(route('disease.edit',$id))->with('pesan','Data Berhasil diupdate');

    }


    
    public function destroy($id)
    {
        $disease = DB::table('diseases')->where('id',$id)->first();
        DB::table('diseases')->where('id',$id)->delete();
        return redirect(route('show.disease'))->with('pesan','Data Berhasil dihapus!');
    }
}
