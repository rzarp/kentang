@extends('user.base')
@section('kusioner')


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
                    {{-- <form action="" class="form-horizontal form-material mx-2" method="get" enctype="multipart/form-data" >
                        @csrf --}}
                        <div class="form-group">
                            <label class="col-md-12" id="question"><h5>Apakah Pasien {{ $quest->gejala }} ? </h5></label>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <div class="row">
                                        <div class="col-10">
                                            <button class="btn btn-success text-white btn-answ" type="button" id="btn_y" value="y">Ya</button>
                                            <button class="btn btn-danger text-white btn-answ" type="button" id="btn_n" value="n">Tidak</button>
                                        </div>
                                        <div class="col-2 justify-content-end">
                                            <button class="right-1 btn btn-warning text-white" type="button" id="kembali">Kembali</button>
                                            <button class="right-1 btn btn-danger text-white" type="button" >Reset</button>
                                        </div>
                                      </div>



                                </div>
                            </div>
                        </div>
                    {{-- </form> --}}
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
<script>
    $(function() {
        btn = $(".btn-answ");
        console.log(btn);

        // Adding event listener to button
        btn.on("click", (e) => {

            // jQuery Ajax Post Request
            $.post("{{ route('kusioner') }}", {
                _token: "{{ csrf_token() }}",
                answer:  e.target.value,
                id: "{{ $quest->id }}"
            }, (response) => {
                // response from PHP back-end
                console.log(response);


            });
        });



        // Kembali
        $('#kembali').on("click", (e) => {
            location.href = "{{ route('reset-kusioner') }}";
        });
    });
</script>
@endpush
@endsection
