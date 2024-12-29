@extends('main')

@section('title','dashboard')

@section('breadcrumbs')


@endsection

@section('content')
<div class="container-fluid">
    <div class="content mt-3">
        <div class="animated fadeIn">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Hapus Buku</strong>
                        </div>
                        <div class="card-body">
                            <!-- Credit Card -->
                            <div id="pay-invoice">
                                <div class="card-body">
                                    <div class="card-title">
                                        <h3 class="text-center">Hapus Buku</h3>
                                    </div>
                                    <hr>
                                    <form action="{{url('buku/hapus/process')}}" method="post" novalidate="novalidate" onsubmit="return confirm('Yakin Mengahapus')">
                                        @csrf
                                    <div class="form-group text-center">
                                        <ul class="list-inline">
                                            <li class="list-inline-item"><i class="text-muted fa fa-cc-visa fa-2x"></i></li>
                                            <li class="list-inline-item"><i class="fa fa-cc-mastercard fa-2x"></i></li>
                                            <li class="list-inline-item"><i class="fa fa-cc-amex fa-2x"></i></li>
                                            <li class="list-inline-item"><i class="fa fa-cc-discover fa-2x"></i></li>
                                        </ul>
                                    </div>
                                    <div class="form-group">
                                        <label for="cc-payment" class="control-label mb-1">Kode Eksemplar/judul</label>
                                        @empty($kode_eksemplar)
                                            <input id="inputKode" name="kode_eksemplar" type="text" class="form-control" aria-required="true" aria-invalid="false" value="{{ old('cc-payment') }}">
                                        @else
                                            <input id="inputKode" name="kode_eksemplar" type="text" class="form-control" aria-required="true" aria-invalid="false" value="{{ $kode_eksemplar }}" readonly>
                                        @endempty
                                    </div>
                                        
                                        
                                    <div>
                                        <label class="col-sm-2 col-form-label"></label>
                                        <div class="col-sm-10">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
