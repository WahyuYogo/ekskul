@extends('layout.template')
@section('konten')
    <div class="position-relative">
        <a href='{{ $profils->link }}' class="btn instagram px-2 py-0 position-absolute top-0 end-0 mt-4 me-3"><i
                class="bi bi-instagram fs-3"></i></a>
        <div style="height: 150px; background-color:{{ $profils->warna }};"></div>
        <div class="container position-relative pt-4">
            <img src="{{ asset($profils->foto) }}" alt=""
                class="ms-2 rounded-circle img-fluid position-absolute top-0 start-0 translate-middle-y"
                style="max-height: 120px; max-width: 120px;">
            <h1 class="fw-bold fs-2 mb-3 mt-5">{{ $profils->nama }}</h1>
            <div class="bg-light rounded p-3 my-3">
                <h1 class="fs-4 fw-bold">Tujuan</h1>
                <p>{{ $profils->tujuan }}</p>
            </div>
            <div class="bg-light rounded p-3 my-3">
                <h1 class="fs-4 fw-bold">Keuntungan</h1>
                <p>{{ $profils->keuntungan }}</p>
            </div>
            <a href='{{ route('user.index') }}' class="btn btn-danger">Kembali</a>
            <a href="{{ route('profile.edit') }}" class="btn btn-primary">Edit Profile</a>
        </div>
    @endsection
