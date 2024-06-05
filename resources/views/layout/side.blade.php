@extends('layout.template')
@section('konten')
    <style>
        #sidebar-container {
            width: 350px;
            height: 95vh;
        }
    </style>

    <div class="d-flex">
        <div class="bg-body sticky-top p-4 mt-3 ms-3 rounded" id="sidebar-container">
            <div class="list-group list-group-flush">
                <a href="{{ url('admin') }}" class="list-group-item list-group-item-action bg-body">Dashboard</a>
                <a href="{{ url('register') }}" class="list-group-item list-group-item-action bg-body">Tambah
                    Ekstrakulikuler</a>
                <a href="{{ route('logout') }}" class="list-group-item list-group-item-action bg-body">Logout</a>
            </div>
        </div>
        <div class="flex-grow-1 p-3">
            @yield('konten2')
        </div>
    </div>
@endsection
