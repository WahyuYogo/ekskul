@extends('layout.template')
@extends('layout.navbar')

@section('konten')
    <section>
        <div class="container-fluid bg-warning" style="height: 150px"></div>
        <div class="container position-relative pt-5">
            <img src="{{ asset('images/page/jurnalistik.png') }}" alt="" class="rounded-circle img-fluid position-absolute top-0 start-0 translate-middle-y" style="max-width: 150px">
            <h1 class="fw-bold fs-2 my-3">Jurnalistik</h1>
            <div class="bg-light rounded p-3 my-3">
                <h1 class="fs-4 fw-bold">Tujuan</h1>
                <p>meningkatkan keyakinan, keimanan, penghayatan, dan pengamalan siswa tentang pengetahuan agama Islam sehingga menjadi manusia muslim yang beriman dan bertakwa kepada Allah S.W.T.</p>
            </div>
            <div class="bg-light rounded p-3 my-3">
                <h1 class="fs-4 fw-bold">Keuntungan</h1>
                <p>Dengan mengikuti IRMAS, diharapkan dapat meminimalisir kenakalan pada remaja, dan setidaknya mereka tahu cara seperti apa yang harus ditempuh untuk menyempurnakan akhlaknya.</p>
            </div>
        </div>
    </section>
@endsection