<header class="header sticky">
    <nav class="navbar bg-white navbar-static-top navbar-expand-lg">
    <div class="container-fluid">
        <button type="button" class="navbar-toggler right-up-collapse" data-trigger="#navbar_main" style="right: 25px!important"><i
            class="fas fa-align-left"></i>
        </button>
        {{-- <a href="#" onclick="openSearch()" class="navbar-toggler">
            <i style="color:#008641;" class="fas fa-search"></i>
        </a>       --}}
        <a class="navbar-brand" href="{{url("")}}">
            <img class="img-fluid" src="{{ asset('images/sag/logo-text.png') }}" alt="logo">
        </a>
        <div class="navbar-collapse collapse" id="navbar_main">
            <ul class="nav navbar-nav ml-auto mr-5">
                <li class="nav-item dropdown ">
                    <a class="nav-link" href="{{route('about-us.summary')}}" id="navbarDropdown" aria-haspopup="true"
                        aria-expanded="false">Tentang Kami</a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="{{route('about-us.profile')}}">Profil Perusahaan</a></li>
                        <li><a class="dropdown-item" href="{{route('about-us.management')}}">Manajemen</a></li>
                        <li><a class="dropdown-item" href="{{route('about-us.corporate-structure')}}">Struktur Korporasi</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown ">
                    <a class="nav-link" href="{{ url('/business-unit')}}" id="navbarDropdown" aria-haspopup="true"
                        aria-expanded="false">Unit Usaha</a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="{{ url('/business-unit/sidoagung-agro-prima')}}">PT. Sido Agung Agro Prima</a></li>
                        <li><a class="dropdown-item" href="{{ url('/business-unit/sidoagung-farm')}}">PT. Sido Agung Farm</a></li>
                        <li><a class="dropdown-item" href="{{ url('/business-unit/sidosari-multi-farm')}}">PT. Sido Sari Multifarm</a></li>
                        <li><a class="dropdown-item" href="{{ url('/business-unit/asia-pangan-utama')}}">PT. Asia Pangan Utama</a></li>
                        {{-- <li><a class="dropdown-item" href="{{ url('/business-unit/sidoagung-food')}}">Sidoagung Foods Processing</a></li> --}}
                    </ul>
                </li>
                <li class="nav-item dropdown ">
                    <a class="nav-link" href="{{route('products.summary')}}" id="navbarDropdown" aria-haspopup="true"
                        aria-expanded="false">Produk</a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="{{route('products.feed')}}">Pakan Ternak</a></li>
                        <li><a class="dropdown-item" href="{{route('products.day-old-chick')}}">Bibit Anak Ayam</a></li>
                        <li><a class="dropdown-item" href="{{route('products.live-bird')}}">Ayam Hidup</a></li>
                        <li><a class="dropdown-item" href="{{route('products.broilers')}}">Ayam Potong</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown ">
                    <a class="nav-link" href="{{route('csr.summary')}}" id="navbarDropdown" aria-haspopup="true"
                        aria-expanded="false">CSR</a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="{{route('csr.education')}}">Pendidikan</a></li>
                        <li><a class="dropdown-item" href="{{route('csr.safety')}}">Keselamatan Kerja</a></li>
                        <li><a class="dropdown-item" href="{{route('csr.sosial')}}">Sosial</a></li>
                    </ul>
                    </li>
                <li class="nav-item ">
                    <a href="{{route('csr.news')}}" class="nav-link">Berita</a>
                </li>
                <li class="nav-item ">
                    <a href="{{route('we.career')}}" class="nav-link">Karir</a>
                </li>
                <li class="nav-item ">
                    {{-- <a href="{{route('we.be-our-partner')}}" class="nav-link">Hubungi Kami</a> --}}
                    <a href="{{route('we.summary')}}" class="nav-link">Hubungi Kami</a>
                </li>
                
            </ul>
        </div>

        
    </div>
    </nav>
</header>