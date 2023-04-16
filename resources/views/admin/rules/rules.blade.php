@extends('admin.base')
@section('rules')


<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="page-breadcrumb">
    <div class="row align-items-center">
        <div class="col-6">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 d-flex align-items-center">
                    <li class="breadcrumb-item"><a href="index.html" class="link"><i class="mdi mdi-home-outline fs-4"></i></a></li>
                    <li class="breadcrumb-item active" aria-current="page">Rules</li>
                </ol>
                </nav>
            <h1 class="mb-0 fw-bold">Rules</h1>
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
                    <form action="{{route('knowledge.store')}}" class="form-horizontal form-material mx-2" method="POST" enctype="multipart/form-data" >
                        @csrf

                        <div class="form-group">
                            <label class="col-md-12">Parent</label>
                            <div class="col-md-12">
                                <input type="text" placeholder="Parent" class="form-control form-control-line" name="kode" id="" value="" >
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-12">Quest</label>
                            <div class="col-md-12">
                                <input type="text" placeholder="quest" class="form-control form-control-line" name="kode" id="" value="" >
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-12">Ya Atau Tidak</label>
                            <div class="form-group col-sm-12">
                                <label class="radio-inline col-md-6">
                                <input type="radio" id="smt-fld-1-2" value="ya" name="option">Ya</label>
                                <label class="radio-inline col-md-6">
                                <input type="radio" id="smt-fld-1-3" value="tidak" name="option">Tidak</label>
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

            <div class="row">
                <!-- column -->
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <!-- title -->
                            <div class="d-md-flex">
                                <div>
                                    <h4 class="card-title">Rules</h4>
                                    <h5 class="card-subtitle">Rules</h5>
                                </div>

                            </div>
                            <!-- title -->
                            <div class="table-responsive">
                                <table class="table mb-0 table-hover align-middle text-nowrap">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">No</th>
                                            <th class="border-top-0">Parent</th>
                                            <th class="border-top-0">Pertanyaan</th>
                                            <th class="border-top-0">Ya</th>
                                            <th class="border-top-0">Tidak</th>
                                            <th class="border-top-0">Hipotesa</th>
                                            <th class="border-top-0">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        <tr>
                                            <td>1</td>
                                            <td>
                                                asdlkjaslkdj
                                            </td>
                                            <td>batang layu</td>
                                            <td>daun kuning</td>
                                            <td>daun kering</td>
                                            <td>hama</td>
                                            <td>
                                                <button class="btn btn-danger text-white" type="submit">Hapus</button> |
                                                <button class="btn btn-success text-white" type="submit">Edit</button>
                                            </td>
                                        </tr>
                                       
                                    </tbody>


                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
@endsection
