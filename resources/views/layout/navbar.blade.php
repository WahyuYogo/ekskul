<link href="{{ asset('css/styles.css') }}" rel="stylesheet">
<style>
    .color {
        background-color: #001F49;
    }
</style>

<nav class="navbar navbar-expand-lg color sticky-top">
    <div class="container-fluid">
        @cannot('user_dashboard')
            <a class="navbar-brand ms-2" href="/"><img src="{{ asset('images/logo/logo.png') }}" style="max-width: 50px"
                    alt=""></a>
        @endcannot
        @can('user_dashboard')
            <a href="{{ url('users') }}" class="btn btn-outline-info px-4 py-1 fw-bold">
                <i class="bi bi-person-fill"></i> Profil
                {{-- <img src="{{ asset($profiles->foto) }}" alt="" class="rounded-circle img-fluid border" style="max-width: 50px"> --}}
            </a>
        @endcan
        <button class="btn navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <i class="bi bi-list fs-1 text-light"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 text-center">
                <li class="nav-item">
                    <a class="nav-link text-white py-3 mx-2 fw-bold active" aria-current="page"
                        href="/">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white py-3 mx-2 fw-bold" href="{{ route('ekskul.lihatekskul') }}">Ekskul</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white py-3 mx-2 fw-bold" href="{{ route('ekskul.lihatpost') }}">Terbaru</a>
                </li>
                <li class="nav-item align-self-center">
                </li>
        </div>
    </div>
</nav>

@yield('navbar')

<footer class="color px-5">
    <div class="row text-white">
        <div class="col-lg-4 mt-5 text-center">
            <a href="/">
                <img src="{{ asset('images/logo/logo.png') }}" class="img-fluid mb-2" alt=""
                    style="max-width: 50px">
                <h2 class="text-white ms-2 fs-3 d-lg-inline">SMKN 1 BANGSRI</h2>
            </a>
        </div>
        <div class="col-lg-2 mt-5 offset-lg-2">
            <h1 class="fs-3 mb-3">Halaman</h1>
            <a href="{{ url('/') }}" class="nav-link fs-6 mb-2">Beranda</a>
            <a href="{{ route('ekskul.lihatekskul') }}" class="nav-link fs-6 mb-2">Ekstrakulikuler</a>
            <a href="{{ route('ekskul.lihatpost') }}" class="nav-link fs-6 mb-2">Kegiatan</a>
        </div>
        <div class="col-lg-4 mt-5">
            <h2 class="mb-3 fs-3">Hubungi Kami</h2>
            <a href="https://maps.app.goo.gl/GAndwEZDSmuEU7vh6" target="_blank" class="nav-link fs-6">Alamat: JL. KH.
                Achmad Fauzan No. 17 Bangsri Jepara</a>
        </div>
        <h3 class="text-center fs-6 mt-5">© TEFA SMKN 1 BANGSRI</h3>
    </div>
</footer>
