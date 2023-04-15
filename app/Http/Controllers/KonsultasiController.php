<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class KonsultasiController extends Controller
{
   

    
    public function index()
    {
        return view('user.konsultasi.konsultasi');
    }

    public function kusioner()
    {
        return view('user.konsultasi.kusioner');
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
