<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use App\Models\akun;
use Illuminate\Support\Facades\Session;


class PenggunaController extends Controller
{
    public function mainpengguna(){
        if(!empty(session('id_akun'))){
            $akun = session('id_akun');
            $anggota = DB::select("call carinamaanggota($akun)");
            $nama_anggota = $anggota[0]->nama;
            $role_anggota = $anggota[0]->role_;
            $jumlah_anggota = DB::select("call jumlahanggota()");
            $jumlah_buku = DB::select("CALL JumlahBuku()");
            $jumlah_peminjaman = DB::select("call jumlahpeminjaman()");
            return view('pengguna.homepengguna',['jumlah_buku' => $jumlah_buku,'jumlah_peminjaman' => $jumlah_peminjaman,'jumlah_anggota' => $jumlah_anggota, 'nama_anggota' => $nama_anggota, 'role_anggota' => $role_anggota]);
        }else return redirect('/');
        
    }
    public function pinjambukuform()
    {
        if(!empty(session('id_akun'))){
            return view('pengguna.pinjambuku');
        }else return redirect('/');
        
        
    }
    public function penggunalihatbuku()
    {
        if(!empty(session('id_akun'))){
                // Panggil stored procedure lihatbuku dari database
            $perpus = DB::select('CALL lihatbuku()');

            return view('pengguna.buku', ['perpus' => $perpus]);
        }else return redirect('/');
        
    }
    public function pinjambukuprocess(Request $request)
    {   
        if(!empty(session('id_akun'))){
                $akun = session('id_akun');
            $angka = $request->input('angka');
            $waktu_pinjam = $request->input('waktu_pinjam');
            $kode_eksemplar = $request->input('kode_eksemplar');

            $book_copy_codes = implode(',', $kode_eksemplar);
            $id_anggota = DB::select("call findidanggotabyidakun($akun)");
            $id_anggota_value = $id_anggota[0]->ID_Anggota;
            
            $result = DB::select('CALL pinjambuku(?, ?, ?)', [$id_anggota_value, $book_copy_codes, $waktu_pinjam]);
            
            return redirect('pengguna')->with('status', 'data berhasil ditambahkan');
        }else return redirect('/');
        
        
    }
    public function pengembaliananggota()
    {   
        if(!empty(session('id_akun'))){
                $akun = session('id_akun');
            $id_anggota = DB::select("call findidanggotabyidakun($akun)");
            $id_anggota_value = $id_anggota[0]->ID_Anggota;
            $peminjamandata = DB::select("CALL TampilTransaksianggota($id_anggota_value)");
            return view('pengguna.pengembalianbuku', ['peminjamandata' => $peminjamandata]);
        }else return redirect('/');
    }
    public function pengembaliananggotaparam($id_transaksi)
    {
        if(!empty(session('id_akun'))){
                $anggotaData = DB::table('transaksi')
                ->select('id_transaksi')
                ->where('id_transaksi', '=', $id_transaksi)
                ->first();
            return view('pengguna/formpengembalian', ['id_transaksi' => $id_transaksi]);
        }else return redirect('/');
        
    }
    public function pengembaliananggotaprocess(Request $request)
    {
        if(!empty(session('id_akun'))){
                $request->validate([
                'id_transaksi' => 'required|numeric',
                'waktu_kembali' => 'required|date'
            ]);
            // Retrieve form data
            $id_transaksi = $request->input('id_transaksi');
            $waktu_kembali = $request->input('waktu_kembali');
            $result = DB::select("CALL kembalikan_buku('$id_transaksi','$waktu_kembali')");
            return redirect('pengguna/pengembalian')->with('status', 'Pengembalian Berhasil');
        }else return redirect('/');
        
    }
        public function profile()
    {   
        if(!empty(session('id_akun'))){
        $akun = session('id_akun');
        $id_anggota = DB::select("call findidanggotabyidakun($akun)");
        $id_anggota_value = $id_anggota[0]->ID_Anggota;
        $peminjamandata = DB::select("CALL TampilTransaksiriwayat($id_anggota_value)");
        $profile = DB::select("CALL tampilprofile($id_anggota_value)");

        return view('pengguna.profilepengguna', ['profile' => $profile],['peminjamandata' => $peminjamandata]);
        }else return redirect('/');
        
    }


}
