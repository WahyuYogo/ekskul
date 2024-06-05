@extends('layout.template')
@extends('layout.navbar')

@section('konten')
@section('navbar')

    <section>
        <div class="container position-relative">
            <a href='{{ url('/') }}' class="btn position-absolute top-0 start-0"><i
                    class="bi bi-arrow-left-square-fill fs-1 text-dark"></i></a>
            <div class="text-dark my-5 text-center">
                <h3 class="fw-bold">Ekstrakulikuler</h3>
            </div>
            <form action="{{ route('ekskul.lihatekskul') }}" method="GET" class="mb-4">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="Cari Ekstrakurikuler..."
                        value="{{ request('search') }}">
                    <button class="btn btn-primary" type="submit">Cari</button>
                </div>
            </form>
            <div class="row row-cols-lg-4 g-3">
                @foreach ($profils as $item)
                    <div class="col-6 mb-4 text-center">
                        <div class="card border-0" style="height: 21rem;">
                            <a href="{{ route('ekskul.show', $item->nama) }}"><img src="{{ $item->foto }}" alt=""
                                    class="img-fluid rounded object-fit-cover" style="height: 250px;"></a>
                            <div class="card-body">
                                <h5 class="card-title fw-bold">{{ $item->nama }}</h5>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

@endsection
