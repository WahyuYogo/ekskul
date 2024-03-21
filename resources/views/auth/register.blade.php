@extends('layout.template')

@section('konten')
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
<div class="w-50 rounded py-3 px-5 mx-auto bg-light mt-5">
    <form action="{{ route('register.submit') }}" method="POST">
        <h1 class="fw-bold text-center mb-3">Buat Akun Ekstrakulikuler</h1>
        @csrf
        <div class="mb-3">
        <label for="name" class="form-label">Nama Ekskul</label>
        <input class="form-control" type="text" name="name" id="name" value="{{ old('name') }}" required>
        </div>

        <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input class="form-control" type="email" name="email" id="email" value="{{ old('email') }}" required>
        </div>

        <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input class="form-control" type="password" name="password" id="password" required>
        </div>

        <div class="mb-3">
        <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
        <input class="form-control" type="password" name="password_confirmation" id="password_confirmation" required>
        </div>
        <div class="d-grid">
            <button type="submit" class="btn btn-primary d-grid">Register</button>
        </div>
    </form>
</div>
@endsection