@extends('shared.master')

@section('content')
    <x-banner-summary mode="about"></x-banner-summary>

    <section class="space-ptb background-sidoagung">
        <div class="container">
            <div class="row justify-content-center ">
                <div class="col-lg-12 pb-lg-0">
                    <div class="section-title mb-3 pt-5">
                        <h2 class="text-white">Profil Perusahaan</h2>
                    </div>
                    <p class="text-white">Sido Agung Group Merupakan Grup Usaha Perunggasan Terintegrasi Yang Memiliki Lini
                        Usaha Dari Hulu Ke Hilir, Mulai Dari Produksi DOC (Day Old Chick), Pakan Ternak, Pembudidayaan Ayam
                        Broiler Dan Ayam Petelur Hingga Produksi Daging Ayam Beku Dalam Bentuk Karkas Dan Produk Turunan.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="space-pt ">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <div class="container image-text-left-container">
                        <h3 class="mb-4">Profil Sido Agung Group</h3>
                        <p class="mb-4">
                            Usaha Sido Agung Group Diawali Dengan Usaha Peternakan Ayam Broiler Yang Didirikan Oleh Liem
                            Chie An Pada Tahun 1982 Di Magelang. Usaha Peternakan Ayam Broiler Yang Awalnya Berkapasitas 500
                            Ekor Saja, Kemudian Berkembang Dengan Pesat.
                        </p>
                        <a href="{{ route('about-us.profile') }}" class="btn btn-primary ">Selengkapnya</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <img class="img-fluid img-shadow-left" src="{{ asset('images/sag/about/profile.jpg') }}"
                        alt="" style="height: 450px;">
                </div>
            </div>
        </div>
    </section>
    <section class="space-pt  ">
        <div class="container ">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <img class="img-fluid img-shadow-right" src="{{ asset('images/sag/about/manajemen.jpg') }}"
                        alt="">
                </div>
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <div class="container image-text-right-container">
                        <h3 class="mb-4">Manajemen</h3>
                        <p class="mb-4">
                            Grup Usaha Sido Agung Dikelola Secara Profesional Dan Bertanggung Jawab. Manajemen Kami
                            Merupakan Pribadi Yang Kompeten Serta Berpengalaman Dalam Bidang Yang Relevan.
                        </p>
                        <a href="{{ route('about-us.management') }}" class="btn btn-primary ">Selengkapnya</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="space-pt ">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <div class="container image-text-left-container">
                        <h3 class="mb-4">Struktur Korporasi</h3>
                        <p class="mb-4">
                            Grup Usaha Sido Agung Merupakan Grup Usaha Perunggasan Terintegrasi Dengan Unit-unit Usaha Yang
                            Saling Melengkapi Dan Besinergi Satu Sama Lain, Yang Di Dalamnya Terdapat PT. Sido Agung Agro
                            Prima, PT. Sidoagung Foods Processing, PT. Sido Agung Farm, Dan PT. Sidosari Multi Farm Yang
                            Bertujuan Memenuhi Kebutuhan Pakan Ternak Dan Produk Ayam Untuk Masyarakat.
                        </p>
                        <a href="{{ route('about-us.corporate-structure') }}" class="btn btn-primary ">Selengkapnya</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <img class="img-fluid img-shadow-left" src="{{ asset('images/sag/about/corporate.jpg') }}"
                        alt="">
                </div>
            </div>
        </div>
    </section>
@endsection
