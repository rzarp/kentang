@extends('admin.base')
@section('konsultasi')


<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="page-breadcrumb">
    <div class="row align-items-center">
        <div class="col-6">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 d-flex align-items-center">
                    <li class="breadcrumb-item"><a href="index.html" class="link"><i class="mdi mdi-home-outline fs-4"></i></a></li>
                    <li class="breadcrumb-item active" aria-current="page">Konsultasi</li>
                </ol>
                </nav>
            <h1 class="mb-0 fw-bold">Konsultasi</h1> 
        </div>
        <div class="col-6">
            <div class="text-end upgrade-btn">
                <a href="" class="btn btn-primary text-white"
                    target="_blank">Lihat Data</a>
            </div>
        </div>
    </div>
</div>



<div class="container-fluid">
   
    <div class="row">
      
        <div class="col-lg-12 col-xlg-3 col-md-12">

            @if (session()->has('pesan'))
                <div class="alert alert-success alert-dismissible show fade">
                <div class="alert-body">
                    <button class="close" data-dismiss="alert">
                        <span>×</span>
                    </button>
                    {{ session()->get('pesan') }}
                </div>
                </div>
            @endif

            <div class="card">
                <div class="card-body">
                    <form action="{{route('konsultasi.store')}}" class="form-horizontal form-material mx-2" method="POST" enctype="multipart/form-data" >
                        @csrf
                        <div class="form-group">
                            <label class="col-sm-12">Pertanyaan</label>
                            <div class="col-sm-12">
                                <select name="gejala" class="form-control">
                                    <option value="" selected disabled hidden>--Pertanyaan--</option>
                                    @foreach($pertanyaan as $p)
                                        <option value="{{$p->id}}" {{old('gejala')==$p->id ? 'selected':''}}>{{$p->gejala}}</option>
                                    @endforeach
                                    @error('gejala')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                     @enderror
                                </select>
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-sm-12">Option</label>
                            <div class="form-group col-sm-12">
                                <label class="radio-inline">
                                <input type="radio" id="smt-fld-1-2" value="Ya" name="option">Ya</label>
                               <label class="radio-inline">
                               <input type="radio" id="smt-fld-1-3" value="Tidak" name="option">Tidak</label>
                           </div>
                        </div>


                        <div class="form-group">
                            <label class="col-sm-12">Jawaban</label>
                            <div class="col-sm-12">
                                <select name="penyakit" class="form-control">
                                    <option value="" selected disabled hidden>--jawaban--</option>
                                    @foreach($jawaban as $j)
                                        <option value="{{$j->id}}" {{old('penyakit')==$j->id ? 'selected':''}}>{{$j->penyakit}}</option>
                                    @endforeach
                                    @error('penyakit')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                     @enderror
                                </select>
                            </div>
                        </div>
                        
                        

                        <div class="form-group">
                            <div class="col-sm-12">
                                <button class="btn btn-success text-white" type="submit">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection