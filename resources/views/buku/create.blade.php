@extends('layouts.master')

@section('title', 'Tambah Buku')

@section('content')
<h1 class="mt-2">Tambah Data Buku</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('buku.index') }}">Data Buku</a></li>
    <li class="breadcrumb-item active">Tambah Buku</li>
</ol>

<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-plus me-1"></i> Form Tambah Buku
    </div>
    <div class="card-body">
        {{-- Menampilkan pesan error validasi jika inputan aku belum lengkap --}}
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('buku.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="judul" class="form-label">Judul Buku</label>
                <input type="text" class="form-control" id="judul" name="judul" value="{{ old('judul') }}" placeholder="Masukkan judul buku">
            </div>

            <div class="mb-3">
                <label for="penulis" class="form-label">Penulis</label>
                <input type="text" class="form-control" id="penulis" name="penulis" value="{{ old('penulis') }}" placeholder="Masukkan nama penulis">
            </div>

            <div class="mb-3">
                <label for="harga" class="form-label">Harga (Rp)</label>
                <input type="number" class="form-control" id="harga" name="harga" value="{{ old('harga') }}" placeholder="Contoh: 50000">
            </div>

            <div class="mb-3">
                <label for="tgl_terbit" class="form-label">Tanggal Terbit</label>
                {{-- Input tanggal aku kasih class date biar datepicker jQuery bisa jalan --}}
                <input type="text" class="form-control date" id="tgl_terbit" name="tgl_terbit" value="{{ old('tgl_terbit') }}" placeholder="YYYY/MM/DD">
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">Simpan Buku</button>
                <a href="{{ route('buku.index') }}" class="btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection