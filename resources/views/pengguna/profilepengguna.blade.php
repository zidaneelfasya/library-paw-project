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
                            <strong class="card-title">Profile</strong>
                        </div>
                        <div class="card-body">
                            <div id="pay-invoice">
                                <div class="card-body">
                                    <div class="card-title">
                                        <h3 class="text-center">Anggota</h3>
                                    </div>
                                    <form method="post" action="">
                                        @csrf <!-- Token CSRF untuk keamanan -->
                                        
                                        <div class="form-group">
                                            <label for="inputNIK" class="control-label mb-1">NIK</label>
                                            <input id="inputNIK" name="NIK" type="text" class="form-control" value="{{ $profile[0]->nik }}" readonly>
                                        </div>
                                    
                                        <div class="form-group has-success">
                                            <label for="inputNama" class="control-label mb-1">Nama</label>
                                            <input id="inputNama" name="nama" type="text" class="form-control" value="{{ $profile[0]->nama }}" readonly>
                                        </div>
                                    
                                        <div class="form-group">
                                            <label for="inputEmail" class="control-label mb-1">Email</label>
                                            <input id="inputEmail" name="email" type="email" class="form-control" value="{{ $profile[0]->email }}" readonly>
                                        </div>
                                    
                                        <div class="form-group">
                                            <label for="inputAlamat" class="control-label mb-1">Alamat</label>
                                            <input id="inputAlamat" name="alamat" type="text" class="form-control" value="{{ $profile[0]->alamat }}" readonly>
                                        </div>
                                    
                                        <div class="form-group">
                                            <label for="inputTelepon" class="control-label mb-1">No. Telpon</label>
                                            <input id="inputTelepon" name="telepon" type="tel" class="form-control" value="{{ $profile[0]->telepon }}" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputjeniskelamin" class="control-label mb-1">No. Telpon</label>
                                            <input id="inputjeniskelamin" name="jeniskelamin" type="tel" class="form-control" value="{{ $profile[0]->jenis_kelamin }}" readonly>
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
                        <table class="table table-bordered table-hover text-center">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">No.</th>
                                    <th scope="col">ID_TRANSAKSI</th>
                                    <th scope="col">Judul Buku</th>
                                    <th scope="col">Nama peminjam</th>
                                    <th scope="col">Waktu Pinjam</th>
                                    <th scope="col">Waktu Harus Kembali</th>
                                    <th scope="col">Waktu Kembali</th>
                                    <th scope="col">Status</th>
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
                                        <td>
                                            @if ($item->waktu_kembali == null)
                                            <div class="alert alert-danger bg-danger text-light border-0">
                                                Dipinjam
                                              </div>
                                            @else
                                            <div class="alert alert-success text-center bg-success text-light border-0">
                                                Selesai
                                              </div>
                                            @endif
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
