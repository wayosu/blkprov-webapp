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
    <!-- Navbar Tablet & Laptop -->
    <nav class="navbar navbar-expand-lg navbar-light d-none d-md-block">
        <div class="container">
            <a class="navbar-brand d-none d-md-block" href="#">
                <div class="d-flex align-items-center">
                    <img src="{{ asset('assets/front/images/logo-pemprov.png') }}" alt="" width="35">
                    <span class="fs-6 fw-bolder ms-2 text-dark">BLK PROVINSI GORONTALO</span>
                </div>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll"
                aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                <small><span class="navbar-toggler-icon"></span></small>
            </button>
            <div class="collapse navbar-collapse" id="navbarScroll">
                <ul class="navbar-nav gap-lg-3 ms-auto my-2 navbar-nav-scroll" style="--bs-scroll-height: 300px;">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.html">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Profile
                        </a>
                        <ul class="dropdown-menu border-0 my-dropmenu" aria-labelledby="navbarScrollingDropdown">
                            <li><a class="dropdown-item" href="profile.html">Profile</a></li>
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
                        <a class="nav-link" aria-current="page" href="gallery.html">Gallery</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="kejuruan.html">Kejuruan</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Navbar Mobile -->
    <section class="d-md-none d-lg-none d-xl-none my-border-top-primary">
        <div class="container">
            <div class="row">
                <a class="py-3 text-decoration-none" href="#">
                    <div class="d-flex align-items-center justify-content-center">
                        <img src="assets/images/logo-pemprov.png" alt="" height="35">
                        <h6 class="fs-5 small fw-bolder ms-2 text-dark"><small>BLK PROVINSI GORONTALO</small></h6>
                    </div>
                </a>
            </div>
        </div>
    </section>

    <nav class="navbar navbar-dark my-bg-primary py-2 navbar-expand d-md-none d-lg-none d-xl-none fixed-bottom">
        <ul class="navbar-nav nav-justified w-100">
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="fas fa-home"></i>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="fas fa-newspaper"></i>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="fas fa-images"></i>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="fas fa-bullhorn"></i>
                </a>
            </li>
            <li class="nav-item dropup">
                <a href="#" class="nav-link" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                    id="navbarScrollingDropup" role="button">
                    <i class="fas fa-building"></i>
                </a>
                <ul class="dropdown-menu dropdown-menu-end my-dropdown-navb mb-2 rounded-top rounded-0"
                    aria-labelledby="navbarScrollingDropdown">
                    <li><a class="dropdown-item small" href="profile.html">Profile</a></li>
                    <li><a class="dropdown-item small" href="visimisi.html">Visi & Misi</a></li>
                    <li><a class="dropdown-item small" href="sambutan.html">Sambutan Kepala</a></li>
                    <li><a class="dropdown-item small" href="struktur.html">Struktur Organisasi</a></li>
                </ul>
            </li>
        </ul>
    </nav>

    <section id="slider" class="mb-5">
        <div class="row">
            <div class="col-md-12">
                <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        @foreach ($data as $post_terbaru)
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{ $loop->index }}"
                                class="{{ $loop->first ? 'active' : '' }}" aria-current="true"></button>
                        @endforeach
                    </div>
                    <div class="carousel-inner">
                        @foreach ($data as $post_terbaru)
                            <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                                <img src="{{ asset($post_terbaru->gambar) }}" class="d-block" alt="...">
                                <div class="carousel-caption">
                                    <h3>{{ $post_terbaru->judul }}</h3>
                                    <p class="">{{ $post_terbaru->konten }}</p>
                                    <a href="#" class="btn my-btn-slider-primary">Baca Selengkapnya</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <!-- <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button> -->
                </div>
            </div>
        </div>
    </section>

    <section id="pengumuman" class="mb-5">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="row gy-4">
                        <div class="col-md-4">
                            <a href="" class="text-decoration-none my-link-card">
                                <div class="card border-0 my-bg-primary my-rounded shadow">
                                    <div class="card-body text-center">
                                        <div class="my-img-content-card">
                                            <img src="{{ asset('assets/front/images/bullhorn.png') }}" class="my-img-card">
                                        </div>
                                        <div class="my-text-content-card">
                                            <div class="my-icon rounded-circle my-bg-white d-inline-block mt-2 mb-3">
                                                <div class="my-text-primary mt-2 my-icon-card">
                                                    <i class="fas fa-bullhorn"></i>
                                                </div>
                                            </div>
                                            <h5 class="card-title my-text-white">Time to Get Your House Clean and in Order</h5>
                                            <p class="small mb-2 fw-normal my-text-white"><small>23 Januari 2021</small></p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-4">
                            <a href="" class="text-decoration-none my-link-card">
                                <div class="card border-0 my-bg-primary my-rounded shadow">
                                    <div class="card-body text-center">
                                        <div class="my-img-content-card">
                                            <img src="{{ asset('assets/front/images/bullhorn.png') }}" class="my-img-card">
                                        </div>
                                        <div class="my-text-content-card">
                                            <div class="my-icon rounded-circle my-bg-white d-inline-block mt-2 mb-3">
                                                <div class="my-text-primary mt-2 my-icon-card">
                                                    <i class="fas fa-bullhorn"></i>
                                                </div>
                                            </div>
                                            <h5 class="card-title my-text-white">Time to Get Your House Clean and in Order</h5>
                                            <p class="small mb-2 fw-normal my-text-white"><small>23 Januari 2021</small></p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-4">
                            <a href="" class="text-decoration-none my-link-card">
                                <div class="card border-0 my-bg-primary my-rounded shadow">
                                    <div class="card-body text-center">
                                        <div class="my-img-content-card">
                                            <img src="{{ asset('assets/front/images/bullhorn.png') }}" class="my-img-card">
                                        </div>
                                        <div class="my-text-content-card">
                                            <div class="my-icon rounded-circle my-bg-white d-inline-block mt-2 mb-3">
                                                <div class="my-text-primary mt-2 my-icon-card">
                                                    <i class="fas fa-bullhorn"></i>
                                                </div>
                                            </div>
                                            <h5 class="card-title my-text-white">Time to Get Your House Clean and in Order</h5>
                                            <p class="small mb-2 fw-normal my-text-white"><small>23 Januari 2021</small></p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <section id="berita" class="mb-5">
        <div class="container">
            <div class="row gy-5">
                <div class="col-md-12 col-xl-9">
                    <div class="mb-2">
                        <div class="d-flex align-items-center justify-content-between">
                            <h5 class="my-0">BERITA TERBARU</h5>
                            <a href="#" class="my-btn-link small"><i class="fas fa-stream"></i> Lihat Semua</a>
                        </div>
                        <div class="my-border-bottom-primary"></div>
                    </div>
                    <div class="row gy-4">
                        @foreach($data as $post_terbaru)
                            <div class="col-md-12 col-lg-6">
                                <a href="#" class="text-decoration-none text-black">
                                    <div class="card border-0">
                                        <div class="figure">
                                            <img class="card-img-top rounded-3 my-img-zoom" src="{{ asset($post_terbaru->gambar) }}"
                                                alt="Card image cap">
                                        </div>
                                        <div class="card-body pb-0 px-0">
                                            <h4 class="card-title my-card-title">{{ $post_terbaru->judul }}</h4>
                                            <p class="mb-2 fw-bold small">
                                                <small>
                                                    @if ($post_terbaru->user_id == 1)
                                                        Admin
                                                    @else
                                                        {{ $post_terbaru->user->name }}
                                                    @endif
                                                    <span class="fw-light text-muted">- 
                                                        {{ $post_terbaru->created_at->format('d F Y') }}
                                                    </span>
                                                </small>
                                            </p>
                                            <p class="card-text fw-light">
                                                {{ $post_terbaru->konten }}
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-md-12 col-xl-3">
                    <div class="mb-2">
                        <div class="d-flex align-items-center justify-content-between">
                            <h5 class="my-0">BERITA POPULER</h5>
                            <a href="#" class="my-btn-link small"><i class="fas fa-stream"></i> Lihat Semua</a>
                        </div>
                        <div class="my-border-bottom-primary"></div>
                    </div>
                    <div class="row gy-4">
                        <div class="col-md-12">
                            <div class="card border-0">
                                <div class="card-body p-0">
                                    <h5 class="card-title">Time to Get Your House Clean and in Order</h5>
                                    <p class="small mb-2 fw-bold"><small>Admin <span
                                                class="text-muted fw-light">- 23 Januari 2021</span></small></p>
                                    <p class="card-text fw-light small mb-2">Some quick example text to build on the
                                        card title and make up the bulk of the card's content.</p>
                                    <a href="#" class="btn btn-sm my-btn-primary"><small>Baca Selengkapnya</small></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="card border-0">
                                <div class="card-body p-0">
                                    <h5 class="card-title">Time to Get Your House Clean and in Order</h5>
                                    <p class="small mb-2 fw-bold"><small>Admin <span
                                                class="text-muted fw-light">- 23 Januari 2021</span></small></p>
                                    <p class="card-text fw-light small mb-2">Some quick example text to build on the
                                        card title and make up the bulk of the card's content.</p>
                                    <a href="#" class="btn btn-sm my-btn-primary"><small>Baca Selengkapnya</small></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="card border-0">
                                <div class="card-body p-0">
                                    <h5 class="card-title">Time to Get Your House Clean and in Order</h5>
                                    <p class="small mb-2 fw-bold"><small>Admin <span
                                                class="text-muted fw-light">- 23 Januari 2021</span></small></p>
                                    <p class="card-text fw-light small mb-2">Some quick example text to build on the
                                        card title and make up the bulk of the card's content.</p>
                                    <a href="#" class="btn btn-sm my-btn-primary"><small>Baca Selengkapnya</small></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="galeri" class="mb-5">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="mb-2">
                        <div class="d-flex align-items-center justify-content-between">
                            <h5 class="my-0">GALERI</h5>
                            <a href="#" class="my-btn-link small"><i class="fas fa-stream"></i> Lihat Semua</a>
                        </div>
                        <div class="my-border-bottom-primary"></div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-lg-6 col-xl-3">
                            <div class="card border-0">
                                <div class="figure">
                                    <img class="card-img-top rounded-3 my-img-zoom" src="{{ asset('assets/front/images/2.jpg') }}"
                                        alt="Card image cap">
                                </div>
                                <div class="card-body px-0">
                                    <h5 class="card-title my-card-title">Time to Get Your House Clean and in Order</h4>
                                        <p class="mb-2 fw-bold small"><small>Admin <span
                                                    class="fw-light text-muted">- 23
                                                    Januari 2021</span></small></p>
                                        <a href="#" class="btn btn-sm my-btn-outline-primary"><small>Lihat
                                                Galeri</small></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-6 col-xl-3">
                            <div class="card border-0">
                                <div class="figure">
                                    <img class="card-img-top rounded-3 my-img-zoom" src="{{ asset('assets/front/images/3.jpg') }}"
                                        alt="Card image cap">
                                </div>
                                <div class="card-body px-0">
                                    <h5 class="card-title my-card-title">Time to Get Your House Clean and in Order</h5>
                                    <p class="mb-2 fw-bold small"><small>Admin <span
                                                class="fw-light text-muted">- 23
                                                Januari 2021</span></small></p>
                                    <a href="#" class="btn btn-sm my-btn-outline-primary"><small>Lihat
                                            Galeri</small></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-6 col-xl-3">
                            <div class="card border-0">
                                <div class="figure">
                                    <img class="card-img-top rounded-3 my-img-zoom" src="{{ asset('assets/front/images/5.jpg') }}"
                                        alt="Card image cap">
                                </div>
                                <div class="card-body px-0">
                                    <h5 class="card-title my-card-title">Time to Get Your House Clean and in Order</h5>
                                    <p class="mb-2 fw-bold small"><small>Admin <span
                                                class="fw-light text-muted">- 23
                                                Januari 2021</span></small></p>
                                    <a href="#" class="btn btn-sm my-btn-outline-primary"><small>Lihat
                                            Galeri</small></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-6 col-xl-3">
                            <div class="card border-0">
                                <div class="figure">
                                    <img class="card-img-top rounded-3 my-img-zoom" src="{{ asset('assets/front/images/2.jpg') }}"
                                        alt="Card image cap">
                                </div>
                                <div class="card-body px-0">
                                    <h5 class="card-title my-card-title">Time to Get Your House Clean and in Order</h5>
                                    <p class="mb-2 fw-bold small"><small>Admin <span
                                                class="fw-light text-muted">- 23
                                                Januari 2021</span></small></p>
                                    <a href="#" class="btn btn-sm my-btn-outline-primary"><small>Lihat
                                            Galeri</small></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer>
        <div class="container">
            <div class="footer-wrap">
                <div class="second_class">
                    <div class="row">
                        <div class="col-lg-4 col-sm-6">
                            <div class="d-flex align-items-center">
                                <img src="{{ asset('assets/front/images/logo-pemprov.png') }}" alt="logo" width="40">
                                <h3 class="ms-2 fw-bold text-uppercase text-white">Balai Latihan Kerja Provinsi Gorontalo</h3>
                            </div>
                            
                            <p>
                                Alamat : Jalan Beringin, Kelurahan Tomulabutao Selatan, Kecamatan Dungingi, Kota Gorontalo, Gorontalo 96138
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

        <div class="copyright pt-3 mb-5 mb-md-0">
            <div class="container">
                <div class="d-flex justify-content-center">
                    <p>Copyright &copy; 2021 BLK Provinsi Gorontalo. All Rights Reserved.</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="{{ asset('assets/front/js/bootstrap/bootstrap.bundle.min.js') }}"></script>
    <!-- Custom JS -->
    <script src="{{ asset('assets/front/js/custom.js') }}"></script>
</body>

</html>