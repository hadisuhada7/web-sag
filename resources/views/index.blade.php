@extends('shared.master')

@section('content')
    <div id="carousel" class="carousel slide carousel-fade" data-ride="carousel" data-interval="6000">
        <div class="carousel-inner" role="listbox">
            @foreach ($banners as $banner)
                <div class="carousel-item {{ $loop->index == 0 ? 'active' : '' }}">
                    <img src="{{ route('main.getResource', ['id' => $banner->mediaId]) }}" class="w-100"
                        alt="{{ $banner->title }}" />
                </div>
            @endforeach

        </div>
        <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <section class="space-pt ">
        <div class="container">
            <div class="row">
                <p class="font-weight-bold h3 text-primary" style="border-bottom: 5px solid #D8394F;">Produk Kami</p>
            </div>
            <div class="row mt-5">
                <a href="{{route('products.feed')}}" class="col-md-3 mb-4 mb-md-0">
                    <div class="feature-info text-center">
                        <div class="feature-info-icon">
                            <img class="img-fluid center-block mx-auto list-service-image w-50"
                                src="{{ asset('images/sag/produk/pakan-round.png') }}" alt="">
                        </div>
                        <div class="feature-info-content">
                            <h4 class="mb-3 feature-info-title">Pakan Ternak Berkualitas Tinggi</h4>
                        </div>
                    </div>
                </a>
                <div class="col-md-3 mb-4 mb-md-0">
                    <a href="{{route('products.day-old-chick')}}" class="feature-info text-center">
                        <div class="feature-info-icon">
                            <img class="img-fluid center-block mx-auto list-service-image w-50"
                                src="{{ asset('images/sag/produk/doc-round.png') }}" alt="">
                        </div>
                        <div class="feature-info-content">
                            <h4 class="mb-3 feature-info-title">Bibit Anak Ayam Sehat & Kuat</h4>
                        </div>
                    </a>
                </div>
                <div class="col-md-3 mb-4 mb-md-0">
                    <a href="{{route('products.live-bird')}}" class="feature-info text-center">
                        <div class="feature-info-icon">
                            <img class="img-fluid center-block mx-auto list-service-image w-50"
                                src="{{ asset('images/sag/produk/life-round.png') }}" alt="">
                        </div>
                        <div class="feature-info-content">
                            <h4 class="mb-3 feature-info-title">Ayam Hidup Siap Potong</h4>
                        </div>
                    </a>
                </div>
                <div class="col-md-3 mb-4 mb-md-0">
                    <a href="{{route('products.broilers')}}" class="feature-info text-center">
                        <div class="feature-info-icon">
                            <img class="img-fluid center-block mx-auto list-service-image w-50"
                                src="{{ asset('images/sag/produk/broiler-round.png') }}" alt="">
                        </div>
                        <div class="feature-info-content">
                            <h4 class="mb-3 feature-info-title">Ayam Potong Halal & NKV</h4>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="space-pt">
        <div class="container">
            <div class="row">
                <p class="font-weight-bold h3 text-primary" style="border-bottom: 5px solid #D8394F;">Berita Terbaru</p>
            </div>
            <div class="row" id="listBlock">
                <div class="container bg-white pt-3">
                    <div class="row pb-3">
                        @foreach ($news as $l)
                            <div class="col-lg-6 card-post col-sm-6 mb-4 pt-4 mb-lg-0">
                                <div class="blog-post bg-white event-gms">
                                    <div class="blog-post-meta pr-4" style="position: absolute;z-index: 99; right:0px; top:20px;">
                                        &nbsp;
                                    </div>
                                    <div class="blog-post-meta pr-4" style="position: absolute;z-index: 99; left:40px; top:20px;">
                                        <a class="text-white">{{ date('M d, Y', strtotime($l->releasedate)) }}</a>
                                    </div>
                                    <div style="background:url('{{ route('main.getResource', ['id' => $l->thumbnail]) }}')"
                                        class="blog-post-image">
                                        <h5 class="blog-post-title csr-title">
                                        </h5>
                                    </div>
                                    <div class="blog-post-content pb-event-gms">
                                        <div class="blog-post-details">
                                            <a href="{{route("csr.news")}}">
                                                <h5 class="blog-post-title gms-event-title mb-0 text-white" id="blog_157">
                                                    {{ $l->title }}
                                                </h5>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="space-pt">
        <div class="container">
            <div class="row">
                <p class="font-weight-bold h3 text-primary" style="border-bottom: 5px solid #D8394F;">Kata Pelanggan</p>
            </div>
            <div class="row">
                @foreach ($testimoni as $t)
                    <div class="col-md-4 mb-4 mb-md-0">
                        <div class="feature-info text-center">
                            <div class="feature-info-icon">
                                <img class="img-fluid center-block mx-auto list-service-image w-50"
                                    src="{{ route('main.getResource', ['id' => $t->photo]) }}" alt="">
                            </div>
                            <div class="feature-info-content">
                                <h4 class="mb-3 feature-info-title">{{Str::headline($t->name)}}</h4>
                                <p>{{$t->testimoni}}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="space-pt">
        <div class="container ">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <div class="container image-text-right-container">
                        <h3 class="mb-4">Bermitra Bersama Kami</h3>
                        <p class="mb-4">
                            Sido Agung Membuka Kesempatan Yang Luas Untuk Menjadi Mitra Peternak, Kami Menyediakan Dukungan Terbaik Melalui Pendampingan, Edukasi, Serta Produk Yang Berkualitas.
                       </p>
                        <a href="{{ route('we.be-our-partner') }}" class="btn btn-primary ">Bermitra Bersama</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <img class="img-fluid img-shadow-right" src="{{ asset('images/sag/manajemen/jabattangan.jpg') }}" alt="">
                </div>
            </div>
        </div>
    </section>

  
@endsection

@section('script')
    <script>
        var player = new Plyr('video');

        function videoPlay(source, image, mime) {
            
            player.source = {
                type: 'video',
                title: 'Example title',
                sources: [{
                    src: source,
                    type: mime,
                    size: 720,
                }, ],
                poster: image,
            };
            $('#modalVideo').modal('show');
        }

        $("#modalVideo").on('hide.bs.modal', function() {
            player.stop();
        });

        $.get("{{ url('/data/testimoni') }}", async (res) => {
            var testi = "";
            let i = 1;
            await res.forEach(el => {
                let status = (i == 1) ? 'active' : '';
                testi += '<div class="carousel-item ' + status + '">';
                testi += '<div class="testimonial-item">';
                testi += '<div class="testimonial-avatar shadow">';
                testi += '<img class="img-fluid rounded-circle" src="' + el.image + '" alt="">';
                testi += '</div>';
                testi += '<div class="testimonial-author">';
                testi += '<div class="testimonial-name">';
                testi += '<h6 class="mb-1">' + el.name + '</h6>';
                testi += '<span>' + el.title_lang + '</span>';
                testi += '</div>';
                testi += '</div>';
                testi += '<div class="testimonial-content">';
                testi += '<p>' + el.says_lang + '</p>';
                testi += '</div>';
                testi += '</div>';
                testi += '</div>';

                i++;
            });
            $('.testimonial').html(testi);
        });
    </script>
@endsection
