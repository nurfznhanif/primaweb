@extends('layout.main')

@section('content')

@php
$bg = asset('Template');
@endphp

<div class="banner-carousel banner-carousel-2">
    <div class="banner-carousel-item" style="background-image:url({{$bg}}/images/slider-main/bg-pendaftaran.png)">
        <div class="container">
            <div class="box-slider-content">
                <div class="box-slider-text">
                    <h3 class="box-slide-sub-title">DINAMIS SEPERTI ENERGI, BERPACU PADA TEKNOLOGI</h3>
                    <p>
                        <a href="#" class="slider btn btn-primary">Klik untuk kerjasama</a>
                    </p>
                </div>
            </div>
        </div>
    </div>

    @foreach($banners as $banner)
    @php
    $bgImage = asset('images/banner-image/'.$banner->image);
    @endphp

    <div class="banner-carousel-item" style="background-image:url({{$bgImage}})"></div>

    @endforeach
</div>


<section class="call-to-action no-padding">
    <div class="container">
        <div class="action-style-box">
            <div class="row">
                <div class="col-md-8 text-center text-md-left">
                    <div class="call-to-action-text">
                        <h3 class="action-title">"Support Each Other"</h3>
                    </div>
                </div><!-- Col end -->
                <div class="col-md-4 text-center text-md-right mt-3 mt-md-0">
                    <div class="call-to-action-btn">
                        <a class="btn btn-primary" href="/tentang">Tentang Kami</a>
                    </div>
                </div><!-- col end -->
            </div><!-- row end -->
        </div><!-- Action style box -->
    </div><!-- Container end -->
</section><!-- Action end -->

<section class="social" id="social">
    <div class="row text-center">
        <div class="col-12">
            <h2 class="section-title">IQ PRIMATECH</h2>
            <h3 class="section-sub-title">Aktivitas Terbaru</h3>
        </div>
    </div>
    <div class="row ml-3 mr-3">
        @foreach($links as $link)
        <div class="col-md-6">
            <div class="embed-responsive embed-responsive-16by9">
                <iframe class="embed-responsive-item" width="960" height="540" src="{{$link->embed_link}}" title="YouTube video" frameborder="0" allow="autoplay" allowfullscreen></iframe>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card mb-3" style="max-width: 960px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="{{asset('Template')}}/images/logo-ultah.png" class="img-fluid rounded-start mx-2 my-2">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h4 class="card-title">{{$link->title}}</h4>
                            <p class="card-text">IQ PRIMATECH | Jl. Kaharuddin Nst No.113,
                                Simpang Tiga,
                                Kec. Bukit Raya,
                                Kota Pekanbaru,
                                Riau 28284
                            <div class="g-ytsubscribe" data-channelid="UCrVa5dDtzD7ARnE3TqN4Wig" data-layout="default" data-count="default"></div>
                        </div>
                    </div>
                </div>
            </div>
            <a href="https://www.youtube.com/@iqprimatech/featured" class="btn btn-primary">More Video</a>
        </div>
        @endforeach
    </div>
</section>

<section id="ts-service-area" class="ts-service-area pb-0">
    <div class="container">
        <div class="row text-center">
            <div class="col-12">
                <h2 class="section-title">IQ PRIMATECH</h2>
                <h3 class="section-sub-title">Big and bigger</h3>
            </div>
        </div>
        <!--/ Title row end -->

        <div class="row">
            <div class="col-lg-4">
                <div class="ts-service-box d-flex">
                    <div class="ts-service-box-img">
                        <img loading="lazy" src="{{asset('Template')}}/images/icon-image/ruang-nyaman.png" alt="service-icon">
                    </div>
                    <div class="ts-service-box-info">
                        <h3 class="service-box-title"><a href="#">Lorem ipsum dolor sit amet, consectetur adipiscing elit</a></h3>
                        <p>Maecenas eu metus id elit ultrices ultricies. Ut eu mauris ligula. Nulla facilisi. Vestibulum nec neque in nisi fringilla lacinia. Sed lacinia gravida risus, id rhoncus lectus fermentum sit amet.</p>
                    </div>
                </div><!-- Service 1 end -->

                <div class="ts-service-box d-flex">
                    <div class="ts-service-box-img">
                        <img loading="lazy" src="{{asset('Template')}}/images/icon-image/24-jam.png" alt="service-icon">
                    </div>
                    <div class="ts-service-box-info">
                        <h3 class="service-box-title"><a href="#">Lorem ipsum dolor sit amet, consectetur adipiscing elit</a></h3>
                        <p>Maecenas eu metus id elit ultrices ultricies. Ut eu mauris ligula. Nulla facilisi. Vestibulum nec neque in nisi fringilla lacinia. Sed lacinia gravida risus, id rhoncus lectus fermentum sit amet.</p>
                    </div>
                </div><!-- Service 2 end -->

            </div><!-- Col end -->

            <div class="col-lg-4 text-center">
                <img loading="lazy" class="img-fluid" src="template/images/services/service-center.svg" alt="service-avater-image">
            </div><!-- Col end -->

            <div class="col-lg-4 mt-5 mt-lg-0 mb-4 mb-lg-0">
                <div class="ts-service-box d-flex">
                    <div class="ts-service-box-img">
                        <img loading="lazy" src="{{asset('Template')}}/images/icon-image/doctor-proff.png" alt="service-icon">
                    </div>
                    <div class="ts-service-box-info">
                        <h3 class="service-box-title"><a href="#">Lorem ipsum dolor sit amet, consectetur adipiscing elit</a></h3>
                        <p>Maecenas eu metus id elit ultrices ultricies. Ut eu mauris ligula. Nulla facilisi. Vestibulum nec neque in nisi fringilla lacinia. Sed lacinia gravida risus, id rhoncus lectus fermentum sit amet.</p>
                    </div>
                </div><!-- Service 4 end -->

                <div class="ts-service-box d-flex">
                    <div class="ts-service-box-img">
                        <img loading="lazy" src="{{asset('Template')}}/images/icon-image/alat-medis.png" alt="service-icon">
                    </div>
                    <div class="ts-service-box-info">
                        <h3 class="service-box-title"><a href="#">Lorem ipsum dolor sit amet, consectetur adipiscing elit</a></h3>
                        <p>Maecenas eu metus id elit ultrices ultricies. Ut eu mauris ligula. Nulla facilisi. Vestibulum nec neque in nisi fringilla lacinia. Sed lacinia gravida risus, id rhoncus lectus fermentum sit amet.</p>
                    </div>
                </div><!-- Service 5 end -->
            </div><!-- Col end -->
        </div><!-- Content row end -->
    </div>
    <!--/ Container end -->
</section><!-- Service end -->

<section class="content">
    <div class="container">
        <div class="row text-center">
            <div class="col-lg-12">
                <h2 class="section-title">IQ PRIMATECH</h2>
                <h3 class="section-sub-title">Partner kami</h3>
            </div>
        </div>
        <div class="row all-clients">
            @foreach($partnership as $partner)
            <div class="col-sm-2 col-6">
                <figure class="clients-logo">
                    <a href="#"><img loading="lazy" class="img-fluid" src="{{asset('images/partner-image/'.$partner->image)}}" alt="clients-logo" title="{{$partner->nama_partner}}" /></a>
                </figure>
            </div>
            @endforeach
        </div>

        <div class="col-12">
            <div class="general-btn text-center">
                <a class="btn btn-primary" href="/partnership">Selengkapnya</a>
            </div>
        </div>
    </div>
    <!--/ Container end -->
</section><!-- Content end -->

@endsection