@extends('layout.template')
@extends('layout.navbar')

@section('konten')
@section('navbar')

    <section>
        <div class="container position-relative">
            <a href='{{ url('/') }}' class="btn position-absolute top-0 start-0"><i
                    class="bi bi-arrow-left-square-fill fs-1 text-dark"></i></a>
            <div class="text-dark my-5 text-center">
                <h3 class="fw-bold">Postingan Terbaru</h3>
            </div>
            <form action="{{ route('ekskul.lihatpost') }}" method="GET" class="mb-4">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="Cari Postingan..."
                        value="{{ request('search') }}">
                    <button class="btn btn-primary" type="submit">Cari</button>
                </div>
            </form>
            <div class="row row-cols-lg-2">
                @forelse ($posts as $item)
                    <div class="col-12 mb-4">
                        <div class="card border-0 shadow-sm">
                            <img src="{{ $item->gambar }}" class="img-fluid rounded object-fit-cover" style="height: 300px"
                                alt="..." data-bs-toggle="modal" data-bs-target="#{{ $item->gambar }}">
                            <div class="card-body">
                                <p class="card-title text-secondary">{{ $item->ekskul }}</p>
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
                                {{-- <p class="card-text fw-bold fs-5">{{ $item->judul }}</p> --}}
                                <span class="card-title fs-6 text-secondary bg-success-subtle px-1 rounded float-end"><i
                                        class="bi bi-clock"></i> {{ $item->created_at->diffForHumans() }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="{{ $item->gambar }}" tabindex="-1" aria-labelledby="imageModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    {{-- <p class="fw-bold fs-5">Selengkapnya</p> --}}
                                    <button type="button" class="btn fs-4 ms-auto" data-bs-dismiss="modal"><i
                                            class="bi bi-x-lg"></i></button>
                                </div>
                                <div class="modal-body">
                                    <img src="{{ $item->gambar }}" class="img-fluid mb-2" id="modalImage" alt="Full Image">
                                    <p>{{ $item->judul }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="container">
                        <p class="text-center bg-danger-subtle py-3 rounded fw-bold">Tidak ada post yang tersedia.</p>
                    </div>
                @endforelse
            </div>
            {{ $posts->links() }}
        </div>
    </section>

@endsection
