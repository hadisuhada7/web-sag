@extends('shared.master')

@section('content')
    <x-banner-summary mode="about.management"></x-banner-summary>

    <section class="space-ptb background-sidoagung">
        <div class="container">
            <div class="row justify-content-center ">
                <div class="col-lg-12 pb-lg-0">
                    <div class="section-title mb-3 pt-2">
                        <h2 class="text-white"> Manajemen</h2>
                    </div>
                    <p class="text-white">
                        Group Usaha Sido Agung Dikelola Secara Profesional Dan Bertanggung Jawab, Manajemen Kami Merupakan Pribadi Yang Kompeten Serta Berpengalaman Dalam Bidang Yang Relevan.
                    </p>
                </div>

            </div>
        </div>
    </section>

    <section class="space-ptb">
        <div class="container">
            @foreach ($list as $l)
            <div class="row justify-content-center">
                <div class="col-lg-3 mb-4 mb-lg-0 pt-10">
                    <img class="img-fluid" src="{{ route('main.getResource', ['id' => $l->photo]) }}"
                        alt="sidoagung-bram-sebastian">
                </div>
                <div class="col-lg-9 mb-4 mb-lg-0">
                    <div class="col-md-12 bg-white border-radius mt-3">
                        <div class="pl-5 pb-5 pt-5 ">
                            <h5 class="text-primary mb-2">{{$l->name}}</h5>
                            <p style="font-style: italic; margin-top: -10px;">{{$l->position}}</p>
                            <p class="mb-2">
                                {!! $l->description !!}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>
@endsection
