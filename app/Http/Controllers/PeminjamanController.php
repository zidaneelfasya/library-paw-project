<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use App\Models\akun;
use Illuminate\Support\Facades\Session;


class PeminjamanController extends Controller
{

    public function peminjaman()
    {   
        if(!empty(session('id_akun'))){
            $peminjamandata = DB::select("CALL TampilTransaksi()");
            return view('peminjaman.lihatpeminjaman', ['peminjamandata' => $peminjamandata]);
        }else return redirect('/');

    }
    public function tambahpeminjaman()
    {
        if(!empty(session('id_akun'))){
            return view('peminjaman.tambahpeminjaman');
        }else return view('login');
        
    }
    public function hapuspeminjamanparam($id_transaksi)
    {
        if(!empty(session('id_akun'))){
                $anggotaData = DB::table('transaksi')
                ->select('id_transaksi')
                ->where('id_transaksi', '=', $id_transaksi)
                ->first();

            return view('peminjaman.hapuspeminjaman', ['id_transaksi' => $id_transaksi]);
        }else return redirect('/');
        
    }
    public function hapuspeminjaman()
    {
        if(!empty(session('id_akun'))){
            return view('peminjaman.hapuspeminjaman');
        }else return redirect('/');
        
    }
    public function tambahprocess(Request $request)
    {
        if(!empty(session('id_akun'))){
            $request->validate([
            'NIK' => 'required|numeric',
            'angka' => 'required|numeric',
            'waktu_pinjam' => 'required|date',
            'kode_eksemplar.*' => 'required', // You may need to adjust this validation rule
        ]);

        // Retrieve form data
        $NIK = $request->input('NIK');
        $angka = $request->input('angka');
        $waktu_pinjam = $request->input('waktu_pinjam');
        $kode_eksemplar = $request->input('kode_eksemplar');

        $book_copy_codes = implode(',', $kode_eksemplar);

        $result = DB::select('CALL addtransaksi(?, ?, ?)', [$NIK, $book_copy_codes, $waktu_pinjam]);

        return redirect('peminjaman')->with('status', 'data berhasil ditambahkan');
        }else return redirect('/');
        // Validate the form data
        
        
    }
    public function hapusprocess(Request $request)
    {   
        if(!empty(session('id_akun'))){
                try {
                $id_transaksi = $request->input('id_transaksi');
                $cek = DB::table('transaksi')
                ->select('id_transaksi')
                ->where('id_transaksi', '=', $id_transaksi)
                ->first();
                    
                if (is_null($cek)) {
                    return redirect('peminjaman')->with('status', 'Gagal menghapus data. id tidak ditemukan.');
                }
                DB::select('CALL deletetransaksi(?)', [$id_transaksi]);
                return redirect('peminjaman')->with('status', 'Data berhasil dihapus');
            } catch (\Exception $e) {
                // Jika terjadi exception, tangkap dan berikan pesan kesalahan
                return redirect('peminjaman')->with('status', 'Terjadi kesalahan: ' . $e->getMessage());
            }
        }else return redirect('/');
        
    }

}
