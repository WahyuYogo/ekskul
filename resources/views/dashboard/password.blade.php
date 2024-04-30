@extends('layout.template')
@section('konten')
<div class="pt-3">
    <div class="alert alert-danger">
        @foreach ($errors->all() as $item)
            <li>{{ $item }}</li>
        @endforeach
    </div>
</div>

<div class="w-50 border rounded p-3 mx-auto bg-light mt-5 p-5">
    <form action="{{ route('admin.update_password', $user->id) }}" method="POST">
       @csrf
       @method('PUT')
       <h3 class="text-center">Halo <span class="text-warning">{{ $user->name }}</span></h3>
       <h3 class="text-center fs-6 fst-normal mb-3">Silahkan Masukkan Password Baru Anda</h3>
       <div class="mb-3">
           <label for="password" class="form-label">Password</label>
           <input class="form-control" type="password" name="password" id="password" required>
       </div>

       <div class="mb-3">
           <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
           <input class="form-control" type="password" name="password_confirmation" id="password_confirmation" required>
       </div>
       <div class="d-grid">
           <button type="submit" class="btn btn-primary d-grid">Perbarui</button>
       </div>
    </form>
</div>
@endsection
