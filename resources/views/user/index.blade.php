@extends('layout.template')
@section('konten')

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
<h1>Profil {{ $user->name }}</h1>

<p>Nama: {{ $user->name }}</p>
<p>Email: {{ $user->email }}</p>
<a href='{{ route('logout') }}' class="btn btn-danger">Logout</a>
@if(!$profile)
    <a href="{{ route('profile.create') }}" class="btn btn-primary">Buat Profil</a>
@else
    <a href="{{ route('profile.show') }}" class="btn btn-primary">Lihat Profile</a>
@endif
@if ($user->profile)
    <form action="{{ route('profile.delete') }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Hapus Profil</button>
    </form>
@endif
@endsection
