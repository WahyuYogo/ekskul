@extends('layout.template')
@section('konten')
    <div class="pt-3">
        <div>
            @foreach ($errors->all() as $item)
                <div class="alert alert-danger">
                    <li>{{ $item }}</li>
                </div>
            @endforeach
        </div>
    </div>

    <div class="w border rounded py-4 px-3 mx-auto bg-light mt-5">
        <form action="{{ route('admin.update_password', $user->id) }}" method="POST">
            @csrf
            @method('PUT')
            <h3 class="text-center">Halo <span class="text-warning">{{ $user->name }}</span></h3>
            <h3 class="text-center fs-6 fst-normal mb-3">Silahkan Masukkan Password Baru Anda</h3>
            <div class="mb-3">
                <label for="password" class="form-label fw-bold">Password</label>
                <input class="form-control border-dark bg-secondary-subtle" type="password" name="password" id="password"
                    required placeholder="Minimal 8 karakter">
            </div>

            <div class="mb-3">
                <label for="password_confirmation" class="form-label fw-bold">Konfirmasi Password</label>
                <input class="form-control border-dark bg-secondary-subtle" type="password" name="password_confirmation"
                    id="password_confirmation" required placeholder="Masukkan Kembali Password">
            </div>
            <div class="row rwo-cols-2 g-1">
                <div class="col d-grid">
                    <a href="{{ url('/admin') }}" class="btn btn-primary">Kembali</a>
                </div>
                <div class="col d-grid">
                    <button type="submit" class="btn btn-primary">Perbarui</button>
                </div>
            </div>
        </form>
    </div>
@endsection
