@extends('layout.template')
@extends('layout.navbar')

@section('konten')
@section('navbar')

<div class="mx-5 px-2 my-5 position-relative">
    <h1 class="fs-2 fw-bold text-center my-4">Postingan</h1>
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
    <a href='{{ route('ekskul.show', $item->ekskul) }}' class="btn position-absolute top-0 start-0 translate-middle"><i class="bi bi-arrow-left-square-fill fs-1 text-dark"></i></a>
</div>

@endsection
