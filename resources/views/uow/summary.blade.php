@extends('shared.master')

@section('content')
    <x-banner-summary mode="uow"></x-banner-summary>

    <section class="space-ptb background-sidoagung">
        <div class="container">
            <div class="row justify-content-center ">
                <div class="col-lg-12 pb-lg-0">
                    <div class="section-title mb-3 pt-5">
                        <h2 class="text-white"> Unit Usaha</h2>
                    </div>
                    <p class="text-white">
                        Sido Agung Group Merupakan Group Usaha Perunggasan Terintegrasi Yang Memiliki Unit-Unit Usaha Dengan
                        Spesialisasi Masing-Masing Dan Dalam Operasionalnya Selalu Bersinergi Dari Hulu Ke Hilir.
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
                        <h3 class="mb-4">PT. Sido Agung Agro Prima</h3>
                        <p class="mb-4">
                            PT Sido Agung Agro Prima Berdiri Pada Tahun 2015, Berkedudukan Di Kec. Pangenan, Kabupaten
                            Cirebon, Jawa Barat. PT Sido Agung Agro Prima Memiliki Pabrik Pakan Ternak Yang Berkapasitas
                            Produksi 20.000 Ton/Bulan.
                        </p>
                        <a href="{{ url('/business-unit/sidoagung-agro-prima') }}"
                            class="btn btn-primary ">Selengkapnya</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <img class="img-fluid img-shadow-left" src="{{ asset('images/sag/uow/sido-agung-agro-prima.jpg') }}"
                    style="width: 525px;"
                    alt="sidoagung-agro-prima">
                </div>
            </div>
        </div>
    </section>
    <section class="space-pt  ">
        <div class="container ">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <img class="img-fluid img-shadow-right" src="{{ asset('images/sag/uow/sido-agung-farm.jpg') }}"
                        alt="sido-agung-farm">
                </div>
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <div class="container image-text-right-container">
                        <h3 class="mb-4">PT. Sido Agung Farm</h3>
                        <p class="mb-4">
                            PT Sido Agung Farm Berdiri Pada Tahun 2019, Berkedudukan Di Kec. Tempuran,
                            Kab. Magelang, Jawa Tengah. Memiliki Kapasitas Produksi 20.000 Ton/bulan, Dengan Demikian Total
                            Kapasitas Produksi Pakan Group Usaha Menjadi Lebih Dari 35.000 Ton/bulan.
                        </p>
                        <a href="{{ url('/business-unit/sidoagung-farm') }}" class="btn btn-primary ">Selengkapnya</a>
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
                        <h3 class="mb-4">PT. Sido Sari Multifarm</h3>
                        <p class="mb-4">
                            PT Sido Sari Multifarm Berdiri Pada Tahun 2017, Berkedudukan Di Desa
                            Sindangsari, Kecamatan Luragung, Kabupaten Kuningan, Yang Bergerak Dalam Bidang Produksi Day Old
                            Chick (DOC). Saat Ini Memiliki Kapasitas Produksi Sekitar 170 Juta Ekor. Memiliki Area Pemasaran
                            Yang Cukup Luas Mulai Dari Sumatera, Kalimantan, Jawa Timur, Jawa Tengah, Dan Jawa Barat.
                        </p>
                        <a href="{{ url('/business-unit/sidosari-multi-farm') }}"
                            class="btn btn-primary ">Selengkapnya</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <img class="img-fluid img-shadow-left" src="{{ asset('images/sag/uow/sido-sari.jpg') }}"
                        alt="sidosari-multi-farm">
                </div>
            </div>
        </div>
    </section>

    <section class="space-pt  ">
        <div class="container ">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <img class="img-fluid img-shadow-right" src="{{ asset('images/sag/uow/asia-pangan.png') }}"
                        alt="asia-pangan-utama">
                </div>
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <div class="container image-text-right-container">
                        <h3 class="mb-4">PT. Asia Pangan Utama</h3>
                        <p class="mb-4">
                            PT Asia Pangan Utama Didirikan Pada Tahun 2021 Di Kendal, Jawa Tengah, Dengan Kapasitas
                            Pemotongan 6000 Ekor Per Jam. Saat Ini, PT Asia Pangan Utama Masih Dalam Proses Pembangunan Dan
                            Akan Mulai Beroperasi Semester Kedua Di Tahun 2022. PT Asia Pangan Utama Merupakan Grup Usaha
                            Yang Menghasilkan Produk-produk Unggas Yang Asuh (Aman, Sehat, Utuh, Halal).
                        </p>
                        <a href="{{ url('/business-unit/asia-pangan-utama') }}" class="btn btn-primary ">Selengkapnya</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
