@extends('layouts.master')

@section('title', 'Edit Buku')

@section('content')
<h1 class="mt-2">Edit Data Buku</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('buku.index') }}">Data Buku</a></li>
    <li class="breadcrumb-item active">Edit Buku</li>
</ol>

<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-edit me-1"></i> Form Edit Buku
    </div>
    <div class="card-body">
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('buku.update', $buku->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="mb-3">
                <label for="judul" class="form-label">Judul Buku</label>
                <input type="text" class="form-control" id="judul" name="judul" value="{{ $buku->judul }}">
            </div>

            <div class="mb-3">
                <label for="penulis" class="form-label">Penulis</label>
                <input type="text" class="form-control" id="penulis" name="penulis" value="{{ $buku->penulis }}">
            </div>

            <div class="mb-3">
                <label for="harga" class="form-label">Harga (Rp)</label>
                <input type="number" class="form-control" id="harga" name="harga" value="{{ $buku->harga }}">
            </div>

            <div class="mb-3">
                <label for="tgl_terbit" class="form-label">Tanggal Terbit</label>
                <input type="text" class="form-control date" id="tgl_terbit" name="tgl_terbit" value="{{ $buku->tgl_terbit->format('Y/m/d') }}">
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">Update Buku</button>
                <a href="{{ route('buku.index') }}" class="btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection