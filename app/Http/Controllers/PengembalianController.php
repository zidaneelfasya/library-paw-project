<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use App\Models\akun;
use Illuminate\Support\Facades\Session;


class PengembalianController extends Controller
{
    public function pengembalian()
    {
        if(!empty(session('id_akun'))){
                $peminjamandata = DB::select("CALL TampilTransaksi()");
            return view('pengembalian.lihatpengembalian', ['peminjamandata' => $peminjamandata]);
        }else return redirect('/');
        
    }
    public function pengembalianparam($id_transaksi)
    {
        if(!empty(session('id_akun'))){
                $anggotaData = DB::table('transaksi')
                ->select('id_transaksi')
                ->where('id_transaksi', '=', $id_transaksi)
                ->first();
            return view('pengembalian.kembali', ['id_transaksi' => $id_transaksi]);
        }else return redirect('/');
    }
    public function pengembalianprocess(Request $request)
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
            return redirect('peminjaman')->with('status', 'data berhasil dihapus');
        }else return redirect('/');
        
    }
}
