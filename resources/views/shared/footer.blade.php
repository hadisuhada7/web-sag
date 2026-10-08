<footer class="footer space-pt">
    <div class="footer-pad">
    <div class="row">
        <div class="col-lg-3 col-md-12">
            <div class="footer-contact-info">
                <a href="{{url("")}}">
                    <img class="img-fluid mb-4" src="{{ asset('images/sag/logo-text.png') }}" alt="logo" style="width: 200px;">
                </a>
				{{-- 

                <p class="mb-2 mb-sm-4">Jl. Letjen S. Parman Ruko Garden Shopping Arcade Madison Park Unit 9 CE Central Park, Grogol, Tanjung Duren, Jakarta Barat 
                </p>
				--}}
				<p class="mb-2 mb-sm-4">JLN. AIP KS TUBUN IIC NO.30, SLIPI, PALMERAH, JAKARTA BARAT 11410</p>
                {{-- <h4 class="mb-2 mb-sm-4 contactus-text font-weight-bold"><a href="tel:+622150991599">+62 21 1234 5678</a></h4>
                <a class="contactus-text" href="fax:+622127083636"><i class="fas fa-fax"></i> +62 21 1234 5678</a><br> --}}
                <a class="contactus-text" href="mailto:info@sidoagunggroup.com"><i class="fas fa-mail-bulk"></i> info@sidoagunggroup.com</a><br>
                <a class="contactus-text" href="https://maps.app.goo.gl/RoL5cEp44aD72ipa8" target="blank"><i class="fas fa-map-marker-alt"></i> Find Us</a>
                <br>
                <a href="{{route('we.summary')}}" class="btn btn-primary mt-2 mb-5">
                    <img src="{{ asset('images/icon%20footer-02.png')}}" style="height:30px;"> Hubungi Kami 
                </a>
            </div>
        </div>
        <div class="row hidden-footer-mobile col-lg-9">
            <div class="col-lg-2 col-md-6 mt-4 ml-3 pt-4 mt-lg-0">
                <h5 style="font-size:18px;" class="text-primary mb-2 mb-sm-4">Tentang Kami</h5>
                <div class="footer-link">
                <ul class="list-unstyled mb-0">
                    <li><a href="{{route('about-us.summary')}}">Summary</a></li>
                    <li><a href="{{route('about-us.profile')}}">Profil Pesusahaan</a></li>
                    <li><a href="{{route('about-us.management')}}">Manajemen</a></li>
                    <li><a href="{{route('about-us.corporate-structure')}}">Struktur Korporasi</a></li>
                </ul>
                </div>
            </div>
            <div class="col-lg-2 col-md-6 mt-4 ml-3 pt-4 mt-lg-0">
                <h5 style="font-size:18px;" class="text-primary mb-2 mb-sm-4">Unit Usaha</h5>
                <div class="footer-link">
                <ul class="list-unstyled mb-0">
                    <li><a href="{{url('/business-unit')}}">Summary</a></li>
                    <!-- <li><a href="{{url('/business-unit/sidoagung-agro-prima')}}">PT. Sido Agung Agro Prima</a></li> -->
                    <li><a href="{{url('/business-unit/sidoagung-farm')}}">PT. Sido Agung Farm</a></li>
                    <li><a href="{{url('/business-unit/sidosari-multi-farm')}}">PT. Sido Sari Multifarm</a></li>
                    <!-- <li><a href="{{url('/business-unit/asia-pangan-utama')}}">PT. Asia Pangan Utama</a></li> -->
                    <!-- <li><a href="{{url('/business-unit/sidoagung-food')}}">Sidoagung Foods Processing</a></li> -->
                </ul>
                </div>
            </div>
            <div class="col-lg-2 col-md-6 mt-4 ml-3 pt-4 mt-lg-0">
                <h5 style="font-size:18px;" class="text-primary mb-2 mb-sm-4">Produk</h5>
                <div class="footer-link">
                <ul class="list-unstyled mb-0">
                    <li><a href="{{route('products.summary')}}">Summary</a></li>
                    <li><a href="{{route('products.feed')}}">Pakan Ternak</a></li>
                    <li><a href="{{route('products.day-old-chick')}}">Bibit Anak Ayam</a></li>
                    <li><a href="{{route('products.live-bird')}}">Ayam Hidup</a></li>
                    <li><a href="{{route('products.broilers')}}">Ayam Potong</a></li>
                </ul>
                </div>
            </div>
            <div class="col-lg-2 col-md-6 mt-4 ml-3 pt-4 mt-lg-0">
                <h5 style="font-size:18px;" class="text-primary mb-2 mb-sm-4">CSR</h5>
                <div class="footer-link">
                <ul class="list-unstyled mb-0">
                    <li><a href="{{route('csr.summary')}}">Summary</a></li>
                    <li><a href="{{route('csr.education')}}">Pendidikan</a></li>
                    <li><a href="{{route('csr.safety')}}">Keselamatan Kerja</a></li>
                    <li><a href="{{route('csr.sosial')}}">Sosial</a></li>
                </ul>
                </div>
            </div>
            <div class="col-lg-2 col-md-6 mt-4 ml-3 pt-4 mt-lg-0">
                <h5 style="font-size:18px;" class="text-primary mb-2 mb-sm-4">Lainnya</h5>
                <div class="footer-link">
                <ul class="list-unstyled mb-0">
                    <li><a href="{{route('csr.news')}}">Berita</a></li>
                    <li><a href="{{route('we.career')}}">Karir</a></li>
                    <li><a href="{{route('we.summary')}}">Hubungi Kami</a></li>
                </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mt-4 ml-3 pt-4 mt-lg-0">
                <h5 style="font-size:18px;" class="text-primary mb-2 mb-sm-4">Temui Kami</h5>
                <div class="footer-link">
                    <ul class="list-unstyled mb-0 social-icon">
                        <li style="margin-right:15px;">
                            <a href="https://www.linkedin.com/in/sido-agung-group-01408922b">
                                <i class="fab fa-linkedin-in" style="font-size: 20px;"></i>
                            </a>
                        </li>
                        <li style="margin-right:15px;">
                            <a href="https://www.instagram.com/sidoagunggroup_">
                                <i class="fab fa-instagram" style="font-size: 20px;"></i>
                            </a>
                        </li>
                        <li style="margin-right:15px;">
                            <a href="https://www.facebook.com">
                                <i class="fab fa-facebook-f" style="font-size: 20px;"></i>
                            </a>
                        </li>
                        <li style="margin-right:15px;">
                            <a href="https://www.youtube.com/channel/UCqVPZz_ZvCRW9tNvzprSrbQ/videos">
                                <i class="fab fa-youtube" style="font-size: 20px;"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    </div>
    <div class="footer-bottom hidden-footer-mobile  py-4">
    <div class="footer-pad">
        <div class="row ">
            <div class="col-lg-8 text-center text-lg-left mb-3 mb-lg-0">
                &nbsp;
            </div>
            <div class="col-lg-4 text-center text-lg-right">
                <p class="mb-0">©Copyright {{ now()->year }} <a href="{{url("")}}"> PT. Sido Agung Group</a><br> All Rights
                Reserved.
                </p>
            </div>
        </div>
    </div>
    </div>
</footer>