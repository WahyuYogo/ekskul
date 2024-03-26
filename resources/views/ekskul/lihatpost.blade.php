@extends('layout.template')
@extends('layout.navbar')

@section('konten')
@section('navbar')

<section>
    <div class="container position-relative">
        <a href='{{ url('/') }}' class="btn position-absolute top-0 start-0"><i class="bi bi-arrow-left-square-fill fs-1 text-dark"></i></a>
        <div class="text-dark my-5 text-center">
            <h3 class="fw-bold">Postingan Terbaru</h3>
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
        {{ $posts->links() }}
    </div>
</section>
    
@endsection