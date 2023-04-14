@extends('admin.base')
@section('edit-knowledge')


<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="page-breadcrumb">
    <div class="row align-items-center">
        <div class="col-6">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 d-flex align-items-center">
                    <li class="breadcrumb-item"><a href="index.html" class="link"><i class="mdi mdi-home-outline fs-4"></i></a></li>
                    <li class="breadcrumb-item active" aria-current="page">Pengetahuan</li>
                </ol>
                </nav>
            <h1 class="mb-0 fw-bold">Pengetahuan</h1> 
        </div>
        <div class="col-6">
            <div class="text-end upgrade-btn">
                <a href="{{route('show.knowledge')}}" class="btn btn-primary text-white"
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
                    <form action="{{ route('knowledge.update',['id' => $knowledge->id]) }}" class="form-horizontal form-material mx-2" method="POST" enctype="multipart/form-data" >
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label class="col-sm-12">Gejala</label>
                            <div class="col-sm-12">
                                <select name="kode_1" class="form-control">
                                    <option value="" selected disabled hidden>--Gejala--</option>
                                    @foreach($quests as $quest)
                                        <option value="{{$quest->id}}" {{ (isset($knowledge->kode_1) ? $knowledge->kode_1 : null)==$quest->id ? 'selected' : old('kode_1') }}> {{$quest->kode}} </option>
                                    @endforeach
                                    @error('kode_1')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                     @enderror
                                </select>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-sm-12">Penyakit</label>
                            <div class="col-sm-12">
                                <select name="kode_2" class="form-control">
                                    <option value="" selected disabled hidden>--Penyakit--</option>
                                    @foreach($diseases as $disease)
                                        <option value="{{$disease->id}}" {{ (isset($knowledge->kode_2) ? $knowledge->kode_2 : null)==$disease->id ? 'selected' : old('kode_2') }}> {{$disease->kode}} </option>
                                    @endforeach
                                    @error('kode_2')
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