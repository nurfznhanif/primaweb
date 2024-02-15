@extends('layout.main')

@section('content')

@php
$bg = asset('Template');
@endphp

<main>
    <div class="logo-beranda">
        <img src="{{ asset('images/PRIMATECH/logohitam.png') }}" alt="Logo IQ Primatech" />
        <h1 class="teks">IQ PRIMATECH</h1>
        <h3 class="quote">Dinamis Seperti Energi, Berpacu Pada Teknologi</h3>
        <div>
            <svg class="waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                viewBox="0 24 150 28" preserveAspectRatio="none" shape-rendering="auto">
                <defs>
                    <path id="gentle-wave"
                        d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z" />
                </defs>
                <g class="parallax">
                    <use xlink:href="#gentle-wave" x="48" y="0" fill="rgba(255,255,255,0.7)" />
                    <use xlink:href="#gentle-wave" x="48" y="3" fill="rgba(255,255,255,0.5)" />
                    <use xlink:href="#gentle-wave" x="48" y="5" fill="rgba(255,255,255,0.3)" />
                    <use xlink:href="#gentle-wave" x="48" y="7" fill="#fff" />
                </g>
            </svg>
        </div>
    </div>

    <div class="container mt-5">
        <h2 class="judul">TENTANG INFORMATIC QUALITY PRIME TECHNOLOGY</h2>
        <p class="maincontent">
            IQ PRIMATECH merupakan rangkaian komunitas dengan target tingkat
            nasional yang diselenggarakan oleh Unit Kegiatan Mahasiswa Universitas
            Islam Riau Prodi Teknik Informatika. Untuk tahun 2023, akan diadakan
            sayembara project, webinar, serta mencari bibit unggul pada potensi
            yang bertujuan untuk mengajak pelajar, mahasiswa, dan masyarakat umum
            untuk aktif berpartisipasi didunia teknologi yang perkembangannya
            setiap tahun semakin canggih dan modern. Dengan terbitnya website ini,
            akan diselenggarakannya program-program kami dengan tema : <br /><span>"Dinamis Seperti Energi, Berpacu Pada
                Teknologi"</span>
        </p>
        <div class="first">
            <img src="{{ asset('images/PRIMATECH/IMG_6716.png') }}" alt="" />
        </div>
    </div>

    <div class="vm container">
        <div class="row text-center">
            <div class="col-12">
                <h2 class=" section-title">Big and Bigger</h2>
                <h3 class="judulvm">Informatics Engineer</h3>
            </div>
        </div>
        <div class="tegar">
            <img src="{{ asset('images/PRIMATECH/tegaratas.svg') }}" alt="" />
            <p>
                "This is a learning forum about technology, especially in
                informatics engineering. We also share information to meet the
                knowledge needs of people who intend to learn." - Tegar
            </p>
        </div>
        <div class="hanif">
            <img src="{{ asset('images/PRIMATECH/hanatas.svg') }}" alt="" />
            <p>
                "Visi IQ PRIMATECH adalah memfasilitasi pertukaran informasi mengenai perkembangan dan
                penerapan teknologi modern dengan memberikan kesempatan dan relasi
                kepada mahasiswa dan masyarakat umum." - Hanif
            </p>
        </div>
    </div>
</main>


<section class="call-to-action no-padding support d-flex align-items-center">
    <div class="container">
        <div class="action-style-box">
            <div class="row">
                <div class="col-md-8 text-center text-md-left">
                    <div class="call-to-action-text">
                        <h3 class="action-title">Support Each Other</h3>
                    </div>
                </div><!-- Col end -->
                <div class="col-md-4 text-center text-md-right mt-3 mt-md-0">
                    <div class="call-to-action-btn">
                        <a class="btn btn-light rounded" href="/tentang">Tentang Kami</a>
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
            <h3 class="judulvm">Aktivitas Terbaru</h3>
        </div>
    </div>
    <div class="row ml-3 mr-3">
        @foreach($links as $link)
        <div class="col-md-6">
            <div class="embed-responsive embed-responsive-16by9">
                <iframe class="embed-responsive-item" width="960" height="540" src="{{ $link->embed_link }}"
                    title="YouTube video" frameborder="0" allow="autoplay" allowfullscreen></iframe>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card mb-3" style="max-width: 960px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="{{ asset('images/PRIMATECH/IMG_6754.jpg') }}"
                            class="img-fluid rounded-start mx-2 my-2">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h4 class="card-title">{{ $link->title }}</h4>
                            <p class="card-text">IQ PRIMATECH | Jl. Kaharuddin Nst No.113,
                                Simpang Tiga,
                                Kec. Bukit Raya,
                                Kota Pekanbaru,
                                Riau 28284
                            <div class="g-ytsubscribe" data-channelid="UCyM6kQmbMWqKK3QTDMHeoZw" data-layout="default"
                                data-count="default"></div>
                        </div>
                    </div>
                </div>
            </div>
            <a href="https://www.youtube.com/@iqprimatech/featured" class="btn btn-dark">More Video</a>
        </div>
        @endforeach
    </div>
