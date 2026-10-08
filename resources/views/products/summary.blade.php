@extends('shared.master')

@section('content')
    <x-banner-summary mode="product"></x-banner-summary>

    <section class="space-ptb background-sidoagung">
        <div class="container">
            <div class="row justify-content-center ">
                <div class="col-lg-12 pb-lg-0">
                    <div class="section-title mb-3 pt-5">
                        <h2 class="text-white"> Produk Perusahaan</h2>
                    </div>
                    <p class="text-white">Sido Agung Group Menyediakan Produk dan Layanan Perunggasan Terintegrasi Mulai Dari
                        Layanan Kemitraan, Bibit Ayam, Pakan Ternak, Ayam Hidup serta Ayam Potong Berkualitas Tinggi.</p>
                </div>

            </div>
        </div>
    </section>

    <section class="space-pt ">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <div class="container image-text-left-container">
                        <h3 class="mb-4">Pakan Ternak</h3>
                        <p class="mb-4">
                            Group Usaha Memiliki Pabrik Pakan Ternak Di Cirebon Dan Magelang Yang Memproduksi Pakan Ayam
                            Pedaging, Pakan Ayam Petelur, Pakan Ayam Bibit, Dan Beberapa Jenis Pakan Lainnya. Selain Itu,
                            Pakan Ternak Mampu Diproduksi Dalam Bentuk Tepung, Pellet (Butitran), Crumble Dan Expander
                            Sesuai Dengan Kebutuhan Pasar.
                        </p>
                        <a href="{{ route('products.feed') }}" class="btn btn-primary ">Selengkapnya</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <img class="img-fluid img-shadow-left" src="{{ asset('images/sag/produk/pakan-framebox.jpeg') }}"
                        alt="">
                </div>
            </div>
        </div>
    </section>
    <section class="space-pt  ">
        <div class="container ">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <img class="img-fluid img-shadow-right" src="{{ asset('images/getFile2d43.jpeg') }}" alt="">
                </div>
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <div class="container image-text-right-container">
                        <h3 class="mb-4">Bibit Ayam Umur Sehari</h3>
                        <p class="mb-4">
                            Produk Day Old Chicken (Doc) Sido Agung Group Dibudidayakan Untuk Menghasilkan Produk Daging
                            Ayam Yang Berkualitas Tinggi Melalui Bibit Unggul Ayam Doc Pedaging Dan Bibit Ayam Doc Petelur.
                        </p>
                        <a href="{{ route('products.day-old-chick') }}" class="btn btn-primary ">Selengkapnya</a>
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
                        <h3 class="mb-4">Ayam Hidup Siap Potong</h3>
                        <p class="mb-4">
                            Sido Agung Group Memproduksi Ayam Hidup Siap Potong Berkualitas Baik Melalui Pembudidayaan Ayam
                            Pedaging Dengan Menggunakan Teknologi Biosecurity.
                        </p>
                        <a href="{{ route('products.live-bird') }}" class="btn btn-primary ">Selengkapnya</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <img class="img-fluid img-shadow-left" src="{{ asset('images/getFilea2d3.jpeg') }}" alt="">
                </div>
            </div>
        </div>
    </section>
    <section class="space-pt  ">
        <div class="container ">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <img class="img-fluid img-shadow-right" src="{{ asset('images/sag/produk/broiler-framebox.jpeg') }}"
                        alt="" style="height: 350px;">
                </div>
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <div class="container image-text-right-container">
                        <h3 class="mb-4">Ayam Potong</h3>
                        <p class="mb-4">
                            Produk Ayam Potong Yang Diproduksi Sido Agung Group Antara Lain Karkas Utuh Broiler Dan Boneless
                            Dada. Produk Ayam Potong Dipasarkan Melalui E-commerce Dan Offline Store.
                        </p>
                        <a href="{{ route('products.broilers') }}" class="btn btn-primary ">Selengkapnya</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
