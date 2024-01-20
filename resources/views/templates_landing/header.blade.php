<header class="header_section">
    <div class="header_top">
        <div class="container">
            <div class="contact_nav">
                <a href="">
                    <i class="fa fa-phone" aria-hidden="true"></i>
                    <span>
                        Call : 0231 661126
                    </span>
                </a>
                <a href="">
                    <i class="fa fa-envelope" aria-hidden="true"></i>
                    <span>
                        Email : empatpilartech@gmail.com
                    </span>
                </a>
                <!-- <a href="">
            <i class="fa fa-map-marker" aria-hidden="true"></i>
            <span>
              Location
            </span>
          </a> -->
            </div>
        </div>
    </div>
    <div class="header_bottom">
        <div class="container-fluid">
            <nav class="navbar navbar-expand-lg custom_nav-container ">
                <a class="navbar-brand" href="index.html">
                    <img src="{{ asset('public/mico-html/images/logowaled.png') }}" alt="">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class=""> </span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <div class="d-flex mr-auto flex-column flex-lg-row align-items-center">
                        <ul class="navbar-nav  ">
                            <li class="nav-item active">
                                <a id="home" class="nav-link home @if ($menu == 'home') bg-dark @endif"
                                    href="{{ route('landing') }}">Home <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link  @if ($menu == 'dashboard-landing') bg-dark @endif"
                                    href="{{ route('dashboardlanding') }}"> Dashboard SEMERUSMART</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link @if ($menu == 'jadwalpoli') bg-dark @endif"
                                    href="{{ route('jadwalpoli') }}"> Jadwal Poli Klinik</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link @if ($menu == 'kontakkami') bg-dark @endif"
                                    href="{{ route('kontakkami') }}">Kontak Kami</a>
                            </li>
                        </ul>
                    </div>
                    <div class="quote_btn-container">
                        @if (Auth::guest())
                            <a href="{{ route('login') }}">
                                <i class="fa fa-user" aria-hidden="true"></i>
                                <span>
                                    Login
                                </span>
                            </a>
                        @else
                            {{ Auth::user()->name }}
                            <a href="{{ route('dashboard') }}">Dashboard</a>
                        @endif
                    </div>
                </div>
            </nav>
        </div>
    </div>
</header>
