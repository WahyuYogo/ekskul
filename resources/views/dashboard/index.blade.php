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
                <div class="dropdown d-grid">
                    <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Admin
                    </button>
                    <ul class="dropdown-menu">
                      <li><a href='{{ url('register') }}' class="dropdown-item">Tambah Ekskul</a></li>
                    </ul>
                  </div>
              </li>
              <li class="nav-item d-grid">
                <a href='{{ route('logout') }}' class="btn btn-danger">Logout</a>
              </li>
          </div>
        </div>
      </nav>

    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <h3>Daftar Post</h3>
    </div>

      <div class="row row-cols-lg-3 g-1">
        @foreach ($posts as $item)
        <div class="col-6 mb-3">
            <div class="card">
                <img src="{{ $item->gambar }}" class="img-fluid rounded object-fit-cover" style="height: 150px" alt="...">
                <div class="card-body">
                  <p class="card-title text-secondary">{{ $item->ekskul }}</p>
                  <p class="card-text fw-bold fs-5">{{ $item->judul }}</p>
                  <a href='{{url('dashboard/'.$item->id.'/edit')}}' class="btn btn-warning btn-sm text-white">Edit</a>
                  <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#{{ $item->id }}">Hapus</button>
                  <form class="d-inline" action="{{url('dashboard/'.$item->id)}}" method="POST">
                      @csrf
                      @method('DELETE')
                        <div class="modal fade" id="{{ $item->id }}" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5>Hapus Post?</h5>
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
            <div class="mt-3">
                {{ $posts->links() }}
            </div>
        </div>
        @endforeach
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
                              <button type="submit" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#{{ $user->id }}">Hapus Akun</button>
                              <form class="d-inline" action="{{ route('admin.delete_account', $user->id) }}" method="POST">
                                  @csrf
                                  @method('DELETE')
                                  <div class="modal fade" id="{{ $user->id }}" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5>Hapus Akun?</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Apakah Anda yakin ingin menghapus Akun ini?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                <button type="submit" name="submit"  class="btn btn-danger">Hapus</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                              </form>
                          </td>
                      </tr>
                  @endforeach
              </tbody>
          </table>
      </div>
</div>


@endsection
