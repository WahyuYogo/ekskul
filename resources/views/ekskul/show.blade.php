@extends('layout.template')
@extends('layout.navbar')

@section('konten')
@section('navbar')
    <div class="position-relative mb-5">
        <div class="container-fluid" style="height: 150px; background-color:{{ $profils->warna }};"></div>
        <div class="container position-relative pt-5">
            <img src="{{ asset($profils->foto) }}" alt=""
                class="rounded-circle img-fluid position-absolute top-0 start-0 translate-middle-y"
                style="max-height: 120px; max-width: 120px;">
            <h1 class="fw-bold fs-2 mb-3 mt-5">{{ $profils->nama }}</h1>
            <div class="bg-light rounded p-3 my-3">
                <h1 class="fs-4 fw-bold">Tujuan</h1>
                <p>{{ $profils->tujuan }}</p>
            </div>
            <div class="bg-light rounded p-3 my-3">
                <h1 class="fs-4 fw-bold">Keuntungan</h1>
                <p>{{ $profils->keuntungan }}</p>
            </div>
        </div>
        <a href='{{ $profils->link }}' class="btn bg-light px-2 py-2 position-absolute top-0 end-0 mt-4 me-3"><i
                class="bi bi-instagram fs-3"></i></a>
        <a href='{{ url('/') }}' class="btn position-absolute top-0 start-0 mt-3 ms-3"><i
                class="bi bi-arrow-left-square-fill fs-1 text-light"></i></a>
    </div>

    <div class="mx-1 px-2 my-5">
        <h1 class="fs-2 fw-bold text-center my-4">Postingan</h1>
        <div class="row row-cols-lg-2">
            @foreach ($posts as $item)
                <div class="col-12 mb-4">
                    <div class="card border-0 shadow-sm">
                        <img src="{{ $item->gambar }}" class="img-fluid rounded object-fit-cover" style="height: 300px"
                            alt="..." data-bs-toggle="modal" data-bs-target="#{{ $item->gambar }}">
                        <div class="card-body">
                            {{-- <p class="card-title text-secondary">{{ $item->ekskul }}</p> --}}
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
                                    <a class="btn tutup float-end" style="display: none;" onclick="hideFullText(this)"><i
                                            class="bi bi-caret-up-fill"></i></a>
                                </div>
                            @else
                                <p>{{ $judul }}</p>
                            @endif
                            {{-- <p class="card-text fw-bold fs-5">{{ $item->judul }}</p> --}}
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
            @endforeach
        </div>
        <div class="text-center mt-3">
            <a href="{{ route('ekskul.post', $profils->nama) }}" class="btn btn-light py-2 px-5 rounded fw-bold ">Lihat
                Semua</a>
        </div>
    </div>


@endsection
