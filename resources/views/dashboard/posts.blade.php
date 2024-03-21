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
    <form action='{{ route('dashboard.index') }}' method='post' enctype="multipart/form-data">
        @csrf
        <div class="my-3 p-3 bg-body rounded shadow-sm">
            <div class="mb-3 row">
                <label for="ekskul" class="col-form-label">Nama Ekstrakulikuler</label>
                <div class="col-sm-10">
                    <select class="form-control" id="ekskul" name="ekskul">
                        <option value="" disabled selected>Pilih Ekstrakulikuler</option>
                        @foreach ($category as $item)
                        <option value="{{$item->ekskul}}">{{$item->ekskul}}</option> 
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="gambar" class="col-form-label">Masukkan Gambar</label>
                <div class="col-sm-10">
                    <input type="file" class="form-control" name='gambar' id="gambar">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="judul" class="col-form-label">Deskripsi Post</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='judul' id="judul">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="jurusan" class="col-form-label"></label>
                <div class="col-sm-10"><a href="{{url('dashboard')}}" class="btn btn-danger me-3">KEMBALI</a><button type="submit" class="btn btn-primary" name="submit">SIMPAN</button></div>
            </div>
        </div>
    </form>
</div>
@endsection