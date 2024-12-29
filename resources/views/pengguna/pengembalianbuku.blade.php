@extends('mainpengguna')

@section('title','dashboard')

@section('breadcrumbs')


@endsection

@section('content')
<div class="container-fluid">
    @if(session('status'))
            <div class="alert alert-primary" role="alert">
                {{ session('status') }}
            </div>
            @endif
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <strong class="card-title">List Peminjaman</strong>

                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">No.</th>
                                    <th scope="col">ID_TRANSAKSI</th>
                                    <th scope="col">Judul Buku</th>
                                    <th scope="col">Nama peminjam</th>
                                    <th scope="col">Waktu Pinjam</th>
                                    <th scope="col">Waktu Harus Kembali</th>
                                    <th scope="col">Waktu Kembali</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($peminjamandata as $index => $item)
                                    <tr>
                                        <th scope="row">{{ $loop ->iteration }}</th>
                                        <td>{{ $item->id_transaksi ?: '-' }}</td>
                                        <td>{{ $item->judul ?: '-' }}</td>
                                        <td>{{ $item->nama ?: '-' }}</td>
                                        <td>{{ $item->waktu_pinjam ?: '-' }}</td>
                                        <td>{{ $item->waktu_harus_kembali ?: '-' }}</td>
                                        <td>{{ $item->waktu_kembali ?: '-' }}</td>
                                        <td class="text-center">
                                            <a href="{{ url('pengguna/pengembalian/' . $item->id_transaksi) }}" class="btn btn-primary btn-sm">
                                                <i class="bi bi-check-circle"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center">Tidak ada data</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection