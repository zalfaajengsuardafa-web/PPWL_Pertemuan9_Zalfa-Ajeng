{{-- Memakai layout master hasil templat SB Admin --}}
@extends('layouts.master')

{{-- Judul tab browser --}}
@section('title', 'Dashboard')

@section('content')
    <h1 class="mt-2">Dashboard</h1>

    {{-- Breadcrumb penanda posisi halaman --}}
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard</li>
    </ol>

    <div class="row">
        <div class="col-xl-4 col-md-6">
            {{-- Kartu ringkasan jumlah buku --}}
            <div class="card bg-primary text-white mb-4">
                <div class="card-body">
                    {{-- Angka berasal dari Buku::count() di HomeController --}}
                    <div class="fs-2 fw-bold">{{ $jumlah_buku }}</div>
                    Jumlah Buku
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    {{-- stretched-link membuat seluruh kartu bisa diklik --}}
                    <a class="small text-white stretched-link" href="{{ route('buku.index') }}">Lihat Data Buku</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
    </div>

    {{-- Kartu sapaan memakai nama akun yang sedang login --}}
    <div class="card mb-4">
        <div class="card-body">
            <h5>Selamat datang, {{ Auth::user()->name }}</h5>
            <p class="mb-0">Anda berhasil masuk ke sistem pengelolaan data buku.</p>
        </div>
    </div>
@endsection