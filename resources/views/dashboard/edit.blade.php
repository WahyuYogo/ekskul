@extends('layout.template')
@section('konten')
@if ($errors->any())
<div class="pt-3">
    <div class="alert alert-danger">
        @foreach ($errors->all() as $item)
            <li>{{ $item }}</li>
        @endforeach
    </div>
</div>
    
@endif
<div class="container">
    <form action='{{ url('dashboard', $data->id) }}' method='post' enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="my-3 p-3 bg-body rounded shadow-sm">
            <div class="mb-3 row">
                <label for="ekskul" class="col-form-label">Nama Ekstrakulikuler</label>
                <div class="col-sm-10">
                    <select class="form-control" id="ekskul" name="ekskul">
                        <option value="" disabled selected>Pilih Ulang Ekstrakulikuler</option>
                        <option value="osis">Osis</option>
                        <option value="pramuka">Pramuka</option>
                        <option value="voli">Voli</option>
                    </select>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="gambar" class="col-form-label">Masukkan Kembali Gambar</label>
                <div class="col-sm-10">
                    <input type="file" class="form-control" name='gambar' value="{{$data->gambar}}" id="gambar">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="judul" class="col-form-label">Judul Post</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='judul' value="{{$data->judul}}" id="judul">
                </div>
            </div>
            <div class="mb-3 row">
                <div class="col-sm-10"><a href="{{url('dashboard')}}" class="btn btn-danger me-3">KEMBALI</a><button type="submit" class="btn btn-primary" name="submit">SIMPAN</button></div>
            </div>
        </div>
    </form>
</div>
@endsection