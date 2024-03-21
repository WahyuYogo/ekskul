@extends('layout.template')
@section('konten')
<div class="container-fluid" style="height: 150px; background-color:{{ $profils->warna }};"></div>
<div class="container position-relative pt-5">
<img src="{{ asset($profils->foto) }}" alt="" class="rounded-circle img-fluid position-absolute top-0 start-0 translate-middle-y" style="max-width: 150px">
<h1 class="fw-bold fs-2 my-3">{{ $profils->nama }}</h1>
<div class="bg-light rounded p-3 my-3">
    <h1 class="fs-4 fw-bold">Tujuan</h1>
    <p>{{ $profils->tujuan }}</p>
</div>
<div class="bg-light rounded p-3 my-3">
    <h1 class="fs-4 fw-bold">Keuntungan</h1>
    <p>{{ $profils->tujuan }}</p>
</div>
<a href='{{ route('user.index') }}' class="btn btn-danger">Kembali</a>
<a href="{{ route('profile.edit') }}" class="btn btn-primary">Edit Profile</a>
@endsection