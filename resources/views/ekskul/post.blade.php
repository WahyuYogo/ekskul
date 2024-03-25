@extends('layout.template')
@extends('layout.navbar')

@section('konten')
@section('navbar')

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
</div>
    
@endsection