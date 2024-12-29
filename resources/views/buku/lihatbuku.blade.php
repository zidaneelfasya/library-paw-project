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
                        <strong class="card-title">List Buku</strong>
                        <a href="{{ url('buku/tambah/')}}" class="btn btn-success btn-sm ml-auto">
                            <i class="bi bi-plus"></i>
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">No.</th>
                                        <th scope="col">Kode Eksemplar</th>
                                        <th scope="col">Judul Buku</th>
                                        <th scope="col">Penerbit</th>
                                        <th scope="col">Pengarang</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($perpus as $index => $item)
                                        <tr>
                                            <th scope="row">{{ $index + 1 }}</th>
                                            <td>{{ $item->kode_eksemplar }}</td>
                                            <td>{{ $item->judul }}</td>
                                            <td>{{ $item->penerbit }}</td>
                                            <td>{{ $item->pengarang }}</td>
                                            <td class="text-center">
                                                <a href="{{ url('buku/edit/' . $item->kode_eksemplar) }}" class="btn btn-primary btn-sm">
                                                    <i class="ri-edit-line"></i>
                                                </a>
                                                <a href="{{ url('buku/hapus/' . $item->kode_eksemplar) }}" class="btn btn-danger btn-sm">
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
