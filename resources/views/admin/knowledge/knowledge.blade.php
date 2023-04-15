@extends('admin.base')
@section('knowledge')


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
                    <form action="{{route('knowledge.store')}}" class="form-horizontal form-material mx-2" method="POST" enctype="multipart/form-data" >
                        @csrf

                        <div class="form-group">
                            <label class="col-sm-12">Penyakit</label>
                            <div class="col-sm-12">
                                <select name="kode_2" class="form-control">
                                    <option value="" selected disabled hidden>--Penyakit--</option>
                                    @foreach($diseases as $disease)
                                        <option value="{{$disease->id}}" {{old('kode_2')==$disease->id ? 'selected':''}}>{{$disease->kode}}</option>
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
                            <label class="col-sm-12">Gejala</label>
                            <div class="col-sm-12">
                                <select name="kode_1" class="select form-control">
                                    <option value="" selected disabled hidden>--Gejala--</option>
                                    @foreach($quests as $quest)
                                        <option value="{{$quest->id}}" {{old('kode_1')==$quest->id ? 'selected':''}}>{{$quest->kode}}</option>
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
                                    <h4 class="card-title">Pengetahuan</h4>
                                    <h5 class="card-subtitle">Rules</h5>
                                </div>

                            </div>
                            <!-- title -->
                            <div class="table-responsive">
                                <table class="table mb-0 table-hover align-middle text-nowrap">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">No</th>
                                            <th class="border-top-0">Jika</th>
                                            <th class="border-top-0">Maka</th>
                                            <th class="border-top-0">Penyebab</th>
                                            <th class="border-top-0">Solusi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($rule as $rule)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                @foreach ($rule['gejala'] as $gejala)
                                                    @if ($loop->first)
                                                    <span class="badge badge-primary mb-1">JIKA</span>
                                                        {{-- {{'Jika'}} --}}
                                                    @endif
                                                    {{ $gejala }}
                                                    <br>
                                                    @if (!$loop->last)
                                                    <span class="badge badge-warning mb-1">DAN</span>
                                                        {{-- {{'Dan'}} --}}
                                                    @endif
                                                @endforeach
                                            </td>
                                            <td>{{ $rule['penyakit'] }}</td>
                                            <td>{{ $rule['penyebab'] }}</td>
                                            <td>{{ $rule['solusi'] }}</td>
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
