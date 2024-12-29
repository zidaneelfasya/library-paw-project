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
                            <strong class="card-title">Pinjam Buku</strong>
                        </div>
                        <div class="card-body">
                            <div id="pay-invoice">
                                <div class="card-body">
                                    <div class="card-title">
                                        <h3 class="text-center">Pinjam Buku</h3>
                                    </div>
                                    <hr>
                                    <form id="peminjamanForm" action="{{url('pengguna/pinjambuku/process')}}" method="post" novalidate="novalidate">
                                        @csrf
                                        <div class="form-group">
                                            <label for="inputAngka" class="control-label mb-1">Ingin Meminjam Berapa Buku ?</label>
                                            <input id="inputAngka" name="angka" type="number" class="form-control" aria-required="true" aria-invalid="false"  oninput="generateFormFields(this.value)">
                                        </div>
                                        <div id="additionalFields"></div>
                                        <div class="form-group">
                                            <label for="inputWaktuP" class="control-label mb-1">Tanggal Pinjam</label>
                                            <input id="inputWaktuP" name="waktu_pinjam" type="date" class="form-control" aria-required="true" aria-invalid="false">
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

<script>
    function generateFormFields(count) {
        var additionalFieldsContainer = document.getElementById('additionalFields');
        additionalFieldsContainer.innerHTML = ''; // Clear previous fields

        for (var i = 0; i < count; i++) {
            var inputField = document.createElement('input');
            inputField.type = 'text';
            inputField.name = 'kode_eksemplar[]';
            inputField.className = 'form-control mb-2';
            inputField.placeholder = 'kode eksemplar ' + (i + 1);

            additionalFieldsContainer.appendChild(inputField);
        }
    }
</script>

@endsection