@extends('shared.master')

@section('content')
<x-banner-summary mode="product.ayampotong"></x-banner-summary>
<section class="space-ptb background-sidoagung">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-12 mb-4 mb-lg-0">
        <div class="section-title pt-5">
          <h2 class="mb-3 text-white">Ayam Potong</h2>
          <p class="text-white">
            Produk Ayam Potong Yang Diproduksi Sido Agung Group Antara Lain Karkas Utuh Broiler Dan Boneless Dada. Sido Agung Group Saat Ini Memiliki Kapasitas Produksi 6.000 Ekor Per Jam Dengan Cakupan Area Pemasaran Jawa, Bali, Lombok, Sumatera, Kalimantan dan Sulawesi.
          </p>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Product List -->
<section id="productlist" class="space-ptb bg-light">
  <div class="container">
    <div id="productsect" class="row bg-white">
      <div class="col-md-12">
        <!-- owl carousel -->
        <div class="owl-carousel text-left" data-nav-arrow="true" data-nav-dots="true" data-items="1" data-md-items="1" data-sm-items="1" data-xs-items="1" data-xx-items="1">
          @foreach ($list as $products)
            <div class="items">              
              <section class=" bg-white">
                <div class="container">
                  <div class="row justify-content-center">
                    @foreach ($products as $p)
                      <div onclick="openForm('{{encrypt($p->id)}}')" class="col-lg-3 col-md-6 text-center mobile-product mb-4">
                        <div class="p-2 d-inline-block border-radius bg-product p-3 ">
                          <div class="product-imagego" style="background: url('{{ route('main.getResource', ['id' => $p->mediaId]) }}');"></div>
                          <br>
                          <a href="javascript:void(0);" onclick="openForm('{{encrypt($p->id)}}')" class="mb-4 mt-3 product-text">{{ $p->title}}</a>
                          <br>
                          <small>{{$p->description}}</small>
                        </div>
                      </div>
                    @endforeach
                  </div>
                </div>
              </section>
            </div>
          @endforeach 
        </div>
      </div>
    </div>
  </div>
</section>
<!-- End Product List -->
@include('products.modals')

<section class="space-ptb">
  <div class="col-lg-12">
      <div class="section-title text-center text-dark">
          <h2>Testimoni</h2>
      </div>
  </div>
  <div class="container ">
      <div class="row justify-content-center">
          <x-our-partner></x-our-partner>
      </div>
  </div>
</section>

@include('products.our-products')
@endsection

@include("products.modal-order")

@section('script')

@endsection