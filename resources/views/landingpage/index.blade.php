@extends('layout.template')
@extends('layout.navbar')

@section('konten')
@section('navbar')
{{-- Carousel --}}
<div class="container my-5">
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
</div>
{{-- Carousel End --}}

{{-- Ekstrakulikuler --}}
<section>
    <div class="container">
        <div class="text-dark my-5 d-flex align-items-center">
            <h3 class="fw-bold">Ekstrakulikuler</h3>
            <a href="{{ route('ekskul.lihatekskul') }}" class="fs-5 ms-auto text-dark">Lihat Semua >></a>
        </div>

        <div class="row row-cols-lg-4 g-3">
            @foreach($profils as $item)
                    <div class="col-6 mb-4 text-center">
                        <div class="card border-0">
                            <a href="{{ route('ekskul.show', $item->nama) }}"><img src="{{ $item->foto }}" alt="" class="img-fluid rounded"></a>
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