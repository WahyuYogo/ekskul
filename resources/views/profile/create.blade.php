@extends('layout.template')

@section('konten')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="w-50 rounded bg-light mx-auto px-3 py-5 my-4">
    <h2 class="fw-bold text-center mb-3">Create Profile</h2>

    <form action="{{ route('profile.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label class="form-label" for="foto">Foto Profil</label>
            <input class="form-control" type="file" name="foto" id="foto" required>
        </div>

        <div class="mb-3">
            <label class="form-label" for="nama">Nama</label>
            <input class="form-control" type="text" name="nama" value="{{ old('nama') }}" id="nama" required>
        </div>

        <div class="mb-3">
            <label class="form-label" for="tujuan">Tujuan</label>
            <textarea class="form-control" type="text" name="tujuan" value="{{ old('tujuan') }}" id="tujuan" rows="4" required></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label" for="keuntungan">Keuntungan</label><br>
            <textarea class="form-control" name="keuntungan" value="{{ old('keuntungan') }}" id="keuntungan" rows="4" required></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label" for="link">Link Instagram</label><br>
            <input class="form-control" type="text" name="link" value="{{ old('link') }}" id="link">
        </div>

        <div class="mb-3">
            <label class="form-label" for="warna">Warna Profil</label>
            <input class="form-control" type="color" name="warna" id="warna" required>
        </div>
        <div class="d-grid">
            <button class="btn btn-primary" type="submit">Simpan</button>
        </div>
    </form>
</div>
@endsection
