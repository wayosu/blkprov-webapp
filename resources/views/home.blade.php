<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Balai Latihan Kerja Provinsi Gorontalo</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/front/images/logo-pemprov.png') }}" type="image/x-icon">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('assets/front/css/bootstrap/bootstrap.min.css') }}">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="{{ asset('assets/front/css/font-awesome/all.css') }}">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('assets/front/css/custom.css') }}">
</head>

<body>
    <button type="button" id="backToTop" class="btn my-btn-transparent text-white"><i
            class="fas fa-chevron-up"></i></button>

    <!-- Navbar Tablet & Laptop -->
    <nav class="navbar navbar-expand-lg bg-light navbar-light shadow-sm fixed-top">
        <div class="container">
            <a class="navbar-brand d-none d-md-block" href="#">
                <div class="d-flex align-items-center">
                    <img src="{{ asset('assets/front/images/logo-pemprov.png') }}" alt="" width="35">
                    <span class="fs-6 fw-bolder ms-2 text-dark">BLK PROVINSI GORONTALO</span>
                </div>
            </a>
            <a class="navbar-brand d-block d-md-none" href="#">
                <div class="d-flex align-items-center">
                    <img src="{{ asset('assets/front/images/logo-pemprov.png') }}" alt="" width="30">
                    <span class="fs-6 fw-bolder ms-2 text-dark">BLK PROV. GORONTALO</span>
                </div>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll"
                aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                <small><span class="navbar-toggler-icon"></span></small>
            </button>
            <div class="collapse navbar-collapse" id="navbarScroll">
                <ul class="navbar-nav gap-lg-3 ms-auto my-2 navbar-nav-scroll" style="--bs-scroll-height: 300px;">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Profile
                        </a>
                        <ul class="dropdown-menu border-0 my-dropmenu" aria-labelledby="navbarScrollingDropdown">
                            <li><a class="dropdown-item" href="profile.html">Profil</a></li>
                            <li><a class="dropdown-item" href="visimisi.html">Visi & Misi</a></li>
                            <li><a class="dropdown-item" href="sambutan.html">Sambutan Kepala</a></li>
                            <li><a class="dropdown-item" href="struktur.html">Struktur Organisasi</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="berita.html">Berita</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="pengumuman.html">Pengumuman</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="gallery.html">Galleri</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="kejuruan.html">Kejuruan</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="my-content">

        <section id="pengumuman" class="mb-4">
            <div class="container">
                <div class="d-flex flex-wrap flex-md-nowrap justify-content-center">
                    <div class="bg-danger mb-2 h-100">
                        <h6 class="m-0 px-2 py-1 text-white small">PENGUMUMAN</h6>
                    </div>
                    <div id="mySlidePengumuman" class="carousel slide carousel-fade w-100" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            @foreach ($data_populer as $post_populer)
                                <div class="carousel-item {{ $loop->first ? 'active' : '' }}" data-bs-interval="4000">
                                    <div class="container">
                                        <div class="carousel-caption text-start">
                                            <h1 class="m-0">{{ $post_populer->judul }}</h1>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="my-btn-nxpv">
                            <button class="carousel-control-prev" type="button"
                                data-bs-target="#mySlidePengumuman" data-bs-slide="prev">
                                <h2 class="m-0 p-0"><span class="fas fa-angle-left"
                                        aria-hidden="true"></span></h2>
                            </button>
                            <button class="carousel-control-next" type="button"
                                data-bs-target="#mySlidePengumuman" data-bs-slide="next">
                                <h2 class="m-0 p-0"><span class="fas fa-angle-right"
                                        aria-hidden="true"></span></h2>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="hero" class="mb-5">
            <div class="container">
                <div class="row align-items-stretch g-1">
                    @foreach ($data_heroLeft as $post_heroLeft)
                        <div class="col-12 col-lg-6">
                            <a href="#" class="text-decoration-none text-black">
                                <div class="card border-0" style="max-height: 22.79em;">
                                    <div class="figure">
                                        <img class="card-img-top rounded-3 my-img-zoom"
                                            src="{{ asset($post_heroLeft->gambar) }}" alt="Card image cap"
                                            height="400" style="object-fit: cover;">
                                    </div>
                                    <div class="card-body my-content-card pb-0 px-0">
                                        <small>
                                            <span class="badge my-badge">{{ $post_heroLeft->category->name }}</span>
                                        </small>
                                        <h4 class="card-title mt-2">
                                            {{ $post_heroLeft->judul }}
                                        </h4>
                                        <p class="mb-0 fw-bold small">
                                            <small>
                                                @if ($post_heroLeft->user_id == 1)
                                                    Admin
                                                @else
                                                    {{ $post_heroLeft->user->name }}
                                                @endif
                                                <span class="fw-light">
                                                    - {{ $post_heroLeft->created_at->format('d F Y') }}
                                                </span>
                                            </small>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                    <div class="col-12 col-lg-6">
                        <div class="row my-card-scroll g-1">
                            @foreach ($data_heroRight as $post_heroRight)
                                <div class="col-10 col-md-6">
                                    <a href="#" class="text-decoration-none text-black">
                                        <div class="card border-0" style="max-height: 180px;">
                                            <div class="figure">
                                                <img class="card-img-top rounded-3 my-img-zoom"
                                                    src="{{ asset($post_heroRight->gambar) }}" alt="Card image cap"
                                                    height="200" style="object-fit: cover;">
                                            </div>
                                            <div class="card-body my-content-card pb-0 px-0">
                                                <small>
                                                    <span
                                                        class="badge my-badge">{{ $post_heroRight->category->name }}</span>
                                                </small>
                                                <h6 class="card-title mt-2">
                                                    {{ $post_heroRight->judul }}
                                                </h6>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="berita" class="mb-5">
            <div class="container">
                <div class="row gy-5">
                    <div class="col-md-12 col-xl-8">

                        <div class="row gy-5">
                            <div class="col-12">
                                <div class="mb-2">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <h6 class="my-0">BERITA TERBARU</h6>
                                        <a href="#" class="my-btn-link small text-muted"><small>All</small></a>
                                    </div>
                                    <div class="my-border-bottom-primary"></div>
                                </div>
                                <div class="row gy-4">
                                    @foreach ($data_terbaru as $post_terbaru)
                                        <div class="col-md-12 col-lg-6">
                                            <a href="#" class="text-decoration-none text-black">
                                                <div class="card border-0">
                                                    <div class="figure">
                                                        <img class="card-img-top rounded-3 my-img-zoom"
                                                            src="{{ asset($post_terbaru->gambar) }}"
                                                            alt="Card image cap"
                                                            style="height: 25vh;object-fit: cover;">
                                                    </div>
                                                    <div class="my-badge-card small">
                                                        <span
                                                            class="badge my-badge">{{ $post_terbaru->category->name }}</span>
                                                    </div>
                                                    <div class="card-body pb-0 px-0">
                                                        <h4 class="card-title mb-1 my-card-title fw-normal">
                                                            {{ $post_terbaru->judul }}
                                                        </h4>
                                                        <p class="fw-bold small mt-0 mb-1">
                                                            <small>
                                                                @if ($post_terbaru->user_id == 1)
                                                                    <small>Admin</small>
                                                                @else
                                                                    <small>{{ $post_terbaru->user->name }}</small>
                                                                @endif
                                                                <small>
                                                                    <span class="fw-light text-muted">-
                                                                        {{ $post_terbaru->created_at->format('d F Y') }}
                                                                    </span>
                                                                </small>
                                                            </small>
                                                        </p>
                                                        <p class="m-0 text-secondary small">
                                                            {{ \Illuminate\Support\Str::limit(strip_tags($post_terbaru->konten), 150, '...') }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="mb-2">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <h6 class="my-0">GALERI</h6>
                                        <a href="#" class="my-btn-link small text-muted"><small>All</small></a>
                                    </div>
                                    <div class="my-border-bottom-primary"></div>
                                </div>
                                <div class="row g-0">
                                    <div class="col-12">
                                        <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
                                            <div class="carousel-inner">
                                                @foreach ($data_populer as $post_populer)
                                                    <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                                                        <img src="{{ asset($post_populer->gambar) }}" alt="foto"
                                                            class="rounded-3"
                                                            style="height: 40vh;width: 100%;object-fit: cover;">

                                                        <div class="container">
                                                            <div class="carousel-caption text-start">
                                                                <div class="my-0">
                                                                    <small>
                                                                        <span class="badge my-badge">FOTO</span>
                                                                    </small>
                                                                </div>
                                                                <h4 class="my-2 fw-normal">
                                                                    {{ $post_populer->judul }}
                                                                </h4>
                                                                <p class="my-0 fw-bold small">
                                                                    <small>
                                                                        @if ($post_populer->user_id == 1)
                                                                            <small>Admin</small>
                                                                        @else
                                                                            <small>{{ $post_populer->user->name }}</small>
                                                                        @endif
                                                                        <small>
                                                                            <span class="fw-light">
                                                                                -
                                                                                {{ $post_populer->created_at->format('d F Y') }}
                                                                            </span>
                                                                        </small>
                                                                    </small>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                            <button class="carousel-control-prev" type="button"
                                                data-bs-target="#myCarousel" data-bs-slide="prev">
                                                <h2 class="m-0 p-0"><span class="fas fa-angle-left"
                                                        aria-hidden="true"></span></h2>
                                            </button>
                                            <button class="carousel-control-next" type="button"
                                                data-bs-target="#myCarousel" data-bs-slide="next">
                                                <h2 class="m-0 p-0"><span class="fas fa-angle-right"
                                                        aria-hidden="true"></span></h2>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="mb-2">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <h6 class="my-0">VIDEO PROFIL</h6>
                                    </div>
                                    <div class="my-border-bottom-primary"></div>
                                </div>
                                <div class="row g-0">
                                    <div class="col-12">
                                        <iframe style="height: 40vh;width: 100%;object-fit: cover;"
                                            class="rounded-3" src="https://www.youtube.com/embed/cHwFtCIgZnI"
                                            title="YouTube video player" frameborder="0"
                                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                            allowfullscreen></iframe>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-xl-4">

                        <div class="sidebar-sticky">
                            <div class="row gy-5">
                                <div class="col-12">
                                    <div class="mb-2">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <h6 class="my-0">BERITA POPULER</h6>
                                            <a href="#" class="my-btn-link small text-muted"><small>All</small></a>
                                        </div>
                                        <div class="my-border-bottom-primary"></div>
                                    </div>
                                    <div class="row">
                                        @foreach ($data_populer as $post_populer)
                                            <div class="col-12 col-md-6 col-xl-12">
                                                <a href="#" class="text-decoration-none text-black">
                                                    <div class="card border-0">
                                                        <div class="row g-0 align-items-center">
                                                            <div class="col-3 col-md-4 col-lg-3">
                                                                <div class="figure">
                                                                    <img class="img-fluid rounded-3 my-img-zoom"
                                                                        src="{{ asset($post_populer->gambar) }}"
                                                                        alt="Card image cap"
                                                                        style="height: 10vh;width: 100%;object-fit: cover;">
                                                                </div>
                                                                {{-- <img src="{{ asset($post_populer->gambar) }}" class="img-fluid rounded-3"
                                                                style="height: 100px;width: 100%;object-fit: cover;"> --}}
                                                            </div>
                                                            <div class="col-9 col-md-8 col-lg-9">
                                                                <div class="card-body">
                                                                    <h6
                                                                        class="card-title my-card-title mt-0 mb-1 small">
                                                                        {{ $post_populer->judul }}</h6>
                                                                    <div class="small fw-bold my-badge-card-small">
                                                                        <small>
                                                                            <span class="badge my-badge">
                                                                                {{ $post_populer->category->name }}
                                                                            </span>
                                                                            <span
                                                                                class="fw-light m-0 mt-0 small text-muted">
                                                                                {{ $post_populer->created_at->format('d F Y') }}
                                                                            </span>
                                                                        </small>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="mb-2">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <h6 class="my-0">PENGUMUMAN</h6>
                                            <a href="#" class="my-btn-link small text-muted"><small>All</small></a>
                                        </div>
                                        <div class="my-border-bottom-primary"></div>
                                    </div>
                                    <div class="row">
                                        @foreach ($data_populer as $post_populer)
                                            <div class="col-12 col-md-6 col-xl-12">
                                                <a href="#" class="text-decoration-none text-black">
                                                    <div class="card border-0">
                                                        <div class="row g-0 align-items-center">
                                                            <div class="col-3 col-lg-2 col-xl-3">
                                                                <div class="figure">
                                                                    <img class="img-fluid rounded-3 my-img-zoom"
                                                                        src="{{ asset('assets/front/images/announcement.png') }}"
                                                                        alt="Card image cap"
                                                                        style="height: 8vh;width: 100%;object-fit: cover;">
                                                                </div>
                                                                {{-- <img src="{{ asset($post_populer->gambar) }}" class="img-fluid rounded-3"
                                                                style="height: 100px;width: 100%;object-fit: cover;"> --}}
                                                            </div>
                                                            <div class="col-9 col-lg-10 col-xl-9">
                                                                <div class="card-body">
                                                                    <h6
                                                                        class="card-title my-card-title mt-0 mb-1 small">
                                                                        {{ $post_populer->judul }}</h6>
                                                                    <div class="small fw-bold my-badge-card-small">
                                                                        <small>
                                                                            <span
                                                                                class="fw-light m-0 mt-0 small text-muted">
                                                                                {{ $post_populer->created_at->format('d F Y') }}
                                                                            </span>
                                                                        </small>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <h6 class="my-0">SOSIAL MEDIA</h6>
                                    </div>
                                    <div class="my-border-bottom-primary"></div>
                                    <div class="d-flex mt-2 justify-content-center">
                                        <a href="#" class="text-decoration-none my-btn-sosmed">
                                            <i class="fab fa-twitter"></i>
                                        </a>
                                        <a href="#" class="text-decoration-none my-btn-sosmed">
                                            <i class="fab fa-facebook-f"></i>
                                        </a>
                                        <a href="#" class="text-decoration-none my-btn-sosmed">
                                            <i class="fab fa-instagram"></i>
                                        </a>
                                        <a href="#" class="text-decoration-none my-btn-sosmed">
                                            <i class="fab fa-youtube"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>

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
                                Alamat : Jalan Beringin, Kelurahan Tomulabutao Selatan, Kecamatan Dungingi, Kota
                                Gorontalo, Gorontalo 96138
                            </p>
                            <p>Telp : (021) 884 1147</p>
                        </div>
                        <div class="col-lg-2 col-sm-6">
                            <h3 class="my-text-white">Quick Links</h3>
                            <ul class="footer-links">
                                <li><a href="#"><i class="fas fa-chevron-right"></i> Home</a>
                                </li>
                                <li><a href="#"><i class="fas fa-chevron-right"></i> Berita</a>
                                </li>
                                <li><a href="#"><i class="fas fa-chevron-right"></i> Pengumuman</a>
                                </li>
                                <li><a href="#"><i class="fas fa-chevron-right"></i> Gallery</a>
                                </li>
                                <li><a href="#"><i class="fas fa-chevron-right"></i> Kejuruan</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-2 col-sm-6">
                            <h3 class="my-text-white">Profile BLK</h3>
                            <ul class="footer-category">
                                <li><a href="#"><i class="fas fa-chevron-right"></i> Profile</a>
                                </li>
                                <li><a href="#"><i class="fas fa-chevron-right"></i> Visi & Misi</a>
                                </li>
                                <li><a href="#"><i class="fas fa-chevron-right"></i> Sambutan Kepala</a>
                                </li>
                                <li><a href="#"><i class="fas fa-chevron-right"></i> Struktur Organisasi</a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="col-lg-4 col-sm-6">
                            <h3 class="my-text-white">Maps</h3>
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.620558118072!2d123.04155311535561!3d0.5704722637410583!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x32792c833db4100d%3A0xcd461fcb69dae928!2sUPTD%20BLK%20LATRANS%20PROV.%20GTLO!5e0!3m2!1sid!2sid!4v1635192927712!5m2!1sid!2sid"
                                width="100%" height="200" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        {{-- <div class="my-border-bottom-primary"></div> --}}
        <div class="copyright pt-3 mb-md-0">
            <div class="container">
                <div class="d-flex justify-content-center">
                    <p>Copyright &copy; 2021 BLK Provinsi Gorontalo. All Rights Reserved.</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="{{ asset('assets/front/js/bootstrap/bootstrap.bundle.min.js') }}"></script>
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
    </script>
</body>

</html>
