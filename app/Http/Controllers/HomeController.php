<?php

namespace App\Http\Controllers;

// Memanggil model Buku untuk menghitung data
use App\Models\Buku;

class HomeController extends Controller
{
    // Konstruktor bawaan dihapus karena perlindungan akses
    // sudah dipasang lewat middleware auth pada group route.

    public function index()
    {
        // Menghitung jumlah baris pada tabel buku
        $jumlah_buku = Buku::count();

        // Mengirim variabel ke view home
        return view('home', compact('jumlah_buku'));
    }
}