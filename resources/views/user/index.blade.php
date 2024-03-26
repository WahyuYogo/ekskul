@extends('layout.template')
@section('konten')

<nav class="navbar navbar-expand-lg mb-3 p-3 bg-body rounded shadow-sm">
    <div class="container-fluid">
      <a class="navbar-brand" href="/"><h1>{{ $user->name }}</h1></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0 gap-2">
          <li class="nav-item">
            <div class="dropdown">
                <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    {{ $user->name }}
                </button>
                <ul class="dropdown-menu">
                    @if(!$profile)
                        <li><a href="{{ route('profile.create') }}" class="dropdown-item border-bottom">Buat Profil</a></li>
                    @else
                        <li><a href="{{ route('profile.show') }}" class="dropdown-item border-bottom">Lihat Profile</a></li>
                    @endif
                    {{-- @if ($user->profile)
                        <form action="{{ route('profile.delete') }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger m-3">Hapus Profil</button>
                        </form>
                    @endif --}}
                </ul>
              </div>
          </li>
          <a href='{{ route('logout') }}' class="btn btn-danger">Logout</a>
      </div>
    </div>
  </nav>

  <section class="container">

    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <div class="bg-light rounded p-3 mb-3 d-flex align-items-center">
        <a href='{{ url('dashboard/create') }}' class="btn btn-primary">Buat Post</a>
        <p class="ms-auto fs-5 fw-bold">Jumlah Post {{ $jumlah }}</p>
    </div>
    <div class="row row-cols-lg-4 g-1">
        @foreach ($show as $item)
        <div class="col-6 mb-3">
            <div class="card">
                <img src="{{ $item->gambar }}" class="img-fluid rounded" style="height: 150px" alt="...">
                <div class="card-body">
                  <p class="card-title text-secondary">{{ $item->ekskul }}</p>
                  <p class="card-text fw-bold fs-5">{{ $item->judul }}</p>
                  <a href='{{url('dashboard/'.$item->id.'/edit')}}' class="btn btn-warning btn-sm text-white">Edit</a>
                  <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal">Hapus</button>
                  <form class="d-inline" action="{{url('dashboard/'.$item->id)}}" method="POST">
                      @csrf
                      @method('DELETE')
                        <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="deleteModalLabel">Konfirmasi Hapus Post</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Apakah Anda yakin ingin menghapus post ini?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                        <button type="submit" name="submit"  class="btn btn-danger">Hapus</button>
                                    </div>
                                </div>
                            </div>
                        </div>                    
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
  </section>
@endsection
