@extends('layout.template')
@section('konten')
@if (Session::has('success'))
    <div class="pt-3">
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>
    </div>
@endif
<div class="container">
    <nav class="navbar navbar-expand-lg my-3 p-3 bg-body rounded shadow-sm">
        <div class="container-fluid">
          <a class="navbar-brand" href="/"><h1>DASHBOARD</h1></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 gap-2">
              <li class="nav-item">
                <div class="dropdown">
                    <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Admin
                    </button>
                    <ul class="dropdown-menu">
                      <li><a href='{{ url('dashboard/create') }}' class="dropdown-item">Buat Post</a></li>
                      <li><a href='{{ url('register') }}' class="dropdown-item">Tambah Ekskul</a></li>
                    </ul>
                  </div>
              </li>
              <li class="nav-item">
                <a href='{{ route('logout') }}' class="btn btn-danger">Logout</a>
              </li>
          </div>
        </div>
      </nav>

        <div class="my-3 p-3 bg-body rounded shadow-sm">
            <div class="pb-3">
                <form action="{{ route('posts.filter') }}" method="GET">
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary my-3">Tampilkan Post</button>
                    </div>
                </form>
            </div>
    
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th class="col-md-3">Gambar</th>
                        <th class="col-md-4">Ekstrakulikuler</th>
                        <th class="col-md-2">Deskripsi</th>
                        <th class="col-md-2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                    <tr>
                        <td><img src="{{$post->gambar}}" class="img-thumbnail" alt=""></td>
                        <td>{{$post->ekskul}}</td>
                        <td>{{$post->judul}}</td>
                        <td>
                            <a href='{{url('dashboard/'.$post->id.'/edit')}}' class="btn btn-warning btn-sm text-white">Edit</a>
                            <form class="d-inline" action="{{url('dashboard/'.$post->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" name="submit" class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>    
                    {{-- {{$post->links()}} --}}
                    @endforeach
                </tbody>
            </table>
      </div>
      <div class="bg-light rounded p-3 shadow-sm">
          <h2>Daftar Akun Pengguna</h2>
          
          <table class="table table-striped">
              <thead>
                  <tr>
                      <th>Nama</th>
                      <th>Aksi</th>
                  </tr>
              </thead>
              <tbody>
                  @foreach($users as $user)
                      <tr>
                          <td>{{ $user->name }}</td>
                          <td>
                              <a href="{{ route('admin.edit_password', $user->id) }}" class="btn btn-primary btn-sm">Edit Password</a>
                              <form class="d-inline" action="{{ route('admin.delete_account', $user->id) }}" method="POST">
                                  @csrf
                                  @method('DELETE')
                                  <button type="submit" class="btn btn-danger btn-sm">Hapus Akun</button>
                              </form>
                          </td>
                      </tr>
                  @endforeach
              </tbody>
          </table>
      </div>
</div>


@endsection
