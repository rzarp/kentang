@extends('admin.base')
@section('report')


<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="page-breadcrumb">
    <div class="row align-items-center">
        <div class="col-6">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 d-flex align-items-center">
                    <li class="breadcrumb-item"><a href="index.html" class="link"><i class="mdi mdi-home-outline fs-4"></i></a></li>
                    <li class="breadcrumb-item active" aria-current="page">Report</li>
                </ol>
                </nav>
            <h1 class="mb-0 fw-bold">Report</h1>
        </div>
        {{-- <div class="col-6">
            <div class="text-end upgrade-btn">
                <a href="" class="btn btn-primary text-white"
                    target="_blank">Lihat Data</a>
            </div>
        </div> --}}
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

           

            <div class="row">
                <!-- column -->
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <!-- title -->
                            <div class="d-md-flex">
                                <div>
                                    <h4 class="card-title">laporan</h4>
                                </div>

                            </div>
                            <!-- title -->
                            <div class="table-responsive">
                                <table class="table mb-0 table-hover align-middle text-nowrap">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">No</th>
                                            <th class="border-top-0">Nama</th>
                                            <th class="border-top-0">No Hp</th>
                                            <th class="border-top-0">Jenis Kelamin</th>
                                            <th class="border-top-0">Alamat</th>
                                            <th class="border-top-0">Tgl konsultasi</th>
                                            <th class="border-top-0">Hasil konsultasi</th>
                                            <th class="border-top-0">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       

                                        <tr>
                                            <td>1</td>
                                            <td>ferdian</td>
                                            <td>0231321</td>
                                            <td>Laki-Laki</td>
                                            <td>Depok</td>
                                            <td>8-9-2023</td>
                                            <td>gudd</td>
                                           
                                            <td>
                                                <button class="btn btn-danger text-white" type="submit">Hapus</button>
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
