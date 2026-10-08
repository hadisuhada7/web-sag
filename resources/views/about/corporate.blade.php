@extends('shared.master')

@section('content')
    <x-banner-summary mode="about.corporate"></x-banner-summary>

    <section class="space-ptb background-sidoagung">
        <div class="container">
            <div class="row justify-content-center ">
                <div class="col-lg-12 pb-lg-0">
                    <div class="section-title mb-3 pt-2">
                        <h2 class="text-white"> Struktur Group</h2>
                    </div>
                    <p class="text-white">
                        Group Usaha Sido Agung Merupakan Group Usaha Perunggasan Terintegrasi Dengan Unit-unit Usaha Yang
                        Saling Melengkapi Dan Bersinergi Satu Sama Lain.
                    </p>
                </div>

            </div>
        </div>
    </section>

    <section class="space-ptb">
        <div class="container">
            <div class="row justify-content-center ">
                <div class="col-lg-12 pb-lg-0">
                    <img class="img-fluid" src="{{ asset('images/sag/struktur.png') }}" alt="">
                </div>
            </div>
        </div>
    </section>
@endsection
