@extends('layout.template')
@extends('layout.navbar')

@section('konten')
@section('navbar')

    <div class="mx-1 px-2 my-5 position-relative">
        <h1 class="fs-2 fw-bold text-center my-4">Postingan</h1>
        <div class="row row-cols-lg-2">
            @foreach ($posts as $item)
                <div class="col-12 mb-4">
                    <div class="card border-0 shadow-sm">
                        <img src="{{ $item->gambar }}" class="img-fluid rounded object-fit-cover" style="height: 300px"
                            alt="...">
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
                                    <a class="btn tutup float-end" style="display: none;" onclick="hideFullText(this)"><i
                                            class="bi bi-caret-up-fill"></i></a>
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
            @endforeach
            {{ $posts->links() }}
        </div>
        <a href='{{ route('ekskul.show', $profils->nama) }}'
            class="btn position-absolute top-0 start-0 translate-middle ms-4"><i
                class="bi bi-arrow-left-square-fill fs-1 text-dark"></i></a>
    </div>

@endsection
