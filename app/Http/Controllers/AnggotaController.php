<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use App\Models\akun;
use Illuminate\Support\Facades\Session;


class AnggotaController extends Controller
{
    public function tambahanggota()
    {
        if(!empty(session('id_akun'))){
            return view('anggota.tambahanggota');
        }else return redirect('/');

    }
    public function lihatanggota()
    {   
        if(!empty(session('id_akun'))){
            $anggotaData = DB::table('anggota')
                ->select('nik', 'nama', 'email', 'alamat', 'telepon', 'jenis_kelamin')
                ->get();

            return view('anggota.lihatanggota', ['anggotaData' => $anggotaData]);
        }else return redirect('/');

    }
    public function editanggota()
    {
        if(!empty(session('id_akun'))){
            return view('anggota.editanggota');
        }else return redirect('/');

    }
    public function hapusanggota()
    {
        if(!empty(session('id_akun'))){
            return view('anggota.hapusanggota');
        }else return redirect('/');

    }
    public function editanggotaparam($nik)
    {   
        if(!empty(session('id_akun'))){
            $anggotaData = DB::table('anggota')
                ->select('nik', 'nama', 'email', 'alamat', 'telepon', 'jenis_kelamin')
                ->where('nik', '=', $nik)
                ->first();

            return view('anggota.editanggota', ['anggotaData' => $anggotaData,'nik' => $nik]);
        }else return redirect('/');

    }
    public function hapusanggotaparam($nik)
    {   
        if(!empty(session('id_akun'))){
            $anggotaData = DB::table('anggota')
                        ->select('nik', 'nama', 'email', 'alamat', 'telepon', 'jenis_kelamin')
                        ->where('nik', '=', $nik)
                        ->first();

            return view('anggota.hapusanggota', ['anggotaData' => $anggotaData,'nik' => $nik]);
        }else return redirect('/');
        
    }
    public function insertanggota(Request $request)
    {   
        if(!empty(session('id_akun'))){
            $NIK = $request->input('NIK');
        $nama = $request->input('nama');
        $email = $request->input('email');
        $alamat = $request->input('alamat');
        $telepon = $request->input('telepon');
        $jenisKelamin = $request->input('jenisKelamin');

        // Panggil stored procedure InsertBuku dari database
        DB::select('CALL InsertAnggota(?, ?, ?, ?, ?, ?)', [$NIK, $nama, $email, $alamat, $telepon, $jenisKelamin]);
        return redirect('anggota')->with('status', 'Data berhasil ditambahkan');
        }else return redirect('/');
        // Ambil data dari form
        
    }
    public function updateanggota(Request $request)
    {
        if(!empty(session('id_akun'))){
            try {
            $NIK = $request->input('NIK');
            $nama = $request->input('nama');
            $email = $request->input('email');
            $alamat = $request->input('alamat');
            $telepon = $request->input('telepon');
            $jenisKelamin = $request->input('jenisKelamin');
            // Check if the book with the specified kode_eksemplar exists
            $cek = DB::table('anggota')
            ->select('nik')
            ->where('nik', '=', $request)
            ->first();
                
            if (is_null($cek)) {
                return redirect('anggota')->with('status', 'Gagal mengupdate data. anggota tidak ditemukan.');
            }
            DB::select('CALL updateAnggota(?, ?, ?, ?, ?, ?)', [$NIK, $nama, $email, $alamat, $telepon, $jenisKelamin]);
    
            return redirect('anggota')->with('status', 'Data berhasil diupdate');
        } catch (\Exception $e) {
            // Jika terjadi exception, tangkap dan berikan pesan kesalahan
            return redirect('anggota')->with('status', 'Terjadi kesalahan: ' . $e->getMessage());
        }
        }else return redirect('/');

    }
    public function deleteanggota(Request $request)
    {
        if(!empty(session('id_akun'))){
            try {
            $NIK = $request->input('NIK');
            
            $cek = DB::table('anggota')
            ->select('nik')
            ->where('nik', '=', $NIK)
            ->first();
                
            if (is_null($cek)) {
                return redirect('anggota')->with('status', 'Gagal menghapus data. anggota tidak ditemukan.');
            }
            DB::select('CALL deleteanggota(?)', [$NIK]);
            return redirect('anggota')->with('status', 'Data berhasil dihapus');
        } catch (\Exception $e) {
            // Jika terjadi exception, tangkap dan berikan pesan kesalahan
            return redirect('anggota')->with('status', 'Terjadi kesalahan: ' . $e->getMessage());
        }
        }else return redirect('/');
        
    }
}
