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
    <div class="w mx-5 rounded bg-light mx-auto px-3 py-5 my-4">
        <h2 class="fw-bold text-center mb-3">Edit Profile</h2>

        <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="mb-3">
                <label class="form-label fw-bold d-block" for="foto">Foto Profil</label>
                <img class="rounded mb-2 img-fluid" id="hasil" src="{{ $profile->foto }}" alt="Preview">
                <label class="form-control border-dark bg-secondary-subtle" for="foto">Pilih Foto</label>
                <input class="d-none" type="file" name="foto" id="foto" value="{{ $profile->foto }}"
                    accept="image/*">
            </div>

            <div class="mb-3 d-none">
                <label class="form-label fw-bold" for="nama">Nama</label>
                <input class="form-control border-dark bg-secondary-subtle" type="text" name="nama"
                    value="{{ $profile->nama }}" id="nama" required>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold" for="warna">Background Profil</label>
                <input class="form-control border-dark bg-secondary-subtle" type="color" name="warna"
                    value="{{ $profile->warna }}" id="warna" required>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold" for="tujuan">Tujuan</label>
                <textarea rows="5" class="form-control border-dark bg-secondary-subtle" type="text" name="tujuan"
                    id="tujuan" required>{{ $profile->tujuan }}</textarea>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold" for="keuntungan">Keuntungan</label><br>
                <textarea rows="5" class="form-control border-dark bg-secondary-subtle" name="keuntungan" id="keuntungan"
                    required>{{ $profile->keuntungan }}</textarea>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold" for="link">Link Instagram</label><br>
                <input class="form-control border-dark bg-secondary-subtle" type="text" name="link"
                    value="{{ $profile->link }}" id="link" placeholder="Opsional">
            </div>

            <div class="">
                <a href="{{ route('profile.show') }}" class="btn btn-danger me-1">Kembali</a>
                <button class="btn btn-primary" type="submit">Simpan</button>
            </div>
        </form>
    </div>
    <script>
        const fileInput = document.getElementById('foto');
        const imagePreview = document.getElementById('hasil');

        fileInput.addEventListener('change', function(event) {
            const file = event.target.files[0];
            const reader = new FileReader();

            reader.onload = function(e) {
                imagePreview.src = e.target.result;
                imagePreview.style.display = 'block';
            };

            reader.readAsDataURL(file);
        });
    </script>
@endsection
