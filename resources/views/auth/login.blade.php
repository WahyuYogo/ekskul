@extends('layout.template')

@section('konten')

    <div class="w-50 border rounded p-3 mx-auto bg-light mt-5">
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
                    <div class="alert alert-failed">
                        {{ Session::get('failed') }}
                    </div>
                </div>
            @endif
        <h1>Login</h1>
        @csrf
        <div class="mb-3">
            <label for="email" class="form-label">Masukkan Email</label>
            <input type="email" name="email" value="{{ old('email') }}" class="form-control">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Masukkan Password</label>
            <input type="password" name="password" class="form-control">
        </div>
        <div class="mb-3 d-grid">
            <button type="submit" class="btn btn-primary">LOGIN</button>
        </div>
        </form>
    </div>
@endsection