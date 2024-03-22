@extends('layout.template')
@extends('layout.navbar')
@section('konten')
{{-- Carousel --}}
{{-- Carousel End --}}

{{-- Ekstrakulikuler --}}
<section>
    <div class="container">
        <div class="text-dark my-4">
            <h3 class="fw-bold">Ekstrakulikuler</h3>
        </div>

        <div class="row row-cols-lg-4 g-3">
            {{-- @foreach ($profils as $item)
            <h1>{{ $item->nama }}</h1>
            @endforeach --}}
            @foreach($profils as $item)
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">{{ $item->nama }}</h5>
                                <a href="{{ route('ekskul.show', $users->id) }}" class="btn btn-primary">Lihat Profil</a>
                            </div>
                        </div>
                    </div>
            @endforeach
        </div>
    </div>
</section>
{{-- Ekstrakulikuler End --}}

{{-- Kegiatan Terbaru --}}
<section>
    <div class="container py-5">
        <div class="text-dark my-4">
            <h3 class="fw-bold">Kegiatan Terbaru</h3>
        </div>
        <div class="row row-cols-2">
            {{-- @foreach ($data as $post)
            <button type="button" class="btn btn-transparent" data-bs-toggle="modal" data-bs-target="#{{ $post->id }}">
                <div class="col">
                    <img src="{{ $post->gambar }}" class="img-fluid rounded" alt="">
                </div>
            </button>
            <div class="modal fade" id="{{ $post->id }}" tabindex="-1" aria-labelledby="fullImageModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="fullImageModalLabel">{{ $post->judul }}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <img src="{{ $post->gambar }}" class="img-fluid" alt="Gambar Penuh">
                        </div>
                    </div>
                </div>
            </div>
            @endforeach --}}
        </div>
    </div>
</section>

{{-- Kegiatan Terbaru End --}}

{{-- Recruitment --}}
{{-- Recruitment End --}}

@endsection