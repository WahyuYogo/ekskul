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
        <form action='{{ url('dashboard', $data->id) }}' method='post' enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="w border rounded p-3 px-lg-5 mx-auto bg-light mt-5">
                <h1>{{ $user->name }}</h1>
                <div class="mb-3 row">
                    <div class="col">
                        <select class="form-control d-none" id="ekskul" name="ekskul">
                            <option value="{{ $user->name }}">{{ $user->name }}</option>
                        </select>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="gambar" class="col-form-label fw-bold">Edit Gambar</label>
                    <img class="rounded mb-2" id="hasil" src="{{ $data->gambar }}" alt="Preview">
                    <div class="col">
                        <label for="gambar" class="form-control border-dark bg-secondary-subtle">Edit Gambar</label>
                        <input type="file" class="form-control d-none" name='gambar' value="{{ $data->gambar }}"
                            id="gambar" accept="image/*">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="judul" class="col-form-label fw-bold">Caption Post</label>
                    <div class="col">
                        <input type="text" class="form-control border-dark bg-secondary-subtle" name='judul'
                            value="{{ $data->judul }}" id="judul">
                    </div>
                </div>
                <div class="mb-3 row">
                    <div class="col-sm-10"><a href="{{ url('users') }}" class="btn btn-danger me-3">KEMBALI</a><button
                            type="submit" class="btn btn-primary" name="submit">SIMPAN</button></div>
                </div>
            </div>
        </form>



    </div>
    <script>
        const fileInput = document.getElementById('gambar');
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
