<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }} Balai Latihan Kerja Provinsi Gorontalo</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/front/images/logo-pemprov.png') }}" type="image/x-icon">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('assets/front/css/bootstrap/bootstrap.min.css') }}">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="{{ asset('assets/front/css/font-awesome/all.css') }}">
    {{-- Plugin CSS--}}
    <link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.css') }}">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('assets/front/css/custom.css') }}">
</head>

<body>
    <button type="button" id="backToTop" class="btn my-btn-transparent text-white"><i
            class="fas fa-chevron-up"></i></button>

    <div class="py-1 my-bg-gradient">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center py-1 small">
                <p class="m-0 small text-white">
                    {{ \Carbon\Carbon::now()->isoFormat('dddd, D MMMM Y') }}
                </p>
                <p class="d-none d-md-block m-0 small text-white text-uppercase">Balai Latihan Kerja Provinsi Gorontalo</p>
                @if (Route::has('login'))
                    @auth
                        <a href="{{ (Auth::user()->roles == 1) ? route('admin.home') : route('penulis.home') }}" class="my-btn-login-success px-4 py-1 small shadow-sm rounded-3">{{ Auth::user()->name }}</a>
                    @else
                        <a href="/login" class="my-btn-login-success px-4 py-1 small shadow-sm rounded-3">Login</a>
                    @endauth
                @endif
            </div>
        </div>
    </div>

    @include('layouts.front.navbar')

    <div class="my-content">
        @yield('content')
    </div>

    <footer>
        <div class="container">
            <div class="footer-wrap">
                <div class="second_class">
                    <div class="row">
                        <div class="col-lg-4 col-sm-6">
                            <div class="d-flex align-items-center">
                                <img src="{{ asset('assets/front/images/logo-pemprov.png') }}" alt="logo" width="40">
                                <h3 class="ms-2 fw-bold text-uppercase text-white">Balai Latihan Kerja Provinsi
                                    Gorontalo</h3>
                            </div>

                            <p>
                                Alamat :
                                {{ $data_profile->alamat }}
                            </p>
                            <p>Telp : {{ $data_profile->telepon }}</p>
                        </div>
                        <div class="col-lg-2 col-sm-6">
                            <h3 class="my-text-white">Quick Links</h3>
                            <ul class="footer-links">
                                <li><a href="/"><i class="fas fa-chevron-right"></i> Home</a>
                                </li>
                                <li><a href="/berita"><i class="fas fa-chevron-right"></i> Berita</a>
                                </li>
                                <li><a href="/pengumuman"><i class="fas fa-chevron-right"></i> Pengumuman</a>
                                </li>
                                <li><a href="/galeri"><i class="fas fa-chevron-right"></i> Galeri</a>
                                </li>
                                <li><a href="/kejuruan"><i class="fas fa-chevron-right"></i> Kejuruan</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-2 col-sm-6">
                            <h3 class="my-text-white">Profile BLK</h3>
                            <ul class="footer-category">
                                <li><a href="/profile"><i class="fas fa-chevron-right"></i> Profile</a>
                                </li>
                                <li><a href="/visimisi"><i class="fas fa-chevron-right"></i> Visi & Misi</a>
                                </li>
                                <li><a href="/sambutankepala"><i class="fas fa-chevron-right"></i> Sambutan Kepala</a>
                                </li>
                                <li><a href="/strukturorganisasi"><i class="fas fa-chevron-right"></i> Struktur Organisasi</a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="col-lg-4 col-sm-6">
                            <h3 class="my-text-white">Maps</h3>
                            <iframe
                                src="{{ $data_profile->map }}"
                                width="100%" height="200" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        {{-- <div class="my-border-bottom-primary"></div> --}}
        <div class="copyright pt-3 mt-5">
            <div class="container">
                <div class="d-flex justify-content-center">
                    <p>Copyright &copy; {{ \Carbon\Carbon::now()->isoFormat('Y') }} BLK Provinsi Gorontalo. All Rights Reserved.</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="{{ asset('assets/front/js/bootstrap/bootstrap.bundle.min.js') }}"></script>
    {{-- Plugin JS --}}
    <script src="{{ asset('assets/js/jquery.magnific-popup.min.js') }}"></script>
    <!-- Custom JS -->
    <script src="{{ asset('assets/front/js/custom.js') }}"></script>
    <script>
        var myBackToTop = $('#backToTop');

        $(window).scroll(function() {
            if ($(window).scrollTop() > 300) {
                myBackToTop.addClass('my-btn-show');
            } else {
                myBackToTop.removeClass('my-btn-show');
            }
        });

        myBackToTop.click(function(e) {
            e.preventDefault();
            $('html, body').animate({
                scrollTop: 0
            }, 0);
        });

        $(document).ready(function() {
            $('.img-link-popup').magnificPopup({
                delegate: 'a',
                type: 'image',
            });
        });
    </script>
</body>

</html>