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
                            <strong class="card-title">Identitas Anggota</strong>
                        </div>
                        <div class="card-body">
                            <div id="pay-invoice">
                                <div class="card-body">
                                    <div class="card-title">
                                        <h3 class="text-center">Edit Anggota</h3>
                                    </div>
                                    <hr>
                                    <form action="{{url('anggota/edit/process')}}" method="post" novalidate="novalidate">
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
                                        <label for="cc-payment" class="control-label mb-1">NIK</label>
                                        @empty($nik)
                                            <input id="cc-payment" name="NIK" type="text" class="form-control" aria-required="true" aria-invalid="false" value="{{ old('NIK') }}">
                                        @else
                                            <input id="cc-payment" name="NIK" type="text" class="form-control" aria-required="true" aria-invalid="false" value="{{ $nik }}" readonly>
                                        @endempty
                                    </div>
                                    <div class="form-group has-success">
                                        <label for="inputNama" class="control-label mb-1">Nama</label>
                                        <input id="inputNama" name="nama" type="text" class="form-control cc-name valid" data-val="true" data-val-required="Please enter the name on card" autocomplete="cc-name" aria-required="true" aria-invalid="false" aria-describedby="cc-name-error">
                                        <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail" class="control-label mb-1">Email</label>
                                        <input id="inputEmail" name="email" type="tel" class="form-control cc-number identified visa" value="" data-val="true" data-val-required="Please enter the card number" data-val-cc-number="Please enter a valid card number" autocomplete="cc-number">
                                        <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputAlamat" class="control-label mb-1">Alamat</label>
                                        <input id="inputAlamat" name="alamat" type="tel" class="form-control cc-number identified visa" value="" data-val="true" data-val-required="Please enter the card number" data-val-cc-number="Please enter a valid card number" autocomplete="cc-number">
                                        <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputTelepon" class="control-label mb-1">No. Telpon</label>
                                        <input id="inputTelepon" name="telepon" type="tel" class="form-control cc-number identified visa" value="" data-val="true" data-val-required="Please enter the card number" data-val-cc-number="Please enter a valid card number" autocomplete="cc-number">
                                        <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="select" class=" form-control-label">Jenis Kelamin</label></div>
                                        <div class="col-12 col-md-9">
                                            <select name="jenisKelamin" id="select" class="form-control">
                                                <option value="laki-laki">Laki-Laki</option>
                                                <option value="perempuan">Perempuan</option>
                                            </select>
                                        </div>
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
