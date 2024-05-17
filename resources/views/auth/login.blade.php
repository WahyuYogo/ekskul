@extends('layout.template')

@section('konten')
    <div class="container">
        <div class="w border rounded p-3 px-lg-5 mx-auto bg-light mt-5">
            <form action="{{ route('admin-login') }}" method="POST">
                @if ($errors->any())
                    <div class="pt-3">
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $item)
                                <li>{{ $item }}</li>
                            @endforeach
                        </div>
                    </div>
                @endif
                @if (Session::has('success'))
                    <div class="pt-3">
                        <div class="alert alert-success">
                            {{ Session::get('success') }}
                        </div>
                    </div>
                @endif
                @if (Session::has('failed'))
                    <div class="pt-3">
                        <div class="alert alert-danger">
                            {{ Session::get('failed') }}
                        </div>
                    </div>
                @endif
                <h1 class="fw-bold mb-4">Login</h1>
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label fw-bold text-dark">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}" class="form-control"
                        placeholder="contoh@gmail.com">
                </div>
                <label for="password" class="form-label fw-bold text-dark">Password</label>
                <div class="mb-3 position-relative">
                    <input type="password" name="password" class="form-control" id="passwordField"
                        placeholder="Masukkan Password">
                    <a type="button" class="btn position-absolute end-0 top-0" id="togglePassword"><i id="icon"
                            class="bi bi-eye-slash"></i></a>
                </div>
                <div class="mb-3 d-grid">
                    <button type="submit" class="btn btn-primary">LOGIN</button>
                </div>
            </form>
        </div>
    </div>
@endsection
