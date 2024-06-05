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
    <div class="w rounded bg-light mx-auto px-3 py-5 my-4">
        <h2 class="fw-bold text-center">Create Profile</h2>
        <p class="fw-normal text-center">Silahkan Lengkapi Profil Anda <span
                class="text-warning text-center fw-normal">{{ $user->name }}</span></p>

        <form action="{{ route('profile.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label class="form-label fw-bold d-block" for="foto">Foto Profil</label>
                <img class="rounded mb-2 img-fluid" id="hasil" src="#" alt="Preview" style="display: none;">
                <label class="form-control border-dark bg-secondary-subtle" for="foto">Pilih Foto</label>
                <input class="form-control border-dark bg-secondary-subtle d-none" type="file" name="foto"
                    id="foto" required accept="image/*">
            </div>

            <div class="mb-3 d-none">
                <label class="form-label fw-bold" for="nama">Nama</label>
                <input class="form-control border-dark bg-secondary-subtle" type="text" name="nama"
                    value="{{ $user->name }}" id="nama" required>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold" for="warna">Background Profil</label>
                <input class="form-control border-dark bg-secondary-subtle" type="color" name="warna" id="warna"
                    required>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold" for="tujuan">Tujuan</label>
                <textarea class="form-control border-dark bg-secondary-subtle" type="text" name="tujuan" value="{{ old('tujuan') }}"
                    id="tujuan" rows="4" required placeholder="Tujuan Dibentuknya Ekstrakulikuler"></textarea>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold" for="keuntungan">Keuntungan</label><br>
                <textarea class="form-control border-dark bg-secondary-subtle" name="keuntungan" value="{{ old('keuntungan') }}"
                    id="keuntungan" rows="4" required placeholder="Keuntungan Yang Akan Didapat Siswa Ketika Bergabung"></textarea>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold" for="link">Link Instagram</label><br>
                <input class="form-control border-dark bg-secondary-subtle" type="text" name="link"
                    value="{{ old('link') }}" id="link" placeholder="Opsional">
            </div>

            <div class="d-grid">
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
