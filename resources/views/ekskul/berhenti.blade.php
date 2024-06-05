@extends('layout.template')
@extends('layout.navbar')

@section('konten')
@section('navbar')
    <div class="position-relative mb-5">
        <div class="container-fluid" style="height: 150px; background-color:{{ $profils->warna }};"></div>
        <div class="container position-relative pt-5">
            <h1 class="fw-bold fs-2 mb-3 mt-3 text-center">{{ $profils->nama }}</h1>
            <h1 class="bg-danger-subtle text senter py-3 rounded text-center my-5">Ekstrakulikuler Ini Telah Berhenti
                Beroperasi
            </h1>
            <img src="{{ asset($profils->foto) }}" alt=""
                class="rounded-circle img-fluid position-absolute top-0 start-50 translate-middle"
                style="max-height: 120px; max-width: 120px;">
            {{-- <div class="bg-light rounded p-3 my-3">
                <h1 class="fs-4 fw-bold">Tujuan</h1>
                <p>{{ $profils->tujuan }}</p>
            </div>
            <div class="bg-light rounded p-3 my-3">
                <h1 class="fs-4 fw-bold">Keuntungan</h1>
                <p>{{ $profils->keuntungan }}</p>
            </div> --}}
        </div>
        @if (!empty($profils->link))
            <a href="{{ $profils->link }}" target="_blank"
                class="btn bg-light px-2 py-2 position-absolute top-0 end-0 mt-4 me-3">
                <i class="bi bi-instagram fs-3"></i>
            </a>
        @endif

        <a href='{{ url('/') }}' class="btn position-absolute top-0 start-0 mt-3 ms-3"><i
                class="bi bi-arrow-left-square-fill fs-1 text-light"></i></a>
    </div>
@endsection
