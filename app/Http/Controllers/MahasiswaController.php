<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MahasiswaController extends Controller
{
    public function daftarMahasiswa(Request $request)
    {
        // return view('halaman', ['judul' => 'Daftar Mahasiswa']);

        // echo Auth::user()->id . "<br>";
        // echo Auth::user()->name . "<br>";
        // echo Auth::user()->email . "<br>";
        // echo Auth::user()->password . "<br>";

        // dump(Auth::user());

        if (Auth::check()) {
            echo "Selamat datang, " . $request->user()->name;
        } else {
            echo "Silahkan login terlebih dahulu";
        }
    }
    public function tabelMahasiswa()
    {
        return view('halaman', ['judul' => 'Tabel Mahasiswa']);
    }
    public function blogMahasiswa()
    {
        return view('halaman', ['judul' => 'Blog Mahasiswa']);
    }
}
