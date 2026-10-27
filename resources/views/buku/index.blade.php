
@extends('layouts.master')

@section('title', 'Data Buku')

@section('content')

<div class="mb-4">
    <h1 class="h3 fw-bold mb-2">Data Buku</h1>

    <ol class="breadcrumb mb-0">
        <li class="breadcrumb-item">
            <a href="{{ route('home') }}"
               class="text-decoration-none">
                Dashboard
            </a>
        </li>
        <li class="breadcrumb-item active">
            Data Buku
        </li>
    </ol>
</div>

@if (Session::has('pesan'))
    <div class="alert alert-success alert-dismissible fade show"
         role="alert">

        {{ Session::get('pesan') }}

        <button type="button"
                class="btn-close"
                data-bs-dismiss="alert"
                aria-label="Tutup">
        </button>
    </div>
@endif

<div class="card shadow-sm mb-4">

    <div class="card-header bg-white py-3">
        <div class="d-flex flex-wrap justify-content-between
                    align-items-center gap-2">

            <h5 class="mb-0">
                <i class="fas fa-table me-2"></i>
                Daftar Buku
            </h5>

            <a href="{{ route('buku.create') }}"
               class="btn btn-primary btn-sm">

                <i class="fas fa-plus me-1"></i>
                Tambah Buku
            </a>
        </div>
    </div>

    <div class="card-body">

        <div class="table-responsive">

            <table class="table table-striped table-hover
                          table-bordered align-middle">

                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Judul Buku</th>
                        <th>Penulis</th>
                        <th>Harga</th>
                        <th>Tgl. Terbit</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($data_buku as $buku)
                        <tr>
                            <td>{{ ++$no }}</td>

                            <td>{{ $buku->judul }}</td>

                            <td>{{ $buku->penulis }}</td>

                            <td class="text-nowrap">
                                Rp {{ number_format($buku->harga, 0, ',', '.') }}
                            </td>

                            <td class="text-nowrap">
                                {{ $buku->tgl_terbit->format('d/m/Y') }}
                            </td>

                            <td>
                                <div class="d-flex gap-2">

                                    <a href="{{ route('buku.edit', $buku->id) }}"
                                       class="btn btn-warning btn-sm">
                                        <i class="fas fa-edit me-1"></i>
                                        Edit
                                    </a>

                                    <form action="{{ route('buku.destroy', $buku->id) }}"
                                          method="POST">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                                class="btn btn-danger btn-sm"
                                                onclick="return confirm('Yakin mau dihapus?')">

                                            <i class="fas fa-trash me-1"></i>
                                            Hapus
                                        </button>
                                    </form>

                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6"
                                class="text-center text-muted py-4">
                                Belum ada data buku.
                            </td>
                        </tr>
                    @endforelse
                </tbody>

            </table>
        </div>

        <div class="d-flex flex-column flex-md-row
                    justify-content-between
                    align-items-start align-items-md-center
                    gap-3 mt-3">

            <strong>
                Jumlah Buku: {{ $jumlah_buku }}
            </strong>

            <div>
                {{ $data_buku->links() }}
            </div>
        </div>

    </div>
</div>

@endsection