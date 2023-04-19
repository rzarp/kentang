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
                    <form action="{{route('rules.store')}}" class="form-horizontal form-material mx-2" method="POST" enctype="multipart/form-data" >
                        @csrf

                        <div class="form-group">
                            <label class="col-md-12">Parent</label>
                            <div class="col-md-12">
                                <select name="parent" class="form-control">
                                    <option value="" selected>--Parent--</option>
                                    @foreach($parents as $parent)
                                        <option value="{{$parent->id}}"> {{$parent->kode}} </option>
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
                            <label class="col-md-12">Pertanyaan</label>
                            <div class="col-md-12">
                                <select name="quest" class="form-control">
                                    <option value="" selected disabled hidden>--Pertanyaan--</option>
                                    @foreach($pertanyaans as $pertanyaan)
                                        <option value="{{$pertanyaan->id}}"> {{$pertanyaan->kode}} </option>
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
                            <label class="col-md-12">Ya ?</label>
                            <div class="col-md-12">
                                <select name="yes" class="form-control">
                                    <option value="" selected>--Ya ?--</option>
                                    @foreach($yas as $ya)
                                        <option value="{{$ya->id}}"> {{$ya->kode}} </option>
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
                            <label class="col-md-12">Tidak ?</label>
                            <div class="col-md-12">
                                <select name="no" class="form-control">
                                    <option value="" selected>--Tidak ?--</option>
                                    @foreach($tidaks as $tidak)
                                        <option value="{{$tidak->id}}"> {{$tidak->kode}} </option>
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
                            <label class="col-md-12">Hipotesa</label>
                            <div class="col-md-12">
                                <input type="text" placeholder="hipotesa" class="form-control form-control-line" name="hipotesa" id="" value="" >
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
                                        @foreach ($rules as $rule)

                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>
                                                {{(isset($rule->q_parent) ? $rule->q_parent->kode." - ".$rule->q_parent->gejala : "-")}}
                                            </td>
                                            <td>
                                                {{(isset($rule->q_quest) ? $rule->q_quest->kode." - ".$rule->q_quest->gejala : "-")}}
                                            </td>
                                            <td>
                                                {{(isset($rule->q_yes) ? $rule->q_yes->kode." - ".$rule->q_yes->gejala : "-")}}
                                            </td>
                                            <td>
                                                {{(isset($rule->q_no) ? $rule->q_no->kode." - ".$rule->q_no->gejala : "-")}}
                                            </td>
                                            <td>
                                                {{(isset($rule->hipotesa) ? $rule->hipotesa : "-")}}
                                            </td>
                                            <td>
                                                <button class="btn btn-danger text-white" type="submit">Hapus</button> |
                                                <button class="btn btn-success text-white" type="submit">Edit</button>
                                            </td>
                                        </tr>
                                        @endforeach


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
