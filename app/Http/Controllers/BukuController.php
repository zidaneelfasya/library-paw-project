<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use App\Models\akun;
use Illuminate\Support\Facades\Session;


class BukuController extends Controller
{
     public function lihatbuku()
    {   
        
        if(!empty(session('id_akun'))){
            $perpus = DB::select('CALL lihatbuku()');

        return view('buku.lihatbuku', ['perpus' => $perpus]);
        }else return redirect('/');
        
    }
    public function tambahbuku()
    {
        if(!empty(session('id_akun'))){
            return view('buku.tambahbuku');
        }else return redirect('/');
        
        
    }
    public function editbuku()
    {
        if(!empty(session('id_akun'))){
            return view('buku.editbuku');
        }else return redirect('/');
        
        
    }
    public function editbukuparam($kode_eksemplar)
    {   
        if(!empty(session('id_akun'))){
        $perpus = DB::table('buku')
                    ->where('kode_eksemplar', '=', $kode_eksemplar)
                    ->select('kode_eksemplar')
                    ->first(); // Menggunakan first() karena kita mengharapkan satu hasil saja

        return view('buku.editbuku', ['perpus' => $perpus, 'kode_eksemplar' => $kode_eksemplar]);
        }else return redirect('/');
        
    }


    public function hapusbuku()
    {
        if(!empty(session('id_akun'))){
            return view('buku.hapusbuku');
        }else return redirect('/');
        
        
    }

    public function hapusbukuparam($kode_eksemplar)
    {   
        if(!empty(session('id_akun'))){
            $perpus = DB::table('buku')
                    ->where('kode_eksemplar', '=', $kode_eksemplar)
                    ->select('kode_eksemplar')
                    ->first();

            return view('buku.hapusbuku', ['perpus' => $perpus, 'kode_eksemplar' => $kode_eksemplar]);
        }else return redirect('/');
        
    }

     public function insertbuku(Request $request)
    {   
        if(!empty(session('id_akun'))){
            $kode_eksemplar = $request->input('kode_eksemplar');
            $penerbit = $request->input('penerbit');
            $judul = $request->input('judul');
            $jumlah = $request->input('jumlah');
            $pengarang = $request->input('pengarang');

            // Panggil stored procedure InsertBuku dari database
            DB::select('CALL InsertBuku(?, ?, ?, ?, ?)', [$kode_eksemplar, $penerbit, $judul, $jumlah,$pengarang]);

            // Redirect ke lihatbuku dengan pesan sukses
            return redirect('buku')->with('status', 'Buku berhasil ditambahkan');
        }else return redirect('/');
        // Ambil data dari form
        
    }
    public function updatebuku(Request $request)
    {   
        if(!empty(session('id_akun'))){
            try {
            $kode_eksemplar = $request->input('kode_eksemplar');
            $penerbit = $request->input('penerbit');
            $judul = $request->input('judul');
            $jumlah = $request->input('jumlah');
            $pengarang = $request->input('pengarang');
            // Check if the book with the specified kode_eksemplar exists
            $cek = DB::table('buku')
                ->select('kode_eksemplar')
                ->where('kode_eksemplar', '=', $kode_eksemplar)
                ->first();
                
            if (is_null($cek)) {
                return redirect('buku')->with('status', 'Gagal mengupdate buku. Kode eksemplar tidak ditemukan.');
            }
            DB::select('CALL updatebuku(?, ?, ?, ?, ?)', [$kode_eksemplar, $penerbit, $judul, $jumlah,$pengarang]);
    
            return redirect('buku')->with('status', 'Buku berhasil diupdate');
        } catch (\Exception $e) {
            // Jika terjadi exception, tangkap dan berikan pesan kesalahan
            return redirect('buku')->with('status', 'Terjadi kesalahan: ' . $e->getMessage());
        }
        }else return redirect('/');
        
    }

    public function deletebuku(Request $request){

        if(!empty(session('id_akun'))){
            try {
            $kode_eksemplar = $request->input('kode_eksemplar');
            
            // Check if the book with the specified kode_eksemplar exists
            $cek = DB::table('buku')
                ->select('kode_eksemplar')
                ->where('kode_eksemplar', '=', $kode_eksemplar)
                ->first();
                
            if (is_null($cek)) {
                return redirect('buku')->with('status', 'Gagal menghapus buku. Kode eksemplar tidak ditemukan.');
            }
            DB::select('CALL deletebuku(?)', [$kode_eksemplar]);
    
            return redirect('buku')->with('status', 'Buku berhasil dihapus');
        } catch (\Exception $e) {
            // Jika terjadi exception, tangkap dan berikan pesan kesalahan
            return redirect('buku')->with('status', 'Terjadi kesalahan: ' . $e->getMessage());
        }
        }else return redirect('/');
        
    }
}
