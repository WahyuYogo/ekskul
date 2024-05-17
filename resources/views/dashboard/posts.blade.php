@extends('layout.template')
@section('konten')
    @if ($errors->any())
        <div class="pt-3">
            <div class="alert alert-danger">
                @foreach ($errors->all() as $item)
                    <li>{{ $item }}</li>
                @endforeach
            </div>
        </div>
    @endif
    <div class="container">
        <form action='{{ route('dashboard.index') }}' method='post' enctype="multipart/form-data">
            @csrf
            <div class="w border rounded p-3 px-lg-5 mx-auto bg-light mt-5">
                <p class="text-center fs-1 fw-bold">{{ $user->name }}</p>
                {{-- <p class="text-center fs-5">Buat Post</p> --}}
                <div class="mb-3 row">
                    <div class="col-sm-10 d-none">
                        <select class="form-control" id="ekskul" name="ekskul">
                            <option value="{{ $user->name }}">{{ $user->name }}</< /option>
                        </select>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="gambar" class="col-form-label fs-5 fw-bold">Masukkan Gambar</label>
                    <img class="rounded mb-2" id="imagePreview" src="#" alt="Preview" style="display: none;">
                    <div class="col-sm-12">
                        <label for="gambar" class="form-control border-dark bg-secondary-subtle"><i
                                class="bi bi-images"></i> Masukkan Gambar</label>
                        <input type="file" class="form-control border-dark bg-secondary-subtle d-none" name='gambar'
                            id="gambar" accept="image/*" placeholder="h">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="judul" class="col-form-label fs-5 fw-bold">Caption Post</label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control border-dark bg-secondary-subtle" name='judul'
                            id="judul" placeholder="Tulis Caption Disini">
                    </div>
                </div>
                <div class="mb-3 row">
                    <div class="col-sm-12"><a href="{{ url('users') }}"
                            class="btn btn-danger fw-bold me-1">KEMBALI</a><button type="submit"
                            class="btn btn-warning fw-bold text-light" name="submit">POSTING</button></div>
                </div>
            </div>
        </form>
    </div>
    <script>
        const fileInput = document.getElementById('gambar');
        const imagePreview = document.getElementById('imagePreview');

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
