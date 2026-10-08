@extends('shared.master')

@section('content')
    <x-banner-summary mode="about.profile"></x-banner-summary>

    <section class="space-ptb background-sidoagung space-size-image-mobile">
        <div class="container">
            <div class="row justify-content-center mb-4 mb-md-5">
                <div class="row mt-180-article">
                    <div class="col text-center mb-2">
                        <a href="#" class="chevron-size">
                            <i class="fas fa-chevron-down"></i>
                        </a>
                        <h2 class="text-white">Sekilas Sido Agung Group</h2>
                    </div>
                </div>
                <div class="container">
                    <div class="text-left text-white rounded justify-content-center py-5 px-3  ">
                        <p class="mb-md-5 mb-2">
                            Usaha Sido Agung Group diawali dengan usaha peternakan ayam broiler yang didirikan oleh Liem
                            Chie An pada tahun 1982 di Magelang. Usaha peternakan ayam broiler yang awalnya berkapasitas 500
                            ekor saja, kemudian berkembang dengan pesat.
                            <br /><br />Usaha Liem Chie An kemudian berkembang menjadi usaha trading hasil peternakan pada
                            tahun 1988 dengan cakupan area Jawa-Bali dan Sumatera. Pada tahun 1995, Liem Chie An sebagai
                            founder dan pemilik melakukan kerjasama ekspansi dengan koleganya untuk mulai mengembangkan
                            usaha peternakan ayam broiler dan petelur di beberapa lokasi di Jawa Tengah dan Jawa Barat.
                            <br /><br />Untuk mendukung usaha peternakan ayam yang dijalankan, pada tahun 1998 bersama
                            beberapa koleganya Liem Chie An mengembangkan pabrik pakan ternak yang berlokasi di Sidoarjo dan
                            Pandaan dengan nama PT Panca Patriot Prima.
                            <br /><br />Seiring dengan terus berkembangnya jumlah populasi ayam baik broiler ataupun layer
                            yang dimilikinya, pada tahun 2015 Sido Agung Group kembali melakukan pengembangan usaha di
                            bidang pakan ternak dengan mendirikan pabrik pakan berkapasitas 20.000 ton/bulan di Cirebon
                            dengan nama Sido Agung Agro Prima, selain mengembangakan kapasitas layanan untuk lini budidaya
                            dan kemitraan, berdirinya pabrik ini juga menjadi penanda keseriusan group dalam mengembangkan
                            produk, formula terbaik untuk konsumennya.
                            <br /><br />Pada tahun 2017, Group usaha mulai mengembangkan hilir usaha dengan mengambil alih
                            sebuah Rumah Potong Hewan Unggas di Garut melalui PT Sido Agung Food Processing. Dengan demikian
                            Sido Agung Group melengkapi portofolio bisnisnya mulai dari hulu ke hilir.
                            <br /><br />Group usaha kemudian menambah kapasitas produksi pakan ternak lagi dengan mendirikan
                            pabrik pakan ternak, PT Sido Agung Farm di Magelang dengan kapasitas 20.000 ton/bulan, dengan
                            demikian total kapasitas produksi pakan group menjadi lebih dari 35.000 ton/bulan.
                            <br /><br /> Saat ini group usaha memiliki lebih dari 3.000 mitra peternak, mengelola 33 kantor
                            cabang kemitraan 5 Pabrik Pakan Ternak, 2 Rumah Potong Hewan Unggas dengan cakupan area layanan
                            dari Sumatera, Jawa, Bali, Lombok, Kalimantan dan Sulawesi.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @php

    $history = [
        ['year' => 1982, 'title' => 'Awal Pendirian', 'content' => 'Dimulai dengan  usaha peternakan ayam broiler yang didirikan oleh Liem Chie An pada tahun 1982 di Magelang, dengan kapasitas 500 ekor ayam.'],
        ['year' => 1988, 'title' => 'Ekspansi Usaha', 'content' => 'Memulai usaha trading kebutuhan dan hasil peternakan ayam dengan cakupan area pemasaran meliputi Jawa-Bali dan Sumatera.'],
        ['year' => 1995, 'title' => 'Ekspansi Usaha', 'content' => 'Pada tahun 1995 mengembangkan kapasitas peternakan ayam broiler dan petelur dan memperluas jangkauan layanan bekerjasama dengan Adi Rahman Adiwoso.'],
        ['year' => 1998, 'title' => 'Ekspansi Usaha', 'content' => 'Mengembangkan usaha Pakan ternak di Sidoarjo dan Pandaan untuk mulai mensupport lini usaha budi daya.'],
        ['year' => 2015, 'title' => 'Ekspansi Usaha', 'content' => 'Dengan terus berkembangnya jumlah populasi ayam broiler ataupun layer yang dimilikinya, pada tahun 2015 Sido Agung Group kembali melakukan pengembangan usaha di bidang pakan ternak dengan mendirikan pabrik di Cirebon dengan nama Sido Agung Agro Prima.'],
        ['year' => 2017, 'title' => 'Ekspansi Usaha', 'content' => 'Group Usaha mulai mengembangkan hilir usaha dengan mengambil alih sebuah Rumah Potong Hewan Unggas di Garut melalui PT. Sido Agung Food Processing.'],
        ['year' => 2019, 'title' => 'Ekspansi Usaha', 'content' => 'Group usaha kemudian menambah kapasitas produksi pakan ternak lagi pada tahun 2019 dengan mendirikan pabrik pakan ternak di Magelang dengan nama PT. Sido Agung Farm.'],
        ['year' => 2021, 'title' => 'Ekspansi Usaha', 'content' => 'Menambah kapasitas produksi hilir dengan mendirikan 1 Rumah Potong Hewan Unggas dan pabrik pengolahan produk unggas di kendal Jawa Tengah di bawah pengelolaan  PT Asia Pangan Utama.'],
    ];

    @endphp
    <section style="padding-bottom:100px; height:900px;" class="space-pt">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="section-title text-center">
                        <h2>Jejak Langkah</h2>
                        <p class="px-xl-5">Riwayat Singkat Sido Agung</p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="cd-horizontal-timeline">
                        <div class="timeline">
                            <div class="events-wrapper">
                                <div class="events">
                                    <ul>
                                        @foreach ($history as $h)
                                            @if ($loop->index == 0)
                                                <li>
                                                    <a href="#{{ $loop->index }}" data-date="01/01/{{ $h['year'] }}"
                                                        class="selected">{{ $h['year'] }}</a>
                                                </li>
                                            @else
                                                <li>
                                                    <a href="#{{ $loop->index }}"
                                                        data-date="01/01/{{ $h['year'] }}">{{ $h['year'] }}</a>
                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                    <span class="filling-line" aria-hidden="true"></span>
                                </div>
                            </div>

                            <ul class="cd-timeline-navigation">
                                <li>
                                    <a href="#0" class="prev inactive"></a>
                                </li>
                                <li>
                                    <a href="#0" class="next"></a>
                                </li>
                            </ul>

                        </div>

                        <div class="events-content" style="height: 600px!important;">
                            <ul style="margin-top:30px!important;">
                                @foreach ($history as $h)
                                    @if ($loop->index == 0)
                                        <li class="selected" data-date="01/01/{{ $h['year'] }}">
                                        @else
                                        <li data-date="01/01/{{ $h['year'] }}">
                                    @endif
                                    <div class="row mb-4">
                                        <div class="col-md-2">
                                            <h1 class="year">{{ $h['year'] }}</h1>
                                        </div>
                                        <div class="col-md-10">
                                            <div class="timeline-text">
                                                <h4
                                                    style="margin-top: 0pt; margin-bottom: 0pt; margin-left: 0in; direction: ltr; unicode-bidi: embed; word-break: normal;">
                                                    {{ $h['title'] }}</h4>
                                                <p
                                                    style="margin-top: 0pt; margin-bottom: 0pt; margin-left: 0in; direction: ltr; unicode-bidi: embed; word-break: normal;">
                                                    <br>
                                                </p>
                                                <p
                                                    style="margin-top: 0pt; margin-bottom: 0pt; margin-left: 0in; direction: ltr; unicode-bidi: embed; word-break: normal;">
                                                    {{ str_replace('Pt', 'PT', Str::headline($h['content'])) }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=================================
                            History -->
    {{-- <section class="background-sidoagung padding-10">
        <div class="container">
            <div class="row align-items-center bgreen-textupright">
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <img class="img-fluid image-radius-imageupright" src="{{ asset('images/getFile3f66.png') }}" alt="">
                </div>
                <div class="col-lg-6">
                    <p class="mb-4 text-primary">Certifications owned by the Company to support the business activities to
                        ensure the best quality product for its customers are amongst others Hazard Analysis and Critical
                        Control Point (HACCP) SAI Global related to Animal Feed Product, ISO 9001:2008 and SNI ISO 9001:2008
                        from Lloyd’s Register Quality Assurance, Veterinary Control Number (NKV) from Head of Animal
                        Husbandry Office of West Java Province, Certificate of Good Feedmill Process (CPPB) from Animal
                        Husbandry and Health General Directorate. <br />
                        <br /> One of the Company’s laboratory facility, Prolab Diagnotic Laboratory (“Prolab Jabon”) has
                        also obtained Accreditation Certificate from National Accreditacy Committee for the competency as
                        Testing Laboratory. This certification is manifestation of the Company’s effort to maintain and
                        improve our quality while also increase trust from the customers.
                    </p>
                </div>
            </div>
        </div>
    </section> --}}
    <section id="overview" class="bg-white">
        <div>
            <div class="row background-sidoagung-softgreen">
                <div class="col-lg-6">
                    <div class="pl-5 pt-5 pb-5">
                        <h3 class="text-white pt-2">Visi</h3>
                        <p class="text-primary text-justify">
                            Menjadi Group Usaha Peternakan Terintegrasi Terbaik Di Indonesia Yang Memiliki Pertumbuhan
                            Berkelanjutan, Berfokus Pada Usaha Pemberdayaan, Kemitraan Serta Pengembangan Dan Penyediaan
                            Produk Terbaik Untuk Masyarakat.
                        </p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="pl-5 pt-5 pb-5 pr-5">
                        <h3 class="text-white pt-2">Misi</h3>
                        <p class="text-primary">
                        <ul style="margin-left: -25px;">
                            <li class="text-primary text-justify">
                                Menciptakan Ekosistem Usaha Yang Memberikan Keuntungan Yang Luas Dan Berkelanjutan Bagi
                                Seluruh Stakeholder Perusahaan.
                            </li>
                            <li class="text-primary text-justify">
                                Mengedepankan Pengembangan Produk Terbaik Yang Relevan
                                Bagi Masyarakat Indonesia.
                            </li>
                            <li class="text-primary text-justify">
                                Membangun Jalur Distribusi Yang Efektif Dan Berkeadilan
                                Untuk Menghasilkan Kebermanfaatan Yang Lebih Optimal Bagi Mitra, Konsumen, Dan Perusahaan.
                            </li>
                            <li class="text-primary text-justify">
                                Menciptakan Sistem Dan Lingkungan Yang Baik Bagi Karyawan
                                Untuk Tumbuh Bersama, Profesional Dan Berkeadilan.
                            </li>
                        </ul>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="space-pt  ">
        <div class="container ">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <img class="img-fluid img-shadow-right" src="{{ asset('images/sag/manajemen/jabattangan.jpg') }}"
                        alt="">
                </div>
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <div class="container image-text-right-container">
                        <h3 class="mb-4">Bermitra Bersama Kami</h3>
                        <p class="mb-4">
                            Sido Agung Membuka Kesempatan Yang Luas Untuk Menjadi Mitra Peternak, Kami Menyediakan Dukungan Terbaik Melalui Pendampingan, Edukasi, Serta Produk Yang Berkualitas.
                        </p>
                        <a href="{{ route('we.be-our-partner') }}" class="btn btn-primary ">Bermitra Bersama</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- <section class="space-pb pt-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-9">
                    <div class="section-title text-center">
                        <h2>Nilai Perusahaan</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 mb-3 mb-md-0">
                    <div class="feature-info text-center">
                        <div class="feature-info-icon">
                            <img class="img-fluid center-block mx-auto list-service-image w-50"
                                src="{{ asset('images/consumer-icon.jpeg') }}" alt="">
                        </div>
                        <div class="feature-info-content">
                            <h3 class="mb-3 feature-info-title">Consumer Centric</h3>
                            <p class="mb-0 px-lg-5">Obsess with what are the consumer needs and their pain points in
                                dealing with us</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-3 mb-md-0">
                    <div class="feature-info text-center">
                        <div class="feature-info-icon">
                            <img class="img-fluid center-block mx-auto list-service-image w-50"
                                src="{{ asset('images/entrepreneurial-icon.jpeg') }}" alt="">
                        </div>
                        <div class="feature-info-content">
                            <h3 class="mb-3 feature-info-title">Entrepreneurial</h3>
                            <p class="mb-0 px-lg-5">- Seize opportunity and create breakthrough in the market <br /> -
                                High sense of ownership </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-3 mb-md-0">
                    <div class="feature-info text-center">
                        <div class="feature-info-icon">
                            <img class="img-fluid center-block mx-auto list-service-image w-50"
                                src="{{ asset('images/innovative-icon.jpeg') }}" alt="">
                        </div>
                        <div class="feature-info-content">
                            <h3 class="mb-3 feature-info-title">Innovative</h3>
                            <p class="mb-0 px-lg-5">- Looking for innovations, improvement in all fronts <br /> - Product
                                innovation, communication innovation, process innovation, and business model innovation </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-3 mb-md-0">
                    <div class="feature-info text-center">
                        <div class="feature-info-icon">
                            <img class="img-fluid center-block mx-auto list-service-image w-50"
                                src="{{ asset('images/action-oriented-icon.jpeg') }}" alt="">
                        </div>
                        <div class="feature-info-content">
                            <h3 class="mb-3 feature-info-title">Action Oriented</h3>
                            <p class="mb-0 px-lg-5">- Doing not debating <br /> - Proactive <br /> - Speed to action </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    {{-- <section class="non-pt">
        <div>
            <div class="row align-items-center">
                <div style="background-image: url('{{ asset('images/getFileabf3.png') }}');"
                    class="col-lg-6 image-detail-1 image-core-detail">
                    <div class="image-detail-box">
                        <div class="p-2 position-relative z-index-1">
                            <div
                                class="row d-lg-flex align-items-center justify-content-center pb-4 pb-md-5 padding-institution">
                                <div class="col-lg-6">
                                    <p class="imagetext-institution text-white text-center">Selengkapnya</p>
                                </div>
                                <div class="col-lg-6 ">
                                    <center>
                                        <a href="management" class="btn btn-primary btn-institution ">Manajemen</a>
                                    </center>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div style="background-image: url('{{ asset('images/getFile74b8.png') }}');"
                    class="col-lg-6 image-detail-1 image-core-detail">
                    <div class="image-detail-box">
                        <div class="p-2 position-relative z-index-1">
                            <div
                                class="row d-lg-flex align-items-center justify-content-center pb-4 pb-md-5 padding-institution">
                                <div class="col-lg-6">
                                    <p class="imagetext-institution text-white text-center">Selengkapnya</p>
                                </div>
                                <div class="col-lg-6 ">
                                    <center>
                                        <a href="corporate-structure" class="btn btn-primary btn-institution ">Struktur
                                            Perusahaan</a>
                                    </center>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <style>
                /*.image-detail-1:before {*/
                /*    background: rgb(8 118 208 / 47%);*/
                /*    content: "";*/
                /*    color: white;*/
                /*    height: 100%;*/
                /*    left: 0;*/
                /*    position: absolute;*/
                /*    top: 0;*/
                /*    width: 100%;*/
                /*    z-index: 0;*/
                /*}*/
                /*.image-detail-2:before {*/
                /*    background: rgb(255 162 0 / 47%);*/
                /*    content: "";*/
                /*    color: white;*/
                /*    height: 100%;*/
                /*    left: 0;*/
                /*    position: absolute;*/
                /*    top: 0;*/
                /*    width: 100%;*/
                /*    z-index: 0;*/
                /*}*/

            </style>
        </div>
    </section> --}}
@endsection
