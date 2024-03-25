@extends('layout.template')
@extends('layout.navbar')

@section('konten')
@section('navbar')
<div class="position-relative mb-5">
    <div class="container-fluid" style="height: 150px; background-color:{{ $profils->warna }};"></div>
    <div class="container position-relative pt-5">
        <img src="{{ asset($profils->foto) }}" alt="" class="rounded-circle img-fluid position-absolute top-0 start-0 translate-middle-y" style="max-width: 150px">
        <h1 class="fw-bold fs-2 my-3">{{ $profils->nama }}</h1>
        <div class="bg-light rounded p-3 my-3">
            <h1 class="fs-4 fw-bold">Tujuan</h1>
            <p>{{ $profils->tujuan }}</p>
        </div>
        <div class="bg-light rounded p-3 my-3">
            <h1 class="fs-4 fw-bold">Keuntungan</h1>
            <p>{{ $profils->keuntungan }}</p>
        </div>
    </div>
    <a href='{{ url('/') }}' class="btn position-absolute top-0 start-0 mt-3 ms-3"><i class="bi bi-arrow-left-square-fill fs-1 text-light"></i></a>
</div>

<div class="mx-5 px-2 my-5">
    <h1 class="fs-2 fw-bold text-center my-4">Postingan</h1>
    <div class="row row-cols-lg-2">
        @foreach ($posts as $item)
        <div class="col-12 mb-4">
            <div class="card border-0 shadow-sm">
                <img src="{{ $item->gambar }}" class="img-fluid rounded" style="height: 300px" alt="...">
                <div class="card-body">
                <p class="card-title text-secondary">{{ $item->ekskul }}</p>
                <p class="card-text fw-bold fs-5">{{ $item->judul }}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="text-center mt-3">
        <a href="{{ route('ekskul.post', $profils->nama) }}" class="btn btn-light py-2 px-5 rounded fw-bold ">Lihat Semua</a>
    </div>
</div>
@endsection