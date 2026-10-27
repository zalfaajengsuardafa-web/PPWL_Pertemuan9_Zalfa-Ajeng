<!DOCTYPE html>
{{-- Bahasa dokumen diatur ke Indonesia --}}
<html lang="id">
<head>
    <meta charset="utf-8">
    {{-- Agar tampilan menyesuaikan lebar layar perangkat (responsif) --}}
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - Data Buku</title>

    {{-- CSS templat SB Admin dari folder public/sbadmin --}}
    <link rel="stylesheet" href="{{ asset('sbadmin/css/styles.css') }}">
</head>

{{-- bg-primary memberi latar biru pada seluruh halaman --}}
<body class="bg-primary">
<div id="layoutAuthentication">
    <div id="layoutAuthentication_content">
        <main>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-5">
                        {{-- Kartu login dengan bayangan dan sudut membulat --}}
                        <div class="card shadow-lg border-0 rounded-lg mt-5">
                            <div class="card-header">
                                <h3 class="text-center font-weight-light my-4">Login</h3>
                            </div>

                            <div class="card-body">
                                {{-- Form dikirim ke route login bawaan laravel/ui dengan metode POST --}}
                                <form method="POST" action="{{ route('login') }}">
                                    {{-- Token CSRF wajib ada pada setiap form POST --}}
                                    @csrf

                                    {{-- Pesan gagal login. Laravel menyimpannya pada kunci email,
                                         $errors->first() mengambil pesan error pertama --}}
                                    @if ($errors->any())
                                        <div class="alert alert-danger" role="alert">
                                            {{ $errors->first() }}
                                        </div>
                                    @endif

                                    {{-- Isian email. name="email" harus tetap karena dibaca LoginController.
                                         Kelas is-invalid memberi bingkai merah bila ada error --}}
                                    <div class="form-floating mb-3">
                                        <input id="email" type="email" name="email"
                                               value="{{ old('email') }}"
                                               class="form-control @error('email') is-invalid @enderror"
                                               placeholder="nama@email.com" required autofocus>
                                        <label for="email">Alamat email</label>
                                    </div>

                                    {{-- Isian kata sandi. name="password" juga harus tetap --}}
                                    <div class="form-floating mb-3">
                                        <input id="password" type="password" name="password"
                                               class="form-control @error('password') is-invalid @enderror"
                                               placeholder="Kata sandi" required>
                                        <label for="password">Kata sandi</label>
                                    </div>

                                    {{-- Tombol kirim dibuat selebar kartu (d-grid) --}}
                                    <div class="d-grid mt-4 mb-0">
                                        <button type="submit" class="btn btn-primary">Masuk</button>
                                    </div>
                                </form>
                            </div>

                            <div class="card-footer text-center py-3">
                                <div class="small">Praktikum Pemrograman Web 2</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>
</body>
</html>