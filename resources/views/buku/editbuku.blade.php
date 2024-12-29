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
                            <strong class="card-title">Identitas Buku</strong>
                        </div>
                        <div class="card-body">
                            <div id="pay-invoice">
                                <div class="card-body">
                                    <div class="card-title">
                                        <h3 class="text-center">Edit Buku</h3>
                                    </div>
                                    <hr>
                                    <form action="{{url('buku/edit/process')}}" method="post" novalidate="novalidate">
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
                                        <label for="cc-payment" class="control-label mb-1">Kode Eksemplar</label>
                                        @empty($kode_eksemplar)
                                            <input id="inputKode" name="kode_eksemplar" type="text" class="form-control" aria-required="true" aria-invalid="false" value="{{ old('cc-payment') }}">
                                        @else
                                            <input id="inputKode" name="kode_eksemplar" type="text" class="form-control" aria-required="true" aria-invalid="false" value="{{ $kode_eksemplar }}" readonly>
                                        @endempty
                                    </div>
                                        <div class="form-group has-success">
                                            <label for="inputJudul" class="control-label mb-1">Judul Buku</label>
                                            <input id="inputJudul" name="judul" type="text" class="form-control cc-name valid" data-val="true" data-val-required="Please enter the name on card" autocomplete="cc-name" aria-required="true" aria-invalid="false" aria-describedby="cc-name-error">
                                            <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputPenerbit" class="control-label mb-1">Penerbit</label>
                                            <input id="inputPenerbit" name="penerbit" type="tel" class="form-control cc-name valid" data-val="true" data-val-required="Masukkan penerbit" data-val-cc-number="Please enter a valid card number" autocomplete="cc-number">
                                            <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputPengarang" class="control-label mb-1">Nama Pengarang</label>
                                            <input id="inputPengarang" name="pengarang" type="tel" class="form-control cc-number identified visa" value="" data-val="true" data-val-required="Masukkan Pengarang" data-val-cc-number="Please enter a valid card number" autocomplete="cc-number">
                                            <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputJumlah" class="control-label mb-1">Jumlah</label>
                                            <input id="inputJumlah" name="Jumlah" type="tel" class="form-control cc-number identified visa" value="" data-val="true" data-val-required="Masukkan Jumlah" data-val-cc-number="Please enter a valid card number" autocomplete="cc-number">
                                            <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
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
