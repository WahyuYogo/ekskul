@extends('layout.side')
@section('konten2')
    @if (Session::has('success'))
        <div class="pt-3 container">
            <div class="alert alert-success">
                {{ Session::get('success') }}
            </div>
        </div>
    @endif
    <div class="container">
        <nav class="navbar navbar-expand-lg my-3 p-3 bg-body rounded shadow-sm">
            <div class="container-fluid">
                <a class="navbar-brand" href="/">
                    <h1>DASHBOARD</h1>
                </a>
            </div>
        </nav>

        <div class="bg-light rounded p-3 shadow-sm">
            <h2>Daftar Moderator</h2>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>
                                <div class="row row-cols-lg-2 g-2">
                                    <div class="col d-grid">
                                        <a href="{{ route('admin.edit_password', $user->id) }}"
                                            class="btn btn-primary btn-sm text-light">Edit Password</a>
                                    </div>
                                    {{-- @if ($user->suspended)
                                        <form class="col d-grid" action="{{ route('admin.users.unsuspend', $user->id) }}"
                                            method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-success btn-sm text-light"><i
                                                    class="bi bi-lightbulb"></i> Aktifkan</button>
                                        </form>
                                    @else
                                        <form class="col d-grid" action="{{ route('admin.users.suspend', $user->id) }}"
                                            method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-sm text-light"><i
                                                    class="bi bi-exclamation-circle"></i> Berhentikan</button>
                                        </form>
                                    @endif --}}
                                    {{-- <div class="col d-grid">
                                        <button type="submit" class="btn btn-danger btn-sm text-light"
                                            data-bs-toggle="modal" data-bs-target="#{{ $user->id }}"><i
                                                class="bi bi-ban"></i> Banned</button>
                                    </div> --}}
                                </div>

                                <form class="d-inline" action="{{ route('admin.delete_account', $user->id) }}"
                                    method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <div class="modal fade" id="{{ $user->id }}" tabindex="-1"
                                        aria-labelledby="modalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5>Banned Akun?</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Apakah Anda yakin ingin Banned Akun ini?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Batal</button>
                                                    <button type="submit" name="submit"
                                                        class="btn btn-danger">Hapus</button>
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
