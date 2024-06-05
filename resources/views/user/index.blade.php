@extends('layout.template')
@section('konten')
    <nav class="navbar navbar-expand-lg mb-3 p-3 bg-body rounded shadow-sm">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold" href="/">{{ $user->name }}</a>
            <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 gap-2">
                    <li class="nav-item me-lg-1 d-grid">
                        @if (!$profile)
                            {{-- <a href="{{ route('profile.create') }}" class="btn btn-outline-info text-dark">Buat Profil</a> --}}
                        @else
                            <a href="{{ route('profile.show') }}" class="btn btn-info text-white">Lihat Profile</a>
                        @endif
                    </li>
                    <li class="nav-item d-grid">
                        <a href='{{ route('logout') }}' class="btn btn-danger">Logout</a>
                    </li>
            </div>
        </div>
    </nav>

    <section class="container">

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif


        @if (!$profile)
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
                <h2 class="fw-bold text-center">Buat Profile</h2>
                <p class="fw-normal text-center">Silahkan Lengkapi Profil Anda <span
                        class="text-warning text-center fw-normal">{{ $user->name }}</span></p>

                <form action="{{ route('profile.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label fw-bold d-block" for="foto">Foto Profil</label>
                        <img class="rounded mb-2 img-fluid" id="hasil" src="#" alt="Preview"
                            style="display: none;">
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
                        <input class="form-control border-dark bg-secondary-subtle" type="color" name="warna"
                            id="warna" required>
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
        @else
            <div class="bg-light rounded p-3 mb-3 d-flex align-items-center">
                <a href='{{ url('dashboard/create') }}' class="btn btn-primary">Buat Post</a>
                <form action="{{ route('user.index') }}" class="ms-auto" method="GET">
                    <div class="input-group">
                        <select name="filter_time" class="form-select" onchange="this.form.submit()">
                            <option value="">Urutkan</option>
                            <option value="terbaru" {{ request('filter_time') == 'terbaru' ? 'selected' : '' }}>Terbaru
                            </option>
                            <option value="terlama" {{ request('filter_time') == 'terlama' ? 'selected' : '' }}>
                                Terlama</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="row row-cols-lg-3 g-1">
                @foreach ($show as $item)
                    <div class="col-12">
                        <div class="card">
                            <img src="{{ $item->gambar }}" class="img-fluid rounded object-fit-cover"
                                style="height: 200px" alt="...">
                            <div class="card-body">
                                <p class="card-title text-secondary">{{ $item->ekskul }}</p>
                                {{-- <p class="card-text fw-bold fs-5">{{ Str::limit($item->judul, 30) }}</p> --}}
                                @php
                                    $judul = $item->judul;
                                    $short_judul = Str::limit($judul, 30);
                                @endphp

                                @if (strlen($judul) > 30)
                                    <div class="judul-container d-flex justify-content-between">
                                        <p class="judul-limited float-start">{{ $short_judul }}</p>
                                        <p class="judul-full" style="display: none;">{{ $judul }}</p>
                                        <a class="btn lihat-selengkapnya float-end" onclick="showFullText(this)"><i
                                                class="bi bi-caret-down-fill"></i></a>
                                        <a class="btn tutup float-end" style="display: none;"
                                            onclick="hideFullText(this)"><i class="bi bi-caret-up-fill"></i></a>
                                    </div>
                                @else
                                    <p>{{ $judul }}</p>
                                @endif
                                <div class="float-start">
                                    <a href='{{ url('dashboard/' . $item->id . '/edit') }}'
                                        class="btn btn-warning btn-sm text-white">Edit</a>
                                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#{{ $item->id }}">Hapus</button>
                                </div>
                                <span class="card-title fs-6 text-secondary float-end bg-success-subtle px-1 rounded"><i
                                        class="bi bi-clock"></i> {{ $item->created_at->diffForHumans() }}</span>
                                <form class="d-inline" action="{{ url('dashboard/' . $item->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <div class="modal fade" id="{{ $item->id }}" tabindex="-1"
                                        aria-labelledby="deleteModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5>Hapus Post?</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Apakah Anda yakin ingin menghapus post ini?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Batal</button>
                                                    <button type="submit" name="submit"
                                                        class="btn btn-danger">Hapus</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="my-3 pagination d-block">
                    {{ $show->links() }}
                </div>
            </div>
        @endif


    </section>
@endsection
