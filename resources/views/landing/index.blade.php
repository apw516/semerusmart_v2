@extends('templates_landing.main')
@section('container')
<section class="slider_section ">
    <div class="dot_design">
        <img src="{{ asset('public/mico-html/images/dots.png') }}" alt="">
    </div>
    <div id="customCarousel1" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="container ">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="detail-box">
                                <h1>
                                    SEMERUSMART <br>
                                </h1>
                                <p>
                                    Selamat Datang di Aplikasi SEMERUMSART klinik ...
                                </p>
                                <a href="{{ route('login')}}" class="bg-success">
                                    Silahkan Login
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="img-box">
                                <img src="{{ asset('public/mico-html/images/slider-img2.jpg') }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="container ">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="detail-box">
                                <h1>
                                    Antrian Online <br>
                                </h1>
                                <p>
                                    Dengan tersedianya aplikasi antrian online RSUD Waled yang terintegrasi dengan
                                    Mobile JKN BPJS
                                    Kesehatan, Pasien bisa dengan mudah mendapat antrian tanpa harus antri di loket
                                    antrian untuk
                                    mendapat nomor antrian pelayanan...
                                </p>
                                <a href="" class="bg-info">
                                    Ambil Antrian Online
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="img-box">
                                <img src="{{ asset('public/mico-html/images/slider-img.jpg')}}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="container ">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="detail-box">
                                <h1>
                                    Pendaftaran <br>
                                    <span style="font-size:30px">
                                        Bridging Vclaim versi 2
                                    </span>
                                </h1>
                                <p>
                                    Untuk memudahkan proses pendaftaran pasien BPJS, aplikasi SIRAMAH dilengkapi dengan
                                    fitur bridging
                                    yang sudah terintegrasi dengan data milik BPJS Kesehatan ...
                                </p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="img-box">
                                <img src="{{ asset('public/mico-html/images/slider-img.jpg')}}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="container ">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="detail-box">
                                <!-- <div class="play_btn">
                    <button>
                      <i class="fa fa-play" aria-hidden="true"></i>
                    </button>
                  </div> -->
                                <h1>
                                    REKAMEDIS ELEKTRONIK <br>
                                    <span style="font-size:20px">
                                        Pasien IGD, Rawat Jalan, Rawat Inap
                                    </span>
                                </h1>
                                <p>
                                    Untuk pencatatan data pasien , Siramah Rsud waled sudah menyiapkan sistem elektronik
                                    rekamedis
                                    yang saling terintegrasi ditiap unit pelayanannya seperti, Instalasi Gawat Darurat,
                                    Rawat Jalan,
                                    Rawat Inap, Farmasi, Laboratorium dsb ...
                                </p>
                                <!-- <a href="">
                    Contact Us
                  </a> -->
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="img-box">
                                <img src="{{ asset('public/mico-html/images/slider-img.jpg') }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="carousel_btn-box">
            <a class="carousel-control-prev" href="#customCarousel1" role="button" data-slide="prev">
                <img src="{{ asset('public/mico-html/images/prev.png')}}" alt="">
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#customCarousel1" role="button" data-slide="next">
                <img src="{{ asset('public/mico-html/images/next.png')}}" alt="">
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
</section>
@endsection
