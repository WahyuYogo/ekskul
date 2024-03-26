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
    <h2 class="fw-bold text-center mb-3">Edit Profile</h2>
        
    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="mb-3">
            <label class="form-label" for="foto">Foto Profil</label>
            <input class="form-control" type="file" name="foto" id="foto" value="{{ $profile->foto }}">
        </div>
        
        <div class="mb-3">
            <label class="form-label" for="nama">Nama</label>
            <input class="form-control" type="text" name="nama" value="{{ $profile->nama }}" id="nama" required>
        </div>
        
        <div class="mb-3">
            <label class="form-label" for="tujuan">Tujuan</label>
            <input class="form-control" type="text" name="tujuan" value="{{ $profile->tujuan }}" id="tujuan" required>
        </div>
        
        <div class="mb-3">
            <label class="form-label" for="keuntungan">Keuntungan</label><br>
            <input class="form-control" name="keuntungan" value="{{ $profile->keuntungan }}" id="keuntungan" required>
        </div>
        
        <div class="mb-3">
            <label class="form-label" for="warna">Warna Profil</label>
            <input class="form-control" type="color" name="warna" value="{{ $profile->warna }}" id="warna" required>
        </div>
        <div class="d-grid">
            <button class="btn btn-primary" type="submit">Simpan</button>
        </div>
    </form>
</div>
@endsection