@extends('layout.template')

@section('konten')
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('errors') }}
        </div>
    @endif
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="container">
        <div class="rounded w py-3 px-4 mx-auto bg-light mt-5">
            <form action="{{ route('register.submit') }}" method="POST">
                <h1 class="fw-bold fs-2 fs-sm-6 text-center mb-3">Buat Akun Ekstrakulikuler</h1>
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label fw-bold">Nama Ekskul</label>
                    <input class="form-control border-dark bg-secondary-subtle" type="text" name="name" id="name"
                        value="{{ old('name') }}" required placeholder="Silahkan Masukkan Nama Ekskul Anda">
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label fw-bold">Email</label>
                    <input class="form-control border-dark bg-secondary-subtle" type="email" name="email" id="email"
                        value="{{ old('email') }}" required placeholder="Silahkan Masukkan Email Ekskul Anda">
                </div>

                <label for="password" class="form-label fw-bold">Password</label>
                <div class="mb-3 position-relative">
                    <input class="form-control border-dark bg-secondary-subtle" type="password" name="password"
                        id="password" required placeholder="Password Minimal 8 Karakter">
                    <a type="button" class="btn position-absolute end-0 top-0" id="togglePassword"><i id="icon"
                            class="bi bi-eye-slash"></i></a>
                </div>

                <label for="password_confirmation" class="form-label fw-bold">Konfirmasi Password</label>
                <div class="mb-3 position-relative">
                    <input class="form-control border-dark bg-secondary-subtle" type="password" name="password_confirmation"
                        id="password_confirmation" required placeholder="Masukkan Kembali Password Anda">
                    <a type="button" class="btn position-absolute end-0 top-0" id="togglePasswords"><i id="icons"
                            class="bi bi-eye-slash"></i></a>
                </div>
                <div class="row row-cols-2 g-1">
                    <div class="col d-grid">
                        <a href="{{ url('/admin') }}" class="btn btn-primary">Kembali</a>
                    </div>
                    <div class="col d-grid">
                        <button type="submit" class="btn btn-primary">Register</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
