@extends('user.base')
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
                {{-- <a href="" class="btn btn-primary text-white"
                    target="_blank">Lihat Data</a> --}}
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
                    <form action="{{ route('kusioner')}}" class="form-horizontal form-material mx-2" method="get" enctype="multipart/form-data" >
                        @csrf
                        <div class="form-group">
                            <label class="col-md-12">Nama</label>
                            <div class="col-md-12">
                                <input type="text" placeholder="Masukan nama" class="form-control form-control-line" name="nama" id="" value="" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="example-email" class="col-md-12">No Hp</label>
                            <div class="col-md-12">
                                <input type="number" placeholder="No Hp" class="form-control form-control-line" name="nohp" id="" value="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-12">Alamat</label>
                            <div class="col-md-12">
                                <input type="text" placeholder="Alamat" class="form-control form-control-line" name="alamat" id="" value="" >
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-12">Jenis Kelamin</label>
                            <div class="form-group col-sm-12">
                                <label class="radio-inline col-md-6">
                                <input type="radio" id="smt-fld-1-2" value="Laki-laki" name="option">Laki-Laki</label>
                                <label class="radio-inline col-md-6">
                                <input type="radio" id="smt-fld-1-3" value="Perempuan" name="option">Perempuan</label>
                           </div>
                        </div>

                        <div class="form-group">
                            <label for="example-email" class="col-md-12">Tanggal Konsultasi</label>
                            <div class="col-md-12">
                                <input type="date" placeholder="Tulis Nama gejala" class="form-control form-control-line" name="tanggal" id="" value="">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-12">
                                <button class="btn btn-success text-white" type="submit">Lanjutkan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
