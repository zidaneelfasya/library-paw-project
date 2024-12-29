<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use App\Models\akun;
use Illuminate\Support\Facades\Session;


class PerpusController extends Controller
{
    
    public function home(){
        if(!empty(session('id_akun'))){
            $akun = session('id_akun');
            $petugas = DB::select("call carinamapetugas($akun)");
            $nama_petugas = $petugas[0]->nama;
            $role_petugas = $petugas[0]->role_;
            $jumlah_anggota = DB::select("call jumlahanggota()");
            $jumlah_buku = DB::select("CALL JumlahBuku()");
            $jumlah_peminjaman = DB::select("call jumlahpeminjaman()");
            return view('home',['jumlah_buku' => $jumlah_buku,'jumlah_peminjaman' => $jumlah_peminjaman,'jumlah_anggota' => $jumlah_anggota,'nama_petugas' => $nama_petugas,'role_petugas' => $role_petugas]);
        }else return redirect('/');
        
    }
    
}
