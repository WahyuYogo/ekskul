@extends('layout.template')
@extends('layout.navbar')

@section('konten')
@section('navbar')
{{-- Carousel --}}
{{-- <div class="container my-5">
    <div id="carouselExampleIndicators" class="carousel slide">
        <div class="carousel-indicators rounded-circle">
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="{{ asset('images/1711078267.jpg') }}" class="d-block w-100 rounded h-50 object-fit-cover" alt="...">
        </div>
        <div class="carousel-item active">
            <img src="{{ asset('images/1711079074.jpg') }}" class="d-block w-100 rounded h-50 object-fit-cover" alt="...">
        </div>
        <div class="carousel-item active">
            <img src="{{ asset('images/1711079586.jpg') }}" class="d-block w-100 rounded h-50 object-fit-cover" alt="...">
        </div>
        </div>
    </div>
</div> --}}
{{-- Carousel End --}}

{{-- coba start --}}
<section>
    <div class="container-fluid color" style="height: 100vh">
        <div class="container">
            <div class="row row-cols-lg-2">
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
{{-- coba end --}}

{{-- Ekstrakulikuler --}}
<section id="ekskul">
    <div class="container">
        <div class="text-dark my-5 d-flex align-items-center">
            <h3 class="fw-bold">Ekstrakulikuler</h3>
            <a href="{{ route('ekskul.lihatekskul') }}" class="fs-5 ms-auto text-dark">Lihat Semua >></a>
        </div>

        <div class="row row-cols-lg-4 g-3">
            @foreach($profils as $item)
                    <div class="col-6 mb-4 text-center">
                        <div class="card border-0">
                            <a href="{{ route('ekskul.show', $item->nama) }}"><img src="{{ $item->foto }}" alt="" class="img-fluid rounded object-fit-cover"></a>
                            <div class="card-body">
                                <h5 class="card-title fw-bold">{{ $item->nama }}</h5>
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
                    <img src="{{ $item->gambar }}" class="img-fluid rounded object-fit-cover" style="height: 300px" alt="...">
                    <div class="card-body">
                    <p class="card-title text-secondary">{{ $item->ekskul }}</p>
                    <p class="card-text fw-bold fs-5">{{ $item->judul }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

@endsection
