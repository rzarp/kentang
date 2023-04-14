@extends('admin.base')
@section('disease')


<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="page-breadcrumb">
    <div class="row align-items-center">
        <div class="col-6">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 d-flex align-items-center">
                    <li class="breadcrumb-item"><a href="index.html" class="link"><i class="mdi mdi-home-outline fs-4"></i></a></li>
                    <li class="breadcrumb-item active" aria-current="page">Penyakit</li>
                </ol>
                </nav>
            <h1 class="mb-0 fw-bold">Penyakit</h1> 
        </div>
        <div class="col-6">
            <div class="text-end upgrade-btn">
                <a href="{{route('show.disease')}}" class="btn btn-primary text-white"
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
                    <form action="{{ route('disease.store') }}" class="form-horizontal form-material mx-2" method="POST" enctype="multipart/form-data" >
                        @csrf
                        <div class="form-group">
                            <label class="col-md-12">Kode</label>
                            <div class="col-md-12">
                                <input type="text" placeholder="Kode" class="form-control form-control-line" name="kode" id="" value="" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Nama Penyakit</label>
                            <div class="col-md-12">
                                <input type="text" placeholder="Nama Penyakit" class="form-control form-control-line" name="penyakit" id="" value="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-12">Penyebab</label>
                            <div class="col-md-12">
                                <textarea rows="5" name="penyebab" class="form-control form-control-line"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-12">Solusi</label>
                            <div class="col-md-12">
                                <textarea rows="5" name="solusi" class="form-control form-control-line"></textarea>
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