@extends('layout.side')
@section('konten2')
    @if (Session::has('success'))
        <div class="pt-3 container">
            <div class="alert alert-success">
                {{ Session::get('success') }}
            </div>
        </div>
    @endif
    <div class="container">
        <nav class="navbar navbar-expand-lg my-3 p-3 bg-body rounded shadow-sm">
            <div class="container-fluid">
                <a class="navbar-brand" href="/">
                    <h1>DASHBOARD</h1>
                </a>
            </div>
        </nav>

        <div class="my-3 p-3 bg-body rounded shadow-sm d-flex align-items-center">
            <h3 class="me-auto">Daftar Post</h3>
            <form action="{{ route('admin') }}" class="ms-auto" method="GET" class="mb-4">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="Cari judul atau ekskul..."
                        value="{{ request('search') }}">
                    <button type="submit" class="btn btn-primary">Cari</button>
                </div>
            </form>
        </div>

        @if ($posts->count() > 0)
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Gambar</th>
                        <th scope="col">Ekskul</th>
                        <th scope="col">Judul</th>
                        <th scope="col">Aksi</th>
                        <th scope="col">Waktu</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $item)
                        <tr>
                            <td><img src="{{ $item->gambar }}" class="img-fluid rounded object-fit-cover"
                                    style="max-width: 150px; max-height: 100px;" alt="..."></td>
                            <td>{{ $item->ekskul }}</td>
                            <td>
                                @php
                                    $judul = $item->judul;
                                    $short_judul = Str::limit($judul, 30);
                                @endphp
                                @if (strlen($judul) > 30)
                                    <div class="judul-container">
                                        <p class="judul-limited">{{ $short_judul }}</p>
                                        <p class="judul-full" style="display: none;">{{ $judul }}</p>
                                        <a class="btn lihat-selengkapnya" onclick="showFullText(this)"><i
                                                class="bi bi-caret-down-fill"></i></a>
                                        <a class="btn tutup" style="display: none;" onclick="hideFullText(this)"><i
                                                class="bi bi-caret-up-fill"></i></a>
                                    </div>
                                @else
                                    <p>{{ $judul }}</p>
                                @endif
                            </td>
                            <td>
                                <form action="{{ url('/admin/delete/' . $item->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" name="submit" class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                            </td>
                            <td><span class="card-title fs-6 text-secondary bg-success-subtle px-1 rounded"><i
                                        class="bi bi-clock"></i> {{ $item->created_at->diffForHumans() }}</span></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p class="text-center bg-danger-subtle py-3 rounded fw-bold">Tidak ada post yang tersedia.</p>
        @endif
        <div class="mt-3">
            {{ $posts->links() }}
        </div>
    </div>
@endsection
