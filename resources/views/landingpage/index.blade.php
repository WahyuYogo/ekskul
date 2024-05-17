@extends('layout.template')
@extends('layout.navbar')

@section('konten')
@section('navbar')

    {{-- Main start --}}
    <section>
        <div class="container-fluid color" style="height: 100vh">
            <div class="container">
                <div class="row row-cols-lg-2 justify-content-center align-items-center">
                    <div class="col-12 order-lg-2">
                        <img src="{{ asset('images/logo/1.png') }}" alt="" class="img-fluid">
                    </div>
                    <div class="col-12 order-lg-1 align-self-center text-lg-start text-center">
                        <h5 class="text-warning">EKSTRAKULIKULER</h5>
                        <h1 class="text-light fw-bold">SMKN 1 BANGSRI</h1>
                        <p class="text-light">Ayo Bergabung Dan Temukan Bakatmu Bersama Kami!!</p>
                        <a href="#ekskul" class="btn btn-warning fw-bold fs-5 rounded-pill py-2 px-5">GABUNG</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- Main end --}}

    {{-- Ekstrakulikuler --}}
    <section id="ekskul">
        <div class="container py-5">
            <div class="text-dark py-5 d-flex align-items-center">
                <h3 class="fw-bold">Ekstrakulikuler</h3>
                <a href="{{ route('ekskul.lihatekskul') }}" class="fs-5 ms-auto text-dark">Lihat Semua >></a>
            </div>

            <div class="row row-cols-lg-4 g-3">
                @foreach ($profils as $item)
                    <div class="col-6 text-center">
                        <div class="card border-0" style="height: 21rem;">
                            <a href="{{ route('ekskul.show', $item->nama) }}"><img src="{{ $item->foto }}"
                                    class="img-fluid rounded object-fit-cover" style="height: 250px;" alt="..."> </a>
                            <div class="card-body">
                                <a href="{{ route('ekskul.show', $item->nama) }}"
                                    class="card-title fw-bold fs-5">{{ $item->nama }}</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    {{-- Ekstrakulikuler End --}}

    {{-- Postingan Terbaru --}}
    <section>
        <div class="container py-5">
            <div class="text-dark my-5 d-flex align-items-center">
                <h3 class="fw-bold">Postingan Terbaru</h3>
                <a href="{{ route('ekskul.lihatpost') }}" class="fs-5 ms-auto text-dark">Lihat Semua >></a>
            </div>
            <div class="row row-cols-lg-2">
                @foreach ($posts as $item)
                    <div class="col-12 mb-4">
                        <div class="card border-0 shadow-sm">
                            <img src="{{ $item->gambar }}" class="img-fluid rounded object-fit-cover" style="height: 300px"
                                alt="..." data-bs-toggle="modal" data-bs-target="#{{ $item->gambar }}">
                            <div class="card-body">
                                <p class="card-title text-secondary fw-light">{{ $item->ekskul }}</p>
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
                                {{-- <p class="card-text fw-medium float-start fs-5">{{ $item->judul }}</p> --}}
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
                @endforeach
            </div>
        </div>
    </section>



@endsection
