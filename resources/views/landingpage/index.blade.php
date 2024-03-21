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
            <div class="col position-relative">
                <div class="card shadow-sm border-0 rounded">
                    <a href="{{ route('ekskul.junalistik') }}">
                        <img src="{{ asset('images/page/jurnalistik.png') }}" class="card-img-top" alt="...">
                    </a>
                    <div class="card-body">
                      <h5 class="card-title text-center">Jurnalistik</h5>
                    </div>
                </div>
            </div>

            <div class="col position-relative">
                <div class="card shadow-sm border-0 rounded">
                    <a href="{{url('/pecintaalam')}}">
                        <img src="{{ asset('images/page/pecintaalam.png') }}" class="card-img-top" alt="...">
                    </a>
                    <div class="card-body">
                      <h5 class="card-title text-center">Pecinta Alam</h5>
                    </div>
                </div>
            </div>

            <div class="col position-relative">
                <div class="card shadow-sm border-0 rounded">
                    <a href="{{url('/pmr')}}">
                        <img src="{{ asset('images/page/pmr.png') }}" class="card-img-top" alt="...">
                    </a>
                    <div class="card-body">
                      <h5 class="card-title text-center">Palang Merah Remaja</h5>
                    </div>
                </div>
            </div>

            <div class="col position-relative">
                <div class="card shadow-sm border-0 rounded">
                    <a href="{{url('/pramuka')}}">
                        <img src="{{ asset('images/page/pramuka.png') }}" class="card-img-top" alt="...">
                    </a>
                    <div class="card-body">
                      <h5 class="card-title text-center">Pramuka</h5>
                    </div>
                </div>
            </div>

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