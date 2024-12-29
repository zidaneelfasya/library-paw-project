@extends('main')

@section('title','dashboard')

@section('breadcrumbs')


@endsection

@section('content')
<div class="container-fluid">
    <div class="animated fadeIn">
        @if(session('status'))
            <div class="alert alert-primary" role="alert">
                {{ session('status') }}
            </div>
            @endif
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <strong class="card-title">List Anggota</strong>
                        <a href="{{url('anggota/tambah')}}" class="btn btn-success btn-sm ml-auto">
                            <i class="bi bi-plus"></i>
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">No.</th>
                                    <th scope="col">NIK</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Alamat</th>
                                    <th scope="col">No. Telepon</th>
                                    <th scope="col">Jenis Kelamin</th>
                                    <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($anggotaData as $index => $item)
                                        <tr>
                                        <th scope="row">{{ $index + 1 }}</th>
                                        <td>{{ $item->nik ?: '-' }}</td>
                                        <td>{{ $item->nama ?: '-' }}</td>
                                        <td>{{ $item->email ?: '-' }}</td>
                                        <td>{{ $item->alamat ?: '-' }}</td>
                                        <td>{{ $item->telepon ?: '-' }}</td>
                                        <td>{{ $item->jenis_kelamin ?: '-' }}</td>
                                        <td>
                                            <a href="{{ url('anggota/edit/' . $item->nik) }}" class="btn btn-primary btn-sm">
                                                <i class="ri-edit-line"></i>
                                            </a>
                                            <a href="{{ url('anggota/hapus/' . $item->nik) }}" class="btn btn-danger btn-sm">
                                                <i class="bi bi-trash"></i>
                                            </a>
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

@endsection