</section>

<section id="ts-service-area" class="ts-service-area pb-0">
    <div class="container">
        <div class="row text-center">
            <div class="col-12">
                <h2 class="section-title">IQ PRIMATECH</h2>
                <h3 class="judulvm">Big and bigger</h3>
            </div>
        </div>
        <!--/ Title row end -->

        <div class="row">
            <div class="col-lg-4">
                <div class="ts-service-box d-flex">
                    <div class="ts-service-box-img">
                        <img loading="lazy" src="{{asset('Template')}}/images/icon-image/ruang-nyaman.png"
                            alt="service-icon">
                    </div>
                    <div class="ts-service-box-info">
                        <h3 class="service-box-title"><a href="#">Lorem ipsum dolor sit amet, consectetur adipiscing
                                elit</a></h3>
                        <p>Maecenas eu metus id elit ultrices ultricies. Ut eu mauris ligula. Nulla facilisi. Vestibulum
                            nec neque in nisi fringilla lacinia. Sed lacinia gravida risus, id rhoncus lectus fermentum
                            sit amet.</p>
                    </div>
                </div><!-- Service 1 end -->

                <div class="ts-service-box d-flex">
                    <div class="ts-service-box-img">
                        <img loading="lazy" src="{{asset('Template')}}/images/icon-image/24-jam.png" alt="service-icon">
                    </div>
                    <div class="ts-service-box-info">
                        <h3 class="service-box-title"><a href="#">Lorem ipsum dolor sit amet, consectetur adipiscing
                                elit</a></h3>
                        <p>Maecenas eu metus id elit ultrices ultricies. Ut eu mauris ligula. Nulla facilisi. Vestibulum
                            nec neque in nisi fringilla lacinia. Sed lacinia gravida risus, id rhoncus lectus fermentum
                            sit amet.</p>
                    </div>
                </div><!-- Service 2 end -->

            </div><!-- Col end -->

            <div class="col-lg-4 text-center">
                <img loading="lazy" class="img-fluid" src="{{ asset('images/PRIMATECH/hanatas.svg') }}"
                    alt="service-avatar-image">
            </div><!-- Col end -->

            <div class="col-lg-4 mt-5 mt-lg-0 mb-4 mb-lg-0">
                <div class="ts-service-box d-flex">
                    <div class="ts-service-box-img">
                        <img loading="lazy" src="{{asset('Template')}}/images/icon-image/doctor-proff.png"
                            alt="service-icon">
                    </div>
                    <div class="ts-service-box-info">
                        <h3 class="service-box-title"><a href="#">Lorem ipsum dolor sit amet, consectetur adipiscing
                                elit</a></h3>
                        <p>Maecenas eu metus id elit ultrices ultricies. Ut eu mauris ligula. Nulla facilisi. Vestibulum
                            nec neque in nisi fringilla lacinia. Sed lacinia gravida risus, id rhoncus lectus fermentum
                            sit amet.</p>
                    </div>
                </div><!-- Service 4 end -->

                <div class="ts-service-box d-flex">
                    <div class="ts-service-box-img">
                        <img loading="lazy" src="{{asset('Template')}}/images/icon-image/alat-medis.png"
                            alt="service-icon">
                    </div>
                    <div class="ts-service-box-info">
                        <h3 class="service-box-title"><a href="#">Lorem ipsum dolor sit amet, consectetur adipiscing
                                elit</a></h3>
                        <p>Maecenas eu metus id elit ultrices ultricies. Ut eu mauris ligula. Nulla facilisi. Vestibulum
                            nec neque in nisi fringilla lacinia. Sed lacinia gravida risus, id rhoncus lectus fermentum
                            sit amet.</p>
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
                <h3 class="judulvm">Partner kami</h3>
            </div>
        </div>
        <div class="row all-clients">
            @foreach($partnership as $partner)
            <div class="col-sm-2 col-6">
                <figure class="clients-logo">
                    <a href="#"><img loading="lazy" class="img-fluid"
                            src="{{ asset('images/partner-image/'.$partner->image) }}" alt="clients-logo"
                            title="{{$partner->nama_partner}}" /></a>
                </figure>
            </div>
            @endforeach
        </div>

        <div class="col-12">
            <div class="general-btn text-center">
                <a class="btn btn-dark" href="/partnership">Selengkapnya</a>
            </div>
        </div>
    </div>
    <!--/ Container end -->
</section><!-- Content end -->

@endsection