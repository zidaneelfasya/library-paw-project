<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use App\Models\akun;
use Illuminate\Support\Facades\Session;


class AutentikasiController extends Controller
{
    public function login(Request $request){
            $email = $request->input('email');
            $password = $request->input('password');
        
            // Attempt to authenticate the user using stored procedure
            $akun = DB::select("call pilihakun('$email','$password')");
        
            if (!empty($akun)) {
                $akun = $akun[0]; // Assuming the first row of the result set is what you need
        
                // Authentication successful
                if ($akun->role_ == 'admin') {
                    session(['id_akun' => $akun->id_akun]);
                    return redirect('home');
                } elseif ($akun->role_ == 'anggota') {
                    session(['id_akun' => $akun->id_akun]);
                    return redirect("pengguna")->with('status', 'berhasil login');
                }
            } else {
                // Authentication failed, redirect back to login page
                return redirect()->back()->with('status', 'Invalid email or password');
            }

    }

    public function tambahakun(Request $request)
    {
                // Ambil data dari form
            $NIK = $request->input('NIK');
            $nama = $request->input('nama');
            $email = $request->input('email');
            $password = $request->input('password');
            $alamat = $request->input('alamat');
            $telepon = $request->input('telepon');
            $jenisKelamin = $request->input('jenisKelamin');

            // Panggil stored procedure InsertBuku dari database
            DB::select('CALL tambahakun(?, ?, ?, ?, ?, ?, ?)', [$NIK, $nama, $email, $alamat, $telepon, $jenisKelamin,$password]);
            return redirect('/');
        
    }

    public function logout()
    {   
        Session::forget(['akun', 'id_akun']);

        return redirect('/');
    }

}
