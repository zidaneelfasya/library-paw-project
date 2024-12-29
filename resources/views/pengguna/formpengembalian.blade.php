@extends('mainpengguna')

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
                            <strong class="card-title">Pengembalian</strong>
                        </div>
                        <div class="card-body">
                            <!-- Credit Card -->
                            <div id="pay-invoice">
                                <div class="card-body">
                                    <div class="card-title">
                                        <h3 class="text-center">Peminjaman</h3>
                                    </div>
                                    <hr>
                                <form action="{{url('pengguna/pengembalian/process')}}" method="post" novalidate="novalidate">
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
                                        <label for="cc-payment" class="control-label mb-1">ID_TRANSAKSI</label>
                                        @empty($id_transaksi)
                                            <input id="cc-payment" name="id_transaksi" type="text" class="form-control" aria-required="true" aria-invalid="false" value="{{ old('id_transaksi') }}">
                                        @else
                                            <input id="cc-payment" name="id_transaksi" type="text" class="form-control" aria-required="true" aria-invalid="false" value="{{ $id_transaksi }}" readonly>
                                        @endempty
                                    </div>
                                    <div class="form-group">
                                        <label for="inputNIK" class="control-label mb-1">Tanggal kembali</label>
                                        <input id="inputNIK" name="waktu_kembali" type="date" class="form-control" aria-required="true" aria-invalid="false">
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